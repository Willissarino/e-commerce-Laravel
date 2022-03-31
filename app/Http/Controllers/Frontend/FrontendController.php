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

    // Get Category API
    public function getCategoryAPI()
    {
        $category = Category::where('status','0')->take(5)->get(); //Take 5 first categories
        return $category;
    }
    // Get Featured API
    public function getFeaturedAPI()
    {
        $featured_product = Product::where('trending','1')->take(4)->get();
        return $featured_product;
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

    // Get Category API
    public function viewCategoryAPI($slug)
    {
        if(Category::where('slug',$slug)->exists())
        {
            $category = Category::where('slug',$slug)->first();
            $cate_slug = Category::where('slug',$slug)->value('slug');
            $products = Product::where('cate_id',$category->id)->where('status','0')->get();

            $data = [
                "prod_slug" => $cate_slug,
                "product_category" => $products,
            ];

            return response()->json($data);
        }
        else
        {
            return [
                "message" => 'No such category exists'
            ];
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

    // View specific product API
    public function viewProductAPI($cate_slug,$prod_slug)
    {
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $products = Product::where('slug',$prod_slug)->first();
                $cate_slug = Category::where('slug',$cate_slug)->value('slug');

                return $products;
            }
            else
            {
                return [
                    "message" => 'No such product exists.'
                ];
            }
        }
    }

    public function viewAllProduct()
    {
        $product = Product::where('status','0')->get();
        return view('user.allproduct', compact('product'));
    }

    // Get all product API
    public function viewAllProductAPI()
    {
        $products = Product::where('status','0')->with(['category'])->get();

        return response()->json($products);
    }
}
