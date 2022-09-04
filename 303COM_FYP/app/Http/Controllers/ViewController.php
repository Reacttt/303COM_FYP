<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    // Customer View
    public function homePage()
    {
        return view("/");
    }

    public function registerPage()
    {
        return view("register");
    }

    public function loginPage()
    {
        return view("login");
    }

    // Admin View
    
    public function adminPage() {
        return view("admin");
    }
}
