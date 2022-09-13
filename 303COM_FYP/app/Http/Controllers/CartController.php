<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addCart($product_id = null, $user_username = null)
    {
        $quantity = 1;
        $action_at = \Carbon\Carbon::now()->toDateTimeString();

        $user_id = DB::table('user')->where('user_username', $user_username)->value('user_id');

        $result = DB::select('select * from cart where user_id = ? AND product_id = ?', [$user_id, $product_id]);

        // Create New Cart Item if product not duplicate in user cart
        if ($result == null) {
            $data = array(
                "user_id" => $user_id,
                "product_id" => $product_id,
                "product_quantity" => $quantity,
                "created_at" => $action_at
            );

            DB::table('cart')->insert($data);

            return redirect('product')->with('alert', 'Product added to cart!');

        } else if ($result) {

            $product_quantity = DB::table('cart')->where('user_id', $user_id)->where('product_id', $product_id)->value('product_quantity');

            $newQuantity = $product_quantity + $quantity;

            $data = array(
                "product_quantity" => $newQuantity,
                "updated_at" => $action_at
            );

            DB::table('cart')->where('user_id', $user_id)->where('product_id', $product_id)->update($data);

            return redirect('product')->with('alert', 'Product quantity updated in cart!');
        }
    }

    public function updateCartQuantity($user_id = null, $product_id = null, $quantity = null)
    {
        $product_quantity = DB::table('cart')->where('user_id', $user_id)->where('product_id', $product_id)->value('product_quantity');

        $newQuantity = $product_quantity + $quantity;
        $updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $data = array(
            "product_quantity" => $newQuantity,
            "updated_at" => $updated_at
        );

        DB::table('cart')->where('user_id', $user_id)->where('product_id', $product_id)->update($data);

        return redirect('/cart');
    }

    public function removeCart($user_id = null, $product_id = null)
    {
        DB::table('cart')->where('user_id', $user_id)->where('product_id', $product_id)->delete();

        return redirect('/cart');
    }

    
}
