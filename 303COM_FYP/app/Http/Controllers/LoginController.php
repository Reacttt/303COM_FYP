<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function loginUser(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', '=', $request->username)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect('/');
            } else {
                return back()->with('fail', 'Password not matches');
            }

        }

        /*
        $user = User::where('username', $request->username)->where('password', $request->password)->first();
        if ($user) {
            Auth::login($user);
            return redirect('/');
        } else {
            return back()->with('status', 'User does not exist');
        } */
    }
}
