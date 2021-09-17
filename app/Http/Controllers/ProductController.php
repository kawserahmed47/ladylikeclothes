<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    
    public function index()
    {
        $data['products'] = Product::all();
        return view('pages.product.index', $data);
    }


    public function create()
    {
        // $data['brands'] = Brand::all();
        $data['categories'] = Category::with('children', 'parent')->where('parent_id', 0)->where('status', 1)->get();
        $data['productTypes'] = ProductType::all();
        return view('pages.product.create', $data);
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->product_type_id = $request->product_type_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->created_by = Auth::id();
        $product->save();

        return redirect()->route('product.index');

        


    }


    public function show($id)
    {
        $data['product'] = Product::find($id);
        $data['brands'] = Brand::all();
        $data['categories'] = Category::all();
        $data['productTypes'] = ProductType::all();
        return view('pages.product.show', $data);
    }


    public function edit($id)
    {
        $data['product'] = Product::find($id);
        // $data['brands'] = Brand::all();
        $data['categories'] = Category::with('children', 'parent')->where('parent_id', 0)->where('status', 1)->get();
        $data['productTypes'] = ProductType::all();
        return view('pages.product.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $product =  Product::find($id);
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->product_type_id = $request->product_type_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->status = $request->status ? $request->status : 0;

        $product->updated_by = Auth::id();
        $product->save();

        return redirect()->route('product.index');
    }


    public function destroy($id)
    {

       $product = Product::find($id);
       $product->delete();
       return redirect()->route('product.index');

    }
}
