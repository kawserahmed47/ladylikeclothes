<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductTypeController extends Controller
{
    
    public function index()
    {
        $data['productTypes'] = ProductType::all();
        return view('pages.product_type.index',$data);
    }


    public function create()
    {
        return view('pages.product_type.create');
    }

    public function store(Request $request)
    {
        $productType = new ProductType();
        $productType->name = $request->name;
        $productType->description = $request->description;

        $productType->created_by = Auth::id();


        $image = $request->file('image');

        if($image){


            $image_name = Str::slug($request->name);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='uploads/category/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $productType->image = $image_url;
            }
        }




        $productType->save();
        return  redirect()->route('productType.index');
    }


    public function show($id)
    {
        $data['productType'] = ProductType::find($id);
        return view('pages.product_type.show', $data);
    }


    public function edit($id)
    {
        $data['productType'] = ProductType::find($id);
        return view('pages.product_type.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $productType =  ProductType::find($id);
        $productType->name = $request->name;
        $productType->description = $request->description;
        $productType->status = $request->status ? $request->status : 0;

        $productType->updated_by = Auth::id();


        $image = $request->file('image');

        if($image){

            if($productType->image){
                unlink($productType->image);
            }


            $image_name = Str::slug($request->name);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='uploads/category/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $productType->image = $image_url;
            }
        }


        $productType->save();
        return  redirect()->route('productType.index');
    }


    public function destroy($id)
    {
        $productType = ProductType::find($id);
        $productType->delete();
        return  redirect()->route('productType.index');

    }
}
