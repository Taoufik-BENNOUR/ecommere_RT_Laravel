<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
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
}
