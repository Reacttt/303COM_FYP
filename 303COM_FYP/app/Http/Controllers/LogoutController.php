<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function logout()
    {

        Auth()->logout();

        return redirect('/')->with('alert', 'You successfully logged out!');
    }
}
?>