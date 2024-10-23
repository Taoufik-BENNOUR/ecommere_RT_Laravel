<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $products=Product::paginate(3);
        $tshirt=Product::where('category','tshirt')->get();
        $latestProducts = Product::orderBy('created_at', 'desc')->paginate(3);
        
        return view('home.userpage',compact('latestProducts','products','tshirt'));
    }
    public function redirect(){
        $userType=Auth::user()->userType;
        $products=Product::all();
        if($userType=='1'){
            return view('admin.home');
        }else{
            return view('home.userpage',compact('products'));
        }
    }
    public function getProduct($id){
        $product=Product::find($id);
        return view('home.productDetail',compact('product'));
    }
}
