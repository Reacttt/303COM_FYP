<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        $category_name = $request->input('category_name');
        $category_description = $request->input('category_description');
        $product_image = $request->input('product_image');
        
        $this->validate($request, [
            'category_name' => 'required|max:255',
            'category_description' => 'required|max:255',
            'category_image' => 'required',
        ]);

        $imageName = $request->category_image->getClientOriginalName();
        $request->category_image->move(public_path('images'), $imageName);

        $data = array(
            "category_name" => $category_name,
            "category_description" => $category_description,
            "category_image" => $imageName
        );

        DB::table('category')->insert($data);

        return redirect('admin')->with('alert', 'Product added successfully!');
    }
}
