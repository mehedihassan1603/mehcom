<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index(){
        $products = product::all();
        return view('frontend.homepage.home', compact('products'));
    }
}
