<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\subcategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function Index(){
        $sub_categories = subcategory::all();
        return view('subcategories.all_subcategories', compact('sub_categories'));
    }
    public function Add(){
        $categories = category::all();
        return view('subcategories.add_subcategories', compact('categories'));
    }

    public function PostSubcategory(Request $request){
        $category_id = $request->category_id;
        $request -> validate([
            'subcategory_name'=> 'required|unique:subcategories',
            'category_id'=> 'required|exists:categories,id'
        ]);

        $category_name = category::where('id',$category_id)->value('category_name');

        subcategory::create([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $category_id,
            'category_name' => $category_name,
            'slug'=> strtolower(str_replace(' ','-', $request->subcategory_name))
        ]);

        category::where('id', $category_id)->increment('subcategory_count');

        Toastr::success('Sub-Category Added Sucessfull', 'Success', ["positionClass" => "toast-top-right", "progressBar" => true, "closeButton" => true]);
        return redirect()->route('all_subcategory');
    }

    public function EditSubcategory($id){
        $subcategory_info = subcategory::findOrFail($id);
        return view('subcategories.edit_subcategories', compact('subcategory_info'));
    }

    public function UpdateSubcategory(Request $request){
        $subcategory_id = $request->subcategory_id;
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories'
        ]);

        subcategory::findOrFail($subcategory_id)->update([
            'subcategory_name' => $request->subcategory_name,
            'slug'=> strtolower(str_replace(' ','-', $request->subcategory_name))
        ]);
        Toastr::success('Sub-Category Updated Sucessfull', 'Success', ["positionClass" => "toast-top-right", "progressBar" => true, "closeButton" => true]);
        return redirect()->route('all_subcategory');
    }

    public function getSubcategories(Request $request)
    {
        
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();

        return response()->json($subcategories);
    }

}
