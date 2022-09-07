<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addCart($product_id = null, $user_username = null)
    {
        $quantity = 1;

        $user_id = DB::table('user')->where('user_username', $user_username)->value('user_id');

        $data = array(
            "user_id" => $user_id,
            "product_id" => $product_id,
            "product_quantity" => $quantity,
        );

        DB::table('cart')->insert($data);

        return redirect('product')->with('alert', 'Product added to cart!');
    }
}
