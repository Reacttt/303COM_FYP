<?php

namespace App\Http\Controllers;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function findProduct(Request $request)
    {
        $product_id = $request->input('product_id');

        $product = DB::table('product')->where('product_id', $product_id)->first();
        $category = DB::table('category')->get();
        $category_name = DB::table('category')->where('category_id', $product->category_id)->value('category_name');


        return view("editProduct", compact('product', 'category', 'category_name'));
    }

    public function addProduct(Request $request)
    {
        $category_id = $request->input('category_id');
        $product_name = $request->input('product_name');
        $product_description = $request->input('product_description');
        $product_image = $request->input('product_image');
        $product_price = $request->input('product_price');
        $product_stock = $request->input('product_stock');
        $product_status = $request->input('product_status');
        $created_at = \Carbon\Carbon::now()->toDateTimeString();
        
        $this->validate($request, [
            'category_id' => 'required',
            'product_name' => 'required|max:255',
            'product_description' => 'required|max:255',
            'product_image' => 'required',
            'product_price' => 'required',
            'product_stock' => 'required',
        ]);

        $imageName = $request->product_image->getClientOriginalName();
        $request->product_image->move(public_path('images'), $imageName);

        $data = array(
            "category_id" => $category_id,
            "product_name" => $product_name,
            "product_description" => $product_description,
            "product_image" => $imageName,
            "product_price" => $product_price,
            "product_stock" => $product_stock,
            "product_status" => $product_status,
            "created_at" => $created_at
        );

        DB::table('product')->insert($data);

        return redirect('admin')->with('alert', 'Product added successfully!');
    }

    public function updateProductDetails(Request $request)
    {
        $product_id = $request->input('product_id');
        $category_id = $request->input('category_id');
        $product_name = $request->input('product_name');
        $product_description = $request->input('product_description');
        $product_price = $request->input('product_price');
        $updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $this->validate($request, [
            'product_name' => 'required|max:255',
            'product_description' => 'required|max:255',
            'product_price' => 'required',
        ]);

        $data = array(
            "category_id" => $category_id,
            "product_name" => $product_name,
            "product_description" => $product_description,
            "product_price" => $product_price,
            "updated_at" => $updated_at
        );

        DB::table('product')->where('product_id', $product_id)->update($data);

        return redirect('/updateProduct')->with('alert', 'Product details updated successfully! ');
    }

    public function updateProductStock($product_id = null, $product_stock = null, $quantity = null)
    {
        $newStock = ($product_stock) + $quantity;
        $updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $data = array(
            "product_stock" => $newStock,
            "updated_at" => $updated_at
        );

        DB::table('product')->where('product_id', $product_id)->update($data);

        return redirect('/updateStock');
    }

    public function updateProductStatus(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_status = $request->input('product_status');
        $updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $data = array(
            "product_id" => $product_id,
            "product_status" => $product_status,
            "updated_at" => $updated_at
        );

        DB::table('product')->where('product_id', $product_id)->update($data);

        if ($product_status != 0)
            return redirect('/restoreProduct')->with('alert', 'Product restored successfully! ');
        else
            return redirect('/deleteProduct')->with('alert', 'Product deleted successfully! ');
    }
}
