<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Caster\RedisCaster;
use App\Http\Controllers\Session;
use App\Http\Controllers\Collection;
use Illuminate\Contracts\Session\Session as SessionSession;

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
            $product = DB::table('product')->where('product_status', 1)->where('category_status', 1)->get();
        } elseif ($category_id == "best") {
            // Retrieve Product that is in Order Items Table
            $product = DB::table('product')->where('product_status', 1)->where('category_status', 1)->whereExists(function ($query) {
                $query->select(DB::raw(1))->from('order_item')->whereRaw('order_item.product_id = product.product_id')->where('order_item.order_item_status', '=', '1');
            })->orderBy('product_sale', 'desc')->take(6)->get();
        } elseif ($category_id == "new") {
            $product = DB::table('product')->orderBy('created_at', 'desc')->where('product_status', 1)->where('category_status', 1)->take(6)->get();
        } else {
            $product = DB::table('product')->where('category_id', $category_id)->where('product_status', 1)->where('category_status', 1)->get();
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

    public function checkoutPage()
    {
        $username = Session()->get('user_username');

        if ($username == null) {
            return view("login");
        } else {
            $user = DB::table('user')->where('user_username', Session()->get('user_username'))->first();
            $cart = DB::table('cart')->where('user_id', $user->user_id)->get();
            $shipping_details = DB::table('shipping_details')->where('user_id', $user->user_id)->get();
            return view("checkout", compact('cart', 'user', 'shipping_details'));
        }
    }

    // Shipping View
    public function shippingDetailsPage()
    {
        $username = Session()->get('user_username');

        if ($username == null) {
            return view("login");
        } else {
            $user = DB::table('user')->where('user_username', Session()->get('user_username'))->first();

            $counts = DB::table('shipping_details')->where('user_id', $user->user_id)->count();

            if ($counts != 0) {
                $shipping_details = DB::table('shipping_details')->where('user_id', $user->user_id)->get();
                return view("shippingDetails", compact('shipping_details', 'counts'));
            } else {
                return view("addShippingDetails")->with('alert', 'Please create a new shipping details');
            }
        }
    }

    public function shippingDetailsForm($action = null, $shipping_details_id = null)
    {
        if ($action == "edit") {
            $shipping_details = DB::table('shipping_details')->where('shipping_details_id', $shipping_details_id)->first();
            return view("shippingDetailsForm", compact('shipping_details'));
        } else {
            $shipping_details = NULL;
            return view("shippingDetailsForm", compact('shipping_details'));
        }
    }

    // Order View

    public function orderPage($filter = null)
    {
        $user = DB::table('user')->where('user_username', Session()->get('user_username'))->first();
        $order = DB::table('order')->where('user_id', $user->user_id)->orderBy('order_id', 'DESC')->get();
        $order_item = DB::table('order_item')->get();

        return view("order", compact('order', 'order_item'));
    }

    public function viewOrderPage($order_id = null)
    {
        $order = DB::table('order')->where('order_id', $order_id)->first();
        $order_item = DB::table('order_item')->where('order_id', $order_id)->orderBy('order_id', 'DESC')->get();
        return view("viewOrder", compact('order', 'order_item'));
    }

    // Payment View

    public function paymentPage($order_id = null, $method = null)
    {
        if ($order_id != null) {
            $order = DB::table('order')->where('order_id', $order_id)->first();
            $order_item = DB::table('order_item')->get();
            return view("payment", compact('order', 'order_item', 'method'));
        } else {
            return back()->with('alert', 'No Order Found!');
        }
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

    public function adminPreviewPage()
    {
        return view("adminPreview");
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

    // Order Manage Page
    public function orderListPage($filter = null)
    {
        $order = DB::table('order')->get();

        if ($filter == "pendingPayment") {
            $order = DB::table('order')->where('order_status', "Pending Payment")->get();
        } else if ($filter == "pendingShipment") {
            $order = DB::table('order')->where('order_status', "Pending Shipment")->get();
        } else if ($filter == "completed") {
            $order = DB::table('order')->where('order_status', "Completed")->get();
        } else if ($filter == "pendingReceive") {
            $order = DB::table('order')->where('order_status', "Shipped")->get();
        } else if ($filter == "cancelled") {
            $order = DB::table('order')->where('order_status', "Cancelled")->get();
        }

        $order_item = DB::table('order_item')->get();
        return view("orderList", compact('order', 'order_item', 'filter'));
    }

    // User Manage Page
    public function userListPage($filter = null)
    {
        $user = DB::table('user')->get();

        if ($filter == "active") {
            $user = DB::table('user')->where('user_status', 1)->get();
        } else if ($filter == "inactive") {
            $user = DB::table('user')->where('user_status', 0)->get();
        }

        return view("userList", compact('user', 'filter'));
    }

    // Asset Page
    public function assetListPage($filter = null)
    {
        if ($filter != NULL) $asset = DB::table('asset')->where('asset_type', $filter)->get();
        else $asset = DB::table('asset')->get();

        return view("assetList", compact('asset', 'filter'));
    }
}
