<?php

namespace App\Http\Controllers\Admin;

use App\SmsStudent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class DashboardController extends Controller
{
    public function index(){
 
        $productsCount = Product::count();

        return view('admin.dashboard',compact('productsCount'));
    }
}
