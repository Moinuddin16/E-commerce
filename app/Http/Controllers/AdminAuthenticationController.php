<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthenticationController extends Controller
{
    public function login(Request $request)
    {
        return view('admin.auth.login');
    }
}
