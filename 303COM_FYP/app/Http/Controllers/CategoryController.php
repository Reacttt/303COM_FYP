<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    
    public function findCategory($category_id = null)
    {
        $category = DB::table('category')->where('category_id', $category_id)->first();

        return view("editCategory", compact('category'));
    }

    public function addCategory(Request $request)
    {
        $category_name = $request->input('category_name');
        $category_description = $request->input('category_description');
        $category_image = $request->input('category_image');
        $category_sale = 0;
        $category_status = $request->input('category_status');
        $created_at = \Carbon\Carbon::now()->toDateTimeString();
        
        $this->validate($request, [
            'category_name' => 'required|max:255',
            'category_description' => 'required|max:255',
            'category_image' => 'required',
            'category_status' => 'required',
        ]);

        $imageName = $request->category_image->getClientOriginalName();
        $request->category_image->move(public_path('images'), $imageName);

        $data = array(
            "category_name" => $category_name,
            "category_description" => $category_description,
            "category_image" => $imageName,
            "category_sale" => $category_sale,
            "category_status" => $category_status,
            "created_at" => $created_at
        );

        DB::table('category')->insert($data);

        return redirect('admin')->with('alert', 'Category added successfully!');
    }

    public function updateCategoryDetails(Request $request)
    {
        $category_id = $request->input('category_id');
        $category_name = $request->input('category_name');
        $category_description = $request->input('category_description');
        $updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $this->validate($request, [
            'category_name' => 'required|max:255',
            'category_description' => 'required|max:255',
        ]);

        $data = array(
            "category_name" => $category_name,
            "category_description" => $category_description,
            "updated_at" => $updated_at
        );

        DB::table('category')->where('category_id', $category_id)->update($data);

        return redirect('/updateCategory')->with('alert', 'Category details updated successfully! ');
    }

    public function updateCategoryStatus($category_id = null, $category_status = null)
    {
        $updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $data = array(
            "category_status" => $category_status,
            "updated_at" => $updated_at
        );

        DB::table('category')->where('category_id', $category_id)->update($data);

        if ($category_status != 0)
            return redirect('/restoreCategory')->with('alert', 'Category restored successfully! ');
        else
            return redirect('/deleteCategory')->with('alert', 'Category deleted successfully! ');
    }
}
