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

        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            ->with(array('product'=>function($q1){
                $q1->with(array('productUnits'=>function($q2){
                    $q2->where('status', 1)->inRandomOrder()->limit(15)->get();
                }))->where('status', 1)->get();
            }))
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        
    
        return view('frontend.pages.index', $data);
    }

    public function about(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
        
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        return view('frontend.pages.about', $data);
    }


    public function contact(){

        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        return view('frontend.pages.contact', $data);

    }

    public function wishlist(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        return view('frontend.pages.wishlist', $data);
    }

    public function userProfile(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        return view('frontend.pages.profile', $data);
    }


    public function cart(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        return view('frontend.pages.cart', $data);
    }

    public function checkout(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        return view('frontend.pages.checkout', $data);
    }

    public function trackMyOrder(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        return view('frontend.pages.track_order', $data);
    }


    public function products(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();

        $data['products'] = ProductUnit::with(array('product'=>function($q1){
            $q1->with('category')->get();
        }))->paginate(9);

        // return response()->json($data, 200);
        return view('frontend.pages.products', $data);
        
    }

    public function productsByCategory($slug, $id){
        $data = array();

        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')->get();
        }))->where('status', 1)->where('parent_id', 0)->get();

        $data['products'] = Product::with('productUnits', 'category')->where('category_id', $id)->where('status', 1)->get();


        return view('frontend.pages.products_by_category', $data);
    }


    public function productDetails($slug, $id){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();

        $data['unit'] = ProductUnit::with(array('product'=>function($q1){
            $q1->with('category')->get();
        }))
        ->with('productUnitImage')
        ->where('id', $id)->first();

        $data['relatedProducts'] = ProductUnit::with(array('product'=>function($q1){
            $q1->with('category')->get();
        }))->inRandomOrder()->limit(6)->where('product_id', $data['unit']->product_id)->get();

        return view('frontend.pages.product_details', $data);
        
    }


    public function howToShop(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        return view('frontend.pages.how_to_shop', $data);
    }

    public function faq(){

        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        return view('frontend.pages.faq', $data);

    }

    public function login(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        return view('frontend.pages.login', $data);
    }

    public function paymentMethod(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        return view('frontend.pages.payment_methods', $data);
    }

    public function moneyBackGuaranty(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        return view('frontend.pages.money_back', $data);
    }

    public function returns(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        return view('frontend.pages.return', $data);
    }

    public function shipping(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        return view('frontend.pages.shipping', $data);
    }

    public function conditions(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        return view('frontend.pages.conditions', $data);
    }

    public function privacy(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        return view('frontend.pages.privacy', $data);
    }


}
