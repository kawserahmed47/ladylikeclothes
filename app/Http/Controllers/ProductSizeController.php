<?php

namespace App\Http\Controllers;

use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductSizeController extends Controller
{
    
    public function index()
    {
        $data['productSizes'] = ProductSize::all();
       return view('pages.size.index',$data);
    }

 
    public function create()
    {
        return view('pages.size.create');
    }

    public function store(Request $request)
    {
        $size = new ProductSize();
        $size->name = $request->name;
        $size->description = $request->description;
        $size->created_by = Auth::id();
        $size->save();
        return redirect()->route('productSize.index');
    }

    public function show($id)
    {
        $data['productSize'] = ProductSize::find($id);
        return view('pages.size.show', $data);
    }


    public function edit( $id)
    {
        $data['productSize'] = ProductSize::find($id);
        return view('pages.size.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $size =  ProductSize::find($id);
        $size->name = $request->name;
        $size->description = $request->description;
        $size->updated_by = Auth::id();
        $size->save();
        return redirect()->route('productSize.index');
    }


    public function destroy($id)
    {
       $size = ProductSize::find($id);
       $size->delete();
       return redirect()->route('productSize.index');
    }
}