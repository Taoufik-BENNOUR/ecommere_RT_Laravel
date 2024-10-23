<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

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

    public function add_cart(Request $request,$id){
        if(Auth::id()){
            $user=Auth::user();
            $product=Product::find($id);
            $cart=new Cart;

            $cart->user_id=$user->id;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;

            $cart->product_id=$product->id;
            $cart->product_title=$product->title;
            if($product->discount!=null){
                $cart->price=$product->discount * $request->quantity;
            }else{
                $cart->price=$product->price * $request->quantity;
            }
            $cart->quantity=$request->quantity;
            $cart->image=$product->image;
            $cart->save();
            return redirect()->back();

        }else{
            return redirect('login');
        }
    }
}
