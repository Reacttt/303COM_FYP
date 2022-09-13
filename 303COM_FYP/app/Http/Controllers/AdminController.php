<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function loginAdmin(Request $request)
    {
        $request->validate([
            'admin_username' => 'required',
            'admin_password' => 'required'
        ]);

        $admin_username = $request->input('admin_username');
        $admin_password = Hash::make($request->input('admin_password'));

        // Check if Admin Exist
        $admin = DB::table('admin')->where('admin_username', $admin_username)->first();

        if ($admin) {
            if (Hash::check($request->admin_password, $admin->admin_password)) {
                Session()->put('admin_username', $request->admin_username);

                return redirect('/admin')->with('alert', 'Admin login successfully!');
            } else {
                return back()->with('alert', 'Password does not matches!');
            }
        } else {
            return back()->with('alert', 'Admin not found!');
        }
    }

    public function logoutAdmin()
    {
        Session()->forget('admin_username');

        return redirect('/')->with('alert', 'Admin successfully logged out!');
    }
}
