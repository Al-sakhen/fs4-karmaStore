<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class HomeController extends Controller
{
    public function index(){
        return view('front.index');
    }

    public function category(Request $request){
        $queryParams = $request->query();
        $categories = Category::with('childrens')->whereNull('parent_id')->where('status' , true)->get();

        $products =  Product::query();

        if( isset($queryParams['category']) ){
            $products = $products->where('category_id' , $queryParams['category']);
        }

        $products = $products->where('status' , true)->paginate(isset($queryParams['select']) ? $queryParams['select'] : 4);

        return view('front.category' , compact('categories' , 'products'));
    }

    public function products($id){
        $product = Product::findOrFail($id);
        return view('front.single-product' , compact('product'));
    }

    public function signin(){
        return view('front.auth.signin');
    }
    public function signup(){
        return view('front.auth.signup');
    }
}
