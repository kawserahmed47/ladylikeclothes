<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\ProductUnit;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $data = array();

        // $data['products'] = Product::all();
        // $data['brands'] = Brand::all();
        // $data['productType'] = ProductType::all();
        // $data['categories']= Category::with(array('children'=>function($q){
        //     $q->with('parent', 'children')->get();
        // }))->get();
        // $data['productUnits'] = ProductUnit::with(array('product'=>function($q){
        //     $q->with('brand', 'category')->get();
        // }))->get();
        return view('frontend.pages.index', $data);
    }

    public function about(){
        $data = array();
        return view('frontend.pages.about', $data);
    }


    public function contact(){

        $data = array();
        return view('frontend.pages.contact', $data);

    }

    public function wishlist(){
        $data = array();
        return view('frontend.pages.wishlist', $data);
    }

    public function userProfile(){
        $data = array();
        return view('frontend.pages.profile', $data);
    }


    public function cart(){
        $data = array();
        return view('frontend.pages.cart', $data);
    }

    public function checkout(){
        $data = array();
        return view('frontend.pages.checkout', $data);
    }

    public function trackMyOrder(){
        $data = array();
        return view('frontend.pages.track_order', $data);
    }


    public function products(){
        $data = array();
        return view('frontend.pages.products', $data);
        
    }

    public function productsByCategory($slug){
        $data = array();
        return view('frontend.pages.products_by_category', $data);
    }


    public function productDetails($slug){
        $data = array();
        return view('frontend.pages.product_details', $data);
        
    }


    public function howToShop(){
        $data = array();
        return view('frontend.pages.how_to_shop', $data);
    }

    public function faq(){

        $data = array();
        return view('frontend.pages.faq', $data);

    }

    public function login(){
        $data = array();
        return view('frontend.pages.login', $data);
    }

    public function paymentMethod(){
        $data = array();
        return view('frontend.pages.payment_methods', $data);
    }

    public function moneyBackGuaranty(){
        $data = array();
        return view('frontend.pages.money_back', $data);
    }

    public function returns(){
        $data = array();
        return view('frontend.pages.return', $data);
    }

    public function shipping(){
        $data = array();
        return view('frontend.pages.shipping', $data);
    }

    public function conditions(){
        $data = array();
        return view('frontend.pages.conditions', $data);
    }

    public function privacy(){
        $data = array();
        return view('frontend.pages.privacy', $data);
    }


}
