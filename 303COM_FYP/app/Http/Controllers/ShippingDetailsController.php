<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingDetailsController extends Controller
{
    public function addShippingDetails(Request $request)
    {
        $user_id = $request->input('user_id');
        $shipping_first_name = $request->input('shipping_first_name');
        $shipping_last_name = $request->input('shipping_last_name');
        $shipping_address_line1 = $request->input('shipping_address_line1');
        $shipping_address_line2 = $request->input('shipping_address_line2');
        $shipping_city = $request->input('shipping_city');
        $shipping_postal_code = $request->input('shipping_postal_code');
        $shipping_country = $request->input('shipping_country');
        $shipping_contact = $request->input('shipping_contact');
        $action_at = \Carbon\Carbon::now()->toDateTimeString();
        
        $this->validate($request, [
            'shipping_first_name' => 'required|max:255',
            'shipping_first_name' => 'required|max:255',
            'shipping_last_name' => 'required',
            'shipping_address_line1' => 'required',
            'shipping_address_line2' => 'required',
            'shipping_city' => 'required',
            'shipping_postal_code' => 'required',
            'shipping_country' => 'required',
            'shipping_contact' => 'required',
        ]);

        $data = array(
            "user_id" => $user_id,
            "shipping_first_name" => $shipping_first_name,
            "shipping_last_name" => $shipping_last_name,
            "shipping_address_line1" => $shipping_address_line1,
            "shipping_address_line2" => $shipping_address_line2,
            "shipping_city" => $shipping_city,
            "shipping_postal_code" => $shipping_postal_code,
            "shipping_country" => $shipping_country,
            "shipping_contact" => $shipping_contact,
            "created_at" => $action_at
        );

        DB::table('shipping_details')->insert($data);

        return redirect('shippingDetails')->with('alert', 'Shipping Details added successfully!');
    }

    public function removeShippingDetails($shipping_details_id = null)
    {
        DB::table('shipping_details')->where('shipping_details_id', $shipping_details_id)->delete();

        return redirect('shippingDetails')->with('alert', 'Shipping Details removed successfully!');
    }
}
