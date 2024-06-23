<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\category;
use App\Models\product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;

class FrontendController extends Controller
{
    public function Category($id){
        $categories = category::findOrFail($id);
        $products =  product::where('product_category_id', $id)->get();
        return view('frontend.category_page.category_page',compact('categories', 'products'));
    }

    public function ViewDetails($id){
        $products = product::findOrFail($id);
        return view('frontend.all-pages.view_details', compact('products'));
    }
    public function Cart(){
        $items = Cart::where('user_id', Auth::id())->get();
        return view('frontend.all-pages.cart', compact('items'));
    }

    public function AddToCart(Request $request){
        $total_price = $request->product_price;
        $total_product = $request->selected_quantity;
        $price = $total_price * $total_product;
        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->selected_quantity,
            'price' => $price,
        ]);

        Toastr::success('Product added to the cart successfully', 'Success', ["positionClass" => "toast-top-right", "progressBar" => true, "closeButton" => true]);
        return redirect()->route('cart');
    }

    public function Checkout(){
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();

        // Fetching all districts of Dhaka division
        $dhakaDivision = Division::where('name', 'Dhaka')->first();
        $allDistrictsOfDhaka = $dhakaDivision->districts;

        // Fetching all districts of the first division
        $firstDivision = Division::first();
        $districtsOfFirstDivision = $firstDivision->districts;

        // Fetching all upazilas of the first district
        $firstDistrict = District::first();
        $upazilasOfFirstDistrict = $firstDistrict->upazilas;

        $items = Cart::where('user_id', Auth::id())->get();

        return view('frontend.all-pages.checkout', compact('items', 'divisions', 'districts', 'upazilas'));
    }

}
