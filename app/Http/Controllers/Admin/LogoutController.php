<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function logoutAdmin(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('fr.homePage');
    }
}
