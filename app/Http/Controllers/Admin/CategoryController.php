<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index(){
        $categories = category::all(); //show last added data in the last
        // $categories = category::latest()->get();  //show last added data in the first

        return view('categories.all_category', compact('categories'));
    }
    public function Add(){
        return view('categories.add_category');
    }
    public function PostCategory(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories',
        ]);

        category::create([
            'category_name'=> $request->category_name,
            'slug'=> strtolower(str_replace(' ','-', $request->category_name))
        ]);

        Toastr::success('Category Added Sucessfull', 'Success', ["positionClass" => "toast-top-right", "progressBar" => true, "closeButton" => true]);
        return redirect()->route('all_category');
    }

    public function EditCategory($id){
        $category_info = category::findOrFail($id);
        return view('categories.edit_category', compact('category_info'));
    }

    public function UpdateCategory(Request $request){
        $category_id = $request->category_id;
        $request->validate([
            'category_name'=>'required|unique:categories',
        ]);

        category::findOrFail($category_id)->update([
            'category_name'=> $request->category_name,
            'slug'=> strtolower(str_replace(' ','-', $request->category_name))
        ]);
        Toastr::success('Category Updated Sucessfull', 'Success', ["positionClass" => "toast-top-right", "progressBar" => true, "closeButton" => true]);
        return redirect()->route('all_category');
    }
}
