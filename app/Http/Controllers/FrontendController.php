<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductType;
use App\Models\ProductUnit;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $data = array();

        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            ->with(array('product'=>function($q1){
                $q1->with(array('productUnits'=>function($q2){
                    $q2->where('status', 1)->limit(15)->get();
                }))->where('status', 1)->get();
            }))
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        
        $data['productTypeTops']= ProductType::where('status', 1)->limit(3)->orderBy('id', 'asc')->get();
        $data['productTypeBottoms']= ProductType::where('status', 1)->orderBy('id', 'desc')->first();

        $data['dealOfTheDays'] = ProductUnit::with('product', 'productUnitImage')->inRandomOrder()->limit(2)->get();

        $data['sliders'] = Slider::where('status', 1)->get();

        return view('frontend.pages.index', $data);
    }

    public function about(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
        
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="About Us";
        return view('frontend.pages.about', $data);
    }


    public function contact(){

        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="Contact Us";
        return view('frontend.pages.contact', $data);

    }

    public function wishlist(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="Wishlist";
        return view('frontend.pages.wishlist', $data);
    }

    public function userProfile(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="Profile";
        return view('frontend.pages.profile', $data);
    }


    public function cart(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="Cart";
        return view('frontend.pages.cart', $data);
    }

    public function checkout(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="Checkout";
        return view('frontend.pages.checkout', $data);
    }

    public function trackMyOrder(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="Track Order";
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

        $data['sizes'] = ProductSize::where('status', 1)->get();
        $data['colors'] = ProductColor::where('status', 1)->get();




        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="All Products";

        // return response()->json($data, 200);
        return view('frontend.pages.products', $data);
        
    }


    public function productsByFilter(Request $request){

        $categories = $request->category;

        

        $price_range = $request->price_range;

        if($price_range == 1 ){
            $start_price = 100;
            $end_price = 500;
        }elseif($price_range == 2){
            $start_price = 501;
            $end_price = 1000;
        }elseif($price_range == 3){
            $start_price = 1001;
            $end_price = 2000;
        }else{
            $price_range = false;
        }


        $color = $request->color;
        $size = $request->size;

        $products = array();

        if($categories){
            $products = Product::whereIn('category_id', $categories)->select('id')->get();
        }

        $query = ProductUnit::with(array('product'=>function($q1){
            $q1->with('category')->get();
        }));

        if($price_range){
            $query->whereBetween('max_retail_price', [$start_price, $end_price]);
        }

        if($color){
            $query->whereIn('product_color_id', $color);
        }

        if($size){
            $query->whereIn('product_size_id', $size);
        }

        if($products){
            $query->whereIn('product_id', $products);
        }

        $data['products']=$query->paginate(9);

        return view('frontend.pages.load_products', $data);


    }

    public function productsBySearch(Request $request){
        $searchKey = $request->search;

        $product = Product::where('name', 'LIKE', "%$searchKey%" )->select('id')->get();

        $data['products'] = ProductUnit::with(array('product'=>function($q1){
            $q1->with('category')->get();
        }))
        ->whereIn('product_id', $product)
        ->limit(6)->inRandomOrder()->get();

        return view('frontend.layouts.search_bar', $data);


    }

    public function productsByCategory($slug, $id){
        $data = array();

        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')->get();
        }))->where('status', 1)->where('parent_id', 0)->get();

        $data['products'] = Product::with('productUnits', 'category')->where('category_id', $id)->where('status', 1)->get();

        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="Category";

        return view('frontend.pages.products_by_category', $data);
    }

    public function productByParentCategory($slug, $id){

        $data = array();

        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')->get();
        }))->where('status', 1)->where('parent_id', 0)->get();

        $childrenCategories = Category::where('parent_id', $id)->where('status',1)->select('id')->get();

        $data['products'] = Product::with('productUnits', 'category')->whereIn('category_id', $childrenCategories)->where('status', 1)->get();
        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="Category";
      

        // return response()->json($data, 200);
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
        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="How to Shop";
        return view('frontend.pages.how_to_shop', $data);
    }

    public function faq(){

        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="FAQ";
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
        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="Payment Method";
        return view('frontend.pages.payment_methods', $data);
    }

    public function moneyBackGuaranty(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="Money Back Guaranty";
        return view('frontend.pages.money_back', $data);
    }

    public function returns(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="Returns Policy";
        return view('frontend.pages.return', $data);
    }

    public function shipping(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="Shipping Information";
        return view('frontend.pages.shipping', $data);
    }

    public function conditions(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="Tears and Conditions";
        return view('frontend.pages.conditions', $data);
    }

    public function privacy(){
        $data = array();
        $data['categories']= Category::with(array('children'=>function($q){
            $q->with('parent', 'children')
            
            ->get();
        }))->where('status', 1)->where('parent_id', 0)->get();
        $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
        $data['title'] ="Privacy";
        return view('frontend.pages.privacy', $data);
    }


}
