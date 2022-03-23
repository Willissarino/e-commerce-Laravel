<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartItems as $item)
        {
            if(!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists())
            {
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('user.checkout', compact('cartItems'));
    }

    public function placeOrder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->country = $request->input('country');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->zipcode = $request->input('zipcode');
        $order->tracking_no = 'trackno.'.rand(1111,9999);

        // Calculate total price & quantity
        $total_price = 0;
        $total_qty = 0;
        $cartItems_total = Cart::where('user_id',Auth::id())->get();
        foreach($cartItems_total as $product)
        {
            $total_price += $product->products->selling_price * $product->prod_qty;
            $total_qty += $product->prod_qty;
        }

        $order->total_price = $total_price;
        $order->total_qty = $total_qty;
        $order->save();

        $order->id;

        // Get table of user_id same as user_id in Auth
        $cartItems = Cart::where('user_id', Auth::id())->get();

        foreach($cartItems as $item)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'prod_qty' => $item->prod_qty,
                'prod_price' => $item->products->selling_price,
            ]);

            $product_table = Product::where('id',$item->prod_id)->first();
            $product_table->qty = $product_table->qty - $item->prod_qty;  // Reduce product qty after confirm buys
            $product_table->update();
        }

        // If user doesnt have address registered then update
        if(Auth::user()->address1 == NULL)
        {
            $user = User::Where('id',Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->country = $request->input('country');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->zipcode = $request->input('zipcode');
            $user->update();
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);

        Alert::success('Success', 'Product ordered successfully');
        return redirect('/');
    }
}
