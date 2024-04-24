<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use App\Models\subcategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index(){
        $products = product::all();
        return view('products.all_products',compact('products'));
    }
    public function Add(){
        $categories = category::all();
        return view('products.add_products', compact('categories'));
    }

    public function Post(Request $request){
        $request->validate([
            'product_name'=>'required|unique:products',
            'product_short_description'=>'required',
            'product_long_description'=>'required',
            'product_price'=>'required',
            'product_quantity'=>'required',
            'product_category_name'=>'required',
            'product_subcategory_name'=>'required',
            'product_img'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product_cate_id = $request->product_category_name;
        $product_cate_name = category::where('id', $product_cate_id)->value('category_name');
        $product_subcate_id = $request->product_subcategory_name;
        $product_subcate_name = subcategory::where('id', $product_subcate_id)->value('subcategory_name');

        $image = $request->file('product_img');
        $img_name = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $img_name);
        $img_url = '/uploads/' . $img_name;


        product::insert([
            'product_name' => $request->product_name,
            'product_short_description' => $request->product_short_description,
            'product_long_description' => $request->product_long_description,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'product_category_name' => $product_cate_name,
            'product_subcategory_name' => $product_subcate_name,
            'product_category_id' => $product_cate_id,
            'product_subcategory_id' => $product_subcate_id,
            'product_img' => $img_url,
            'slug' => strtolower(str_replace(' ','-', $request->product_name)),
        ]);
        category::where('id', $product_cate_id)->increment('product_count');
        subcategory::where('id', $product_subcate_id)->increment('product_count');

        Toastr::success('Product Added Sucessfull', 'Success', ["positionClass" => "toast-top-right", "progressBar" => true, "closeButton" => true]);
        return redirect()->route('all_product');

    }
}
