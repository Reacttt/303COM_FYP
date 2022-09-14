<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function placeOrder($user_id = null, $shipping_details_id = null)
    {
        $action_at = \Carbon\Carbon::now()->toDateTimeString();

        $shipping_details = DB::table('shipping_details')->where('user_id', $user_id)->first();

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
                    "created_at" => $action_at
                );

                DB::table('order_item')->insert($data);
                DB::table('cart')->where('cart_id', $cart->cart_id)->delete();
            }
        }

        return redirect('/')->with('alert', 'Order Placed Successfully!');
    }
}
