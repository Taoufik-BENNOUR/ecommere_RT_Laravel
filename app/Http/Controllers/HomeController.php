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

        if($userType=='1'){
            return view('admin.home');
        }else{
            return redirect('/');
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
            $price = $product->discount != null ? $product->discount : $product->price;
            $totalPrice = $price * $request->quantity;

            $cart = Cart::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

            
            if($cart){
                $cart->quantity += $request->quantity; 
                $cart->price = $price * $cart->quantity; 
                $cart->save();
            }else{
            $cart=new Cart;
            $cart->user_id=$user->id;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;

            $cart->product_id=$product->id;
            $cart->product_title=$product->title;
            $cart->price=$totalPrice;
            $cart->quantity=$request->quantity;
            $cart->image=$product->image;
            $cart->save();
            }
            return redirect()->back();

        }else{
            return redirect('login');
        }
    }
    public function view_cart(){
        if(Auth::id()){
            $user=Auth::user()->id;
            $cart=Cart::where('user_id',$user)->get();
            return view('home.cart',compact('cart'));
        }else{
            return redirect('login');
        }

    }
}
