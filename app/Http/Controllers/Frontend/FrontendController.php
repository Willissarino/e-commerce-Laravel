<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class FrontendController extends Controller
{
    public function index()
    {
        $category = Category::where('status','0')->take(5)->get(); //Take 5 first categories
        $featured_product = Product::where('trending','1')->take(4)->get();
        return view('homepage',compact('category','featured_product'));
    }

    public function viewCategory($slug)
    {
        if(Category::where('slug',$slug)->exists())
        {
            $category = Category::where('slug',$slug)->first();
            $products = Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('user.category',compact('category','products'));
        }
        else
        {
            Alert::toast('Slug does not exists', 'error');
            return redirect('/');
        }
    }

    public function viewProduct($cate_slug,$prod_slug)
    {
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $products = Product::where('slug',$prod_slug)->first();
                return view('user.product',compact('products'));
            }
            else
            {
                Alert::toast('No such category found', 'error');
                return redirect('/');
            }
        }
    }

    public function viewAllProduct()
    {
        $product = Product::where('status','0')->get();
        return view('user.allproduct', compact('product'));
    }
}
