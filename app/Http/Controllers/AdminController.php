<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class AdminController extends Controller
{

    public function view_category(){
        $categories = Category::all();
        return view('admin.category',compact('categories'));
    }

    public function add_category(Request $request){
        $data=new Category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message','Category Added Successfully');
    }
    public function delete_category($id){
        $category=Category::find($id);
        $category->delete();
        return redirect()->back()->with('message','Category Deleted Successfully');
    }

    public function view_product(){
        $products = Product::all();
        return view('admin.product.view',compact('products'));
    }
    public function add_product_page(){
        $categories=Category::all();
        return view('admin.product.add',compact('categories'));
    }
    public function add_product(Request $request){
            $data=new Product;
            $data->title=$request->title;
            $data->category=$request->category;
            $data->price=$request->price;
            $data->quantity=$request->quantity;
            $data->discount=$request->discount;
            $data->description=$request->description;
            $image=$request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $data->image=$imagename;
            $data->save();
            return redirect()->back()->with('message','Product Added Successfully');
    }
    public function delete_product($id){
        $product=Product::find($id);
        $product->delete();
        return redirect()->back()->with('message',value: 'Product Deleted Successfully');
    }
    public function update_product($id){
        $categories=Category::all();
        $product=Product::find($id);
        return view('admin.product.update',compact('product','categories'));

    }
    public function updateProduct(Request $request,$id){
        $product=Product::find($id);
        $product->title = $request->input('title');
        $product->category = $request->input('category');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->discount = $request->input('discount');
        $product->description = $request->input('description');
        if ($request->hasFile('image')) {
            $image=$request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;
        }
        $product->save();
        return redirect()->back()->with('message',value: 'Product Updated Successfully');

    }
    public function getOrders(){
        $orders=Order::all();
        return view('admin.order.orders',compact('orders'));
    }
    public function getOrderDetail($id){
        
        $order_detail=OrderItem::where('order_id', $id)->get();
        return view('admin.order.detail',compact('order_detail', 'id'));
    }
    public function confirmDelivery($id){
        $order=Order::find($id);
        $order->delivery_status="Delivered";
        $order->save();
        return redirect()->back();
    }
}
