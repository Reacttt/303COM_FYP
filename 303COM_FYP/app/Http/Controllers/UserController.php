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
        $user_username = $request->input('user_username');
        $user_password = Hash::make($request->input('user_password'));
        $user_email = $request->input('user_email');
        $user_status = $request->input('user_status');
        $created_at = \Carbon\Carbon::now()->toDateTimeString();

        $this->validate($request, [
            'user_username' => 'required|max:255|unique:user,user_username',
            'user_password' => 'required|confirmed',
            'user_password_confirmation' => 'required',
            'user_email' => 'required|email|max:255',
            'user_status'
        ]);

        $data = array(
            "user_username" => $user_username,
            "user_password" => $user_password,
            "user_email" => $user_email,
            "user_status" => $user_status,
            "created_at" => $created_at
        );

        DB::table('user')->insert($data);

        return redirect('login')->with('alert', 'User registered successfully!');
    }

    public function loginUser(Request $request)
    {

        $request->validate([
            'user_username' => 'required',
            'user_password' => 'required'
        ]);

        // Check if Username Exist
        $user = User::where('user_username', '=', $request->user_username)->first();

        if ($user) {
            if (Hash::check($request->user_password, $user->user_password)) {
                Session()->put('user_username', $request->user_username);

                return redirect('/')->with('alert', 'User login successfully!');
            } else {
                return back()->with('alert', 'Password does not matches!');
            }
        } else {
            return back()->with('alert', 'User not found!');
        }
    }

    public function logoutUser()
    {
        Session()->forget('user_username');

        return redirect('/')->with('alert', 'You successfully logged out!');
    }

    public function updateUserStatus($user_id = null, $user_status = null)
    {
        $updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $data = array(
            "user_status" => $user_status,
            "updated_at" => $updated_at
        );

        DB::table('user')->where('user_id', $user_id)->update($data);

        if ($user_status != 0)
            return redirect('/restoreUser')->with('alert', 'User restored successfully! ');
        else
            return redirect('/deleteUser')->with('alert', 'User deleted successfully! ');
    }
}
