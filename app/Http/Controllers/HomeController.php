<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

use Session;
use Stripe;
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
    public function delete_cart($id){
       $cart=Cart::find($id);
       $cart->delete();
       return redirect()->back();
    }

    public function view_checkout(){
        if(Auth::id()){
            $user=Auth::user();
            $cartItems =Cart::where('user_id',$user->id)->get();

            return view('home.checkout',compact('cartItems'));
        }else{
            return redirect('login');
        }
    }
    public function command(Request $request){
        if(Auth::id()){
            $user=Auth::user();
            $cartItems =Cart::where('user_id',$user->id)->get();
            if ($cartItems->isEmpty()) {
                return redirect()->back()->with('message', 'Your cart is empty.');
            }
                 $order=new Order;
                $order->user_id=$user->id;
                $order->payment_status = "Cash on delivery";
                $order->delivery_status = "Processing";
                $totalPrice = 0;
                $order->save();

                foreach ($cartItems as $cartItem) {
                    
                    $totalPrice += $cartItem->price;
        
                    $orderItem = new OrderItem;

                    $orderItem->order_id = $order->id;
                    $orderItem->user_id = $cartItem->user_id;
                    $orderItem->product_id = $cartItem->product_id;

                    $orderItem->name = $cartItem->name;
                    $orderItem->email = $cartItem->email;
                    $orderItem->address = $cartItem->address;
                    $orderItem->phone = $cartItem->phone;

                    $orderItem->product_title = $cartItem->product_title;
                    $orderItem->quantity = $cartItem->quantity;
                    $orderItem->price = $cartItem->price; 
                    $orderItem->save();
        
                    $order->items()->save($orderItem);
                }
                $order->total_price = $totalPrice;

                $order->save();
                Cart::where('user_id', $user->id)->delete();

            return redirect()->back();
            
        }else{
            return redirect('login');
        }
    }
            public function stripe($total){
                $user=Auth::user();
                $cartItems =Cart::where('user_id',$user->id)->get();
                if ($cartItems->isEmpty()) {
                    return redirect('/');
                }
                return view('home.stripe',compact('total'));
            }
        public function stripePost(Request $request,$total){

               
            try {
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                Stripe\Charge::create([
                    "amount" => $total * 100,  // Amount in cents
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Test payment"
                ]);
                if(Auth::id()){
                    $user=Auth::user();
                    $cartItems =Cart::where('user_id',$user->id)->get();
    
                         $order=new Order;
                        $order->user_id=$user->id;
                        $order->payment_status = "Paid";
                        $order->delivery_status = "Processing";
                        $totalPrice = 0;
                        $order->save();
        
                        foreach ($cartItems as $cartItem) {
                            
                            $totalPrice += $cartItem->price;
                
                            $orderItem = new OrderItem;
        
                            $orderItem->order_id = $order->id;
                            $orderItem->user_id = $cartItem->user_id;
                            $orderItem->product_id = $cartItem->product_id;
        
                            $orderItem->name = $cartItem->name;
                            $orderItem->email = $cartItem->email;
                            $orderItem->address = $cartItem->address;
                            $orderItem->phone = $cartItem->phone;
        
                            $orderItem->product_title = $cartItem->product_title;
                            $orderItem->quantity = $cartItem->quantity;
                            $orderItem->price = $cartItem->price; 
                            $orderItem->save();
                
                            $order->items()->save($orderItem);
                        }
                        $order->total_price = $totalPrice;
        
                        $order->save();
                        Cart::where('user_id', $user->id)->delete();
                    }
                Session::flash('success', 'Payment successful!');
                return redirect()->back();
            } catch (\Stripe\Exception\CardException $e) {
                // Handle card errors
                Session::flash('error', $e->getMessage());
                return back()->withErrors(['payment' => "Your card was declined."]);
            } catch (\Exception $e) {
                // Handle other errors
                Session::flash('error', 'An error occurred while processing your payment. Please try again.');
                return back()->withErrors(['payment' => 'An error occurred.']);
            }
    }
    public function getProducts(){
        $products = Product::paginate(9);
        $categories=Category::all();
        return view('home.products',compact('products','categories'));
    }
    public function searchProduct(Request $request){
        $categories=Category::all();
        $query = $request->input('search');
        $category =$request->category;
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        $products = Product::query();
        if ($query) {
            $products->where('title', 'LIKE', "%$query%");
        }

        if ($category) {
            $products->Where('category', 'LIKE', "%$category%");
        }
        if (!is_null($minPrice) && !is_null($maxPrice)) {
            $products->whereBetween('price', [(int)$minPrice, (int)$maxPrice]);
        }
        $products = $products->orderBy('price', 'asc')->paginate(9);
        return view("home.products",compact("products","categories",));
    }
}
