<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CookieController extends Controller
{
    public function updateCookie($type = null, $value = null) {
            setcookie($type, $value, '0', '/');

         return back()->with('alert', 'Updated ' . $type . ' to ' . $value);
    }
}
