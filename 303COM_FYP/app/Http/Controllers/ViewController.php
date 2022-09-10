<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class ViewController extends Controller
{
    // Customer View
    public function homePage()
    {
        $category = DB::table('category')->get();
        return view("home", compact('category'));
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
        $category = DB::table('category')->get();
        return view("category", compact('category'));
    }

    public function productPage($category_id = null,)
    {
        if ($category_id == 0 || $category_id == null) {
            $product = DB::table('product')->get();
            return view("productList", compact('product'));
        } elseif ($category_id == "Best") {
        } elseif ($category_id == "New") {
        } else {
            $product = DB::table('product')->where('category_id', $category_id)->get();
            return view("productList", compact('product'));
        }
    }

    public function cartPage()
    {
        $cart = DB::table('cart')->get();
        return view("cart", compact('cart'));
    }

    // Admin View

    public function adminPage()
    {
        return view("admin");
    }

    public function addCategoryPage()
    {
        return view("addCategory");
    }

    public function addProductPage()
    {
        $category = DB::table('category')->get();
        return view("addProduct", compact('category'));
    }

    public function updateProductPage()
    {
        $product = DB::table('product')->get();
        return view("updateProduct", compact('product'));
    }

    public function updateStockPage()
    {
        $product = DB::table('product')->get();
        return view("updateStock", compact('product'));
    }

    public function deleteProductPage()
    {
        $product = DB::table('product')->get();
        return view("deleteProduct", compact('product'));
    }

    public function restoreProductPage()
    {
        $product = DB::table('product')->get();
        return view("restoreProduct", compact('product'));
    }
}
