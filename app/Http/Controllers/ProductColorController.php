<?php

namespace App\Http\Controllers;

use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductColorController extends Controller
{
    
    public function index()
    {
        $data['productColors'] = ProductColor::all();
       return view('pages.color.index',$data);
    }

 
    public function create()
    {
        return view('pages.color.create');
    }

    public function store(Request $request)
    {
        $productColor = new ProductColor();
        $productColor->name = $request->name;
        $productColor->description = $request->description;
        $productColor->created_by = Auth::id();
        $productColor->save();
        return redirect()->route('productColor.index');
    }

    public function show($id)
    {
        $data['productColor'] = ProductColor::find($id);
        return view('pages.color.show', $data);
    }


    public function edit( $id)
    {
        $data['productColor'] = ProductColor::find($id);
        return view('pages.color.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $productColor =  ProductColor::find($id);
        $productColor->name = $request->name;
        $productColor->description = $request->description;
        $productColor->updated_by = Auth::id();
        $productColor->save();
        return redirect()->route('productColor.index');
    }


    public function destroy($id)
    {
       $productColor = ProductColor::find($id);
       $productColor->delete();
       return redirect()->route('productColor.index');
    }
}