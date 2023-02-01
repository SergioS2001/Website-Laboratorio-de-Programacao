<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(15)->get();
        $trending_category = Category::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products', 'trending_category'));
    }

    public function category()
    {
        $category = Category::where('status', '0')->get();
        return view('frontend.category', compact('category')); 
    }

    public function viewcategory($name)
    {
       if(Category::where('name',$name)->exists())
       {
            $category = Category::where('name', $name)->first();
            $products = Product::where('cate_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category', 'products'));
       }
       else{
            return redirect('/')->with('status', "Name does not exists");
       }

    }

    public function productview($cate_name, $prod_name)
    {
        if(Category::where('name',$cate_name)->exists())
        {
             if(Product::where('name', $prod_name)->exists())
             {
                $products = Product::where('name', $prod_name)->first();
                return view('frontend.products.view', compact('products'));
             }
             else{
                return redirect('/')->with('status', "The link was broken");
             }
        }
        else{
             return redirect('/')->with('status', "No such category found");
        }
    }
}
