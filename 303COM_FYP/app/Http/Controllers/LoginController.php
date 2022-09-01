<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login() {
        return view("login");
    }

    public function loginUser(Request $request){

        $request->validate([
            'username' => 'required',
            'password' => 'required'    
        ]);

        $user = User::where('username', '=', $request->username)->first();
        if($user) {

        }  else {
            return back()->with('fail', 'This username is not registered!');
        }
    }
}