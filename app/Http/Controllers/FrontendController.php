<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function Category($id){
        $categories = category::findOrFail($id);
        $products =  product::where('product_category_id', $id)->get();
        return view('frontend.category_page.category_page',compact('categories', 'products'));
    }
}
