<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{


    
    public function index()
    {
        $data['categories'] = Category::with('children', 'parent')->where('parent_id', 0)->where('status', 1)->get();
        return view('pages.category.index', $data);
    }


    public function create()
    {
        $data['categories'] = Category::where('parent_id', 0)->where('status', 1)->get();
        return view('pages.category.create', $data);
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->parent_id ? $request->parent_id : 0;
        $category->description = $request->description;
        $category->created_by = Auth::id();


        $image = $request->file('image');

        if($image){
            $image_name = Str::slug($request->name);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='uploads/category/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $category->image = $image_url;
            }
        }



        $category->save();

        return redirect()->route('category.index');
    }


    public function show($id)
    {
        $data['category'] = Category::find($id);
        return view('pages.category.show', $data);
    }


    public function edit($id)
    {
        $data['category'] = Category::find($id);
        $data['categories'] = Category::where('parent_id', 0)->where('status', 1)->get();
        return view('pages.category.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $category =  Category::find($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id ? $request->parent_id : 0;
        $category->description = $request->description;
        $category->status = $request->status ? $request->status : 0;

        $category->updated_by = Auth::id();


        $image = $request->file('image');

        if($image){

            if($category->image){
                unlink($category->image);
            }


            $image_name = Str::slug($request->name);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='uploads/category/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $category->image = $image_url;
            }
        }


        $category->save();

        return redirect()->route('category.index');
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index');
    }
}
