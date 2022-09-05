<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

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
        $category = DB::table('category')->select('id', 'name', 'description', 'image')->get();
        return view("category", compact('category'));
    }

    // Admin View
    
    public function adminPage() {
        return view("admin");
    }
}
