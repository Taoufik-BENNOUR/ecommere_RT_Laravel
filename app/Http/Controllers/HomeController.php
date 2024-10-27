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
use App\Models\Comment;

use Session;
use Stripe;
class HomeController extends Controller
{
    public function index(){
        $products=Product::paginate(3);
        $tshirt=Product::where('category','tshirt')->limit(2)->get();
        $discountProducts = Product::where('discount','!=',null)->paginate(3);
        $latestProducts = Product::orderBy('created_at', 'desc')->limit(8)->get();
        
        return view('home.userpage',compact('latestProducts','products','tshirt','discountProducts'));
    }
    public function redirect(){
        $userType=Auth::user()->userType;
        $products=Product::all()->count();
        $orders=Product::all()->count();
        $users=Product::all()->count();
        $orders_total=Order::all();
        $total_revenue=0;
        $total_order=0;
        foreach ($orders_total as $total) {
            if($total->payment_status == 'Paid'){
                $total_revenue+=$total->total_price;
        }else{
            $total_order+=$total->total_price;
        }
    }
  
        if($userType=='1'){
            return view('admin.home',compact('products','orders','users','total_revenue','total_order'));
        }else{
            return redirect('/');
        }
    }
    public function getProduct($id){
        $product=Product::find($id);
        $comments=Comment::where("product_id",$id)->get();
        $rating5=Comment::where("product_id",$id)->where('rating',5)->get()->count();
        return view('home.productDetail',compact('product','comments',"rating5"));
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
                $cart->total = $price * $cart->quantity; 
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
            $cart->price=$price;
            $cart->total=$totalPrice;
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
                    
                    $totalPrice += $cartItem->total;
        
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
                    $orderItem->total = $cartItem->total; 
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
                            
                            $totalPrice += $cartItem->total;
                
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
                            $orderItem->total = $cartItem->total; 
 
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
        $price = $request->price??'asc';
        $show = $request->show??6;
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
        $products = $products->orderBy('price', $price)->paginate($show);
        return view("home.products",compact("products","categories",));
    }
    public function addComment(Request $request,$id){
        if(Auth::id()){
           $user=Auth::user();
           $comment = new Comment();
           $comment->user_id = $user->id;
           $comment->product_id = $id;
           $comment->name = $user->name;
           $comment->rating = $request->rating;
           $comment->comment = $request->message;
           $comment->save();
            return redirect()->back();
        }else{
            return redirect('login');
        }
    }
    public function getOrders(){
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('home.orders',compact('orders'));
    }
}
