<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    // Customer View
    public function homePage()
    {
        return view("home");
    }

    public function registerPage()
    {
        return view("register");
    }

    public function loginPage()
    {
        return view("login");
    }

    public function categoryPage()
    {
        $category = DB::table('category')->select('category_id', 'category_name', 'category_description', 'category_image')->get();
        return view("category", compact('category'));
    }

    public function productPage()
    {
        $product = DB::table('product')->select('product_id', 'category_id', 'product_name', 'product_description', 'product_image', 'product_stock', 'product_price', 'product_status')->get();
        return view("productList", compact('product'));
    }

    public function cartPage()
    {
        $cart = DB::table('cart')->select('cart_id', 'user_id', 'product_id', 'product_quantity', 'product_subtotal');
        return view("cart", compact('cart'));
    }

    // Admin View

    public function adminPage()
    {
        return view("admin");
    }

    public function addProductPage() {
        return view("addProduct");
    }
}
