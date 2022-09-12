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

    public function productPage($category_id = null)
    {
        $category = DB::table('category')->where('category_status', 1)->get();
        
        if ($category_id == null) {
            $product = DB::table('product')->where('product_status', 1)->get();
        } elseif ($category_id == "best") {
        } elseif ($category_id == "new") {
            $product = DB::table('product')->orderBy('created_at', 'desc')->where('product_status', 1)->take(6)->get();
        } else {
            $product = DB::table('product')->where('category_id', $category_id)->where('product_status', 1)->get();
        }

        return view("productList", compact('product', 'category'));

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

    public function updateCategoryPage()
    {
        $category = DB::table('category')->get();
        $product = DB::table('product')->get();
        return view("updateCategory", compact('category', 'product'));
    }

    public function deleteCategoryPage()
    {
        $category = DB::table('category')->get();
        return view("deleteCategory", compact('category'));
    }

    public function restoreCategoryPage()
    {
        $category = DB::table('category')->get();
        return view("restoreCategory", compact('category'));
    }

    // Product View

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
