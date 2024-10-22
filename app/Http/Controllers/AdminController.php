<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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
        return redirect()->back()->with('message','Product Deleted Successfully');

    }
}
