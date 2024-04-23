<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Add(){
        $categories = category::all();
        return view('products.add_products', compact('categories'));
    }

    public function Post(Request $request){
        $request->validate([
            'product_name'=>'required',
            'product_short_description'=>'required',
            'product_long_description'=>'required',
            'product_price'=>'required',
            'product_category_name'=>'required',
            'product_subcategory_name'=>'required',
        ]);
    }
}
