<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    public function index()
    {   
        $orders = Order::where('user_id', Auth::id())->get();
        $user_details = User::where('id',Auth::id())->first();
        return view('dashboard', compact('orders','user_details'));
    }

    // User Dashboard APIs
    public function userDashboardAPI()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        $user_details = User::where('id',Auth::id())->first();
        return response()->json(['orders' => $orders, 'user_details' => $user_details]);
    }

    public function updateUserDetail(Request $request)
    {
        if(Auth::check())
        {
            $user_detail = User::where('id',Auth::id())->first();
            $user_detail->name = $request->input('fname');
            $user_detail->lname = $request->input('lname');
            $user_detail->phone = $request->input('phone');
            $user_detail->address1 = $request->input('address1');
            $user_detail->address2 = $request->input('address2');
            $user_detail->country = $request->input('country');
            $user_detail->city = $request->input('city');
            $user_detail->state = $request->input('state');
            $user_detail->zipcode = $request->input('zipcode');
            $user_detail->update();
            Alert::success('Success', 'User Detail update successfully');
            return redirect('dashboard');
        }
        else
        {
            return redirect('/dashboard');
        }
    }

    // Update User Details APIs
    public function updateUserDetailAPI(Request $request)
    {
        if(Auth::check())
        {
            $user_detail = User::where('id',Auth::id())->first();
            $user_detail->name = $request->input('fname');
            $user_detail->lname = $request->input('lname');
            $user_detail->phone = $request->input('phone');
            $user_detail->address1 = $request->input('address1');
            $user_detail->address2 = $request->input('address2');
            $user_detail->country = $request->input('country');
            $user_detail->city = $request->input('city');
            $user_detail->state = $request->input('state');
            $user_detail->zipcode = $request->input('zipcode');
            $user_detail->update();
            return response()->json(['success' => 'User Detail update successfully']);
        }
        else
        {
            return response()->json(['error' => 'User not found']);
        }
    }
}
