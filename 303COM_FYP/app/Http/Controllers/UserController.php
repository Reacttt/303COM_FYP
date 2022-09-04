<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function printUser()
    {
        $user = DB::table('user')->get();
        return view('welcome', compact('user'));
    }

    public function registerUser(Request $request)
    {

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
    }

    public function logoutUser()
    {

        Auth()->logout();

        return redirect('/')->with('alert', 'You successfully logged out!');
    }
}
