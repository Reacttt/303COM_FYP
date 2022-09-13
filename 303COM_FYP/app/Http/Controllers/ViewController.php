<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Caster\RedisCaster;
use App\Http\Controllers\Session;

class ViewController extends Controller
{
    // Customer View

    public function homePage()
    {
        $category = DB::table('category')->get();
        return view("home", compact('category'));
    }

    public function registerUserPage()
    {
        return view("register");
    }

    public function loginUserPage()
    {
        return view("login");
    }

    // Category View

    public function categoryPage()
    {
        $category = DB::table('category')->get();
        return view("category", compact('category'));
    }

    // Product View

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

    public function singleProductPage($product_id = null)
    {
        $product = DB::table('product')->where('product_id', $product_id)->first();
        $category_name = DB::table('category')->where('category_id', $product->category_id)->value('category_name');

        return view("singleProduct", compact('product', 'category_name'));
    }

    // Cart View

    public function cartPage()
    {
        $cart = DB::table('cart')->get();
        return view("cart", compact('cart'));
    }

    // Admin View

    public function adminPage()
    {
        $admin = Session()->get('admin_username');

        if ($admin == null) {
            return view("adminLogin");
        } else {
            return view("admin");
        }
    }

    // Category Manage View

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

    // Product Manage View

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
