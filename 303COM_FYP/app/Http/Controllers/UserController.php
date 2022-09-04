<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function printUser()
    {
        $user = DB::table('user')->get();
        return view('welcome', compact('user'));
    }

    public function insert(Request $request)
    {

        // Validation for Form Database
        $this->validate($request, [
            'username' => 'required|max:255|unique:user,username',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'email' => 'required|email|max:255',
        ]);

        $username = $request->input('username');
        $password = Hash::make($request->input('password'));
        $email = $request->input('email');

        $data = array(
            "username" => $username,
            "password" => $password,
            "email" => $email
        );

        DB::table('user')->insert($data);

        return redirect()->route('login');
    }
}
