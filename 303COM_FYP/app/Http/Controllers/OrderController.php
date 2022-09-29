<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $user_id = $request->input('user_id');
        $shipping_details_id = $request->input('shipping_details_id');
        $action_at = \Carbon\Carbon::now()->toDateTimeString();

        $shipping_details = DB::table('shipping_details')->where('shipping_details_id', $shipping_details_id)->first();

        if ($shipping_details == NULL) {
            return redirect('/shippingDetailsForm/new')->with('alert', 'Please Create Shipping Details');
        }

        // Create New Order
        $data = array(
            "user_id" => $user_id,
            "order_status" => "Pending Payment",
            "order_first_name" => $shipping_details->shipping_first_name,
            "order_last_name" => $shipping_details->shipping_last_name,
            "order_address_line1" => $shipping_details->shipping_address_line1,
            "order_address_line2" => $shipping_details->shipping_address_line2,
            "order_city" => $shipping_details->shipping_city,
            "order_postal_code" => $shipping_details->shipping_postal_code,
            "order_country" => $shipping_details->shipping_country,
            "order_contact" => $shipping_details->shipping_contact,
            "created_at" => $action_at
        );

        DB::table('order')->insert($data);

        // Create Order Items
        $cart = DB::table('cart')->where('user_id', $user_id)->get();
        $order = DB::table('order')->orderBy('created_at', 'desc')->where('user_id', $user_id)->first();

        // Filter Active Category and Product Only
        foreach ($cart as $cart) {
            $product = DB::table('product')->where('product_id', $cart->product_id)->first();
            $category = DB::table('category')->where('category_id', $product->category_id)->first();

            if ($category->category_status == 1 && $product->product_status == 1) {

                $action_at = \Carbon\Carbon::now()->toDateTimeString();

                $data = array(
                    "order_id" => $order->order_id,
                    "product_id" => $cart->product_id,
                    "order_item_name" => $product->product_name,
                    "order_item_description" => $product->product_description,
                    "order_item_image" => $product->product_image,
                    "order_item_price" => $product->product_price,
                    "order_item_quantity" => $cart->product_quantity,
                    "order_item_status" => 0,
                    "created_at" => $action_at
                );

                DB::table('order_item')->insert($data);
                DB::table('cart')->where('cart_id', $cart->cart_id)->delete();
            }
        }

        return redirect('/payment/'. $order->order_id)->with('alert', 'Order Placed Successfully!');
    }

    public function updateOrderStatus($order_id = null, $order_status = null)
    {
        $data = array(
            "order_status" => $order_status,
            "updated_at" => \Carbon\Carbon::now()->toDateTimeString()
        );

        DB::table('order')->where('order_id', $order_id)->update($data);

        if ($order_status == "Completed") {
            $order_item = DB::table('order_item')->where('order_id', $order_id)->get();

            foreach ($order_item as $order_item) {
                $data = array(

                    "order_item_status" => 1,
                    "updated_at" => \Carbon\Carbon::now()->toDateTimeString()
                );

                DB::table('order_item')->where('order_item_id', $order_item->order_item_id)->update($data);
            }
        }

        if ($order_status == "Shipped")
            return redirect('/orderList/pendingShipment')->with('alert', 'Order shipped successfully! ');
        else if ($order_status == "Completed")
            return redirect('/order')->with('alert', 'Order received successfully! ');
        else if ($order_status == "Cancelled")
            return redirect('/order')->with('alert', 'Order cancelled successfully! ');
    }
}
