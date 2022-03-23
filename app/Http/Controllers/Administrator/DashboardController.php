<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;


class DashboardController extends Controller
{
    public function __construct()
    {
        /*
         * Uncomment the line below if you want to use verified middleware
         */
        //$this->middleware('verified:administrator.verification.notice');
    }


    public function index(){
        $users = User::all();
        $products = Product::all();
        $orders = Order::all();
        return view('administrator.dashboard', compact('users','products','orders'));
    }
}
