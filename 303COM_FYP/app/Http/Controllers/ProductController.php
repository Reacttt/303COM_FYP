<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'product_name' => 'required|max:255',
            'product_description' => 'required|max:255',
            'product_image' => 'required',
            'product_price' => 'required',
            'product_stock' => 'required',
            'product_status'
        ]);

        $category_id = $request->input('category_id');
        $product_name = $request->input('product_name');
        $product_description = $request->input('product_description');
        $product_image = $request->input('product_image');
        $product_price = $request->input('product_price');
        $product_stock = $request->input('product_stock');
        $product_status = $request->input('product_status');

        $imageName = $request->product_image->getClientOriginalName();
        $request->product_image->move(public_path('images'), $imageName);

        $data = array(
            "category_id" => $category_id,
            "product_name" => $product_name,
            "product_description" => $product_description,
            "product_image" => $imageName,
            "product_price" => $product_price,
            "product_stock" => $product_stock,
            "product_status" => $product_status
        );

        DB::table('product')->insert($data);

        return redirect('admin')->with('alert', 'Product added successfully!');
    }

    public function updateProduct(Request $request)
    {
    }

    public function updateStock(Request $request)
    {
    }

    public function updateProductStatus(Request $request)
    {

        $product_id = $request->input('product_id');
        $product_status = $request->input('product_status');

        $data = array(
            "product_id" => $product_id,
            "product_status" => $product_status
        );

        DB::table('product')->where('product_id', $product_id)->update($data);

        if ($product_status != 0)
            return redirect('/restoreProduct')->with('alert', 'Product restored successfully! ');
        else
            return redirect('/deleteProduct')->with('alert', 'Product deleted successfully! ');
    }
}
