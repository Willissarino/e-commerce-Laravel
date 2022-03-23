<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProductCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        
        if(Auth::check()) //Check user is logged in before add into cart
        {
            $prod_check = Product::where('id',$product_id)->first();


            if($prod_check)
            {
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => $prod_check->name." already in the Cart",'status_type'=>"info"]);
                }
                else
                {
                $cartItem = new Cart();
                $cartItem->prod_id = $product_id;
                $cartItem->user_id = Auth::id();
                $cartItem->prod_qty = $product_qty;
                $cartItem->save();
                return response()->json(['status' => $prod_check->name." added to Cart",'status_type'=>"success"]);
                }
            }
        }
        else
        {
            return response()->json(['status'=>"Please Login to Continue",'status_type'=>"warning"]);
        }
    }

    public function viewCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('user.cart', compact('cartItems'));
    }

    public function deleteProductCart(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(Cart::where("prod_id",$prod_id)->where('user_id',Auth::id())->exists())
            {
                $cartItem = Cart::where("prod_id",$prod_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status'=>"Product deleted successfully",'status_type'=>"warning"]);
            }
        }
        else
        {
            return response()->json(['status'=>"Please Login to Continue",'status_type'=>"warning"]);
        }
    }

    public function updateProductCart(Request $request)
    {
        $product_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');

        if(Auth::check())
        {
            if(Cart::where("prod_id",$product_id)->where('user_id',Auth::id())->exists())
            {
                $cart = Cart::where('prod_id',$product_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json(['status'=>"Quantity Updated"]);
            }
        }
    }
}
