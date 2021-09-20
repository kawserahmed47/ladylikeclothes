<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class SliderController extends Controller
{
    
    public function index()
    {
        $data['sliders'] = Slider::all();
        return view('pages.slider.index',$data);
    }


    public function create()
    {
        return view('pages.slider.create');
    }

    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->name = $request->name;
        $slider->description = $request->description;

        $slider->created_by = Auth::id();


        $image = $request->file('image');

        if($image){


            $image_name = Str::slug($request->name);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='uploads/sliders/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $slider->image = $image_url;
            }
        }




        $slider->save();
        return  redirect()->route('slider.index');
    }


    public function show($id)
    {
        $data['slider'] = Slider::find($id);
        return view('pages.slider.show', $data);
    }


    public function edit($id)
    {
        $data['slider'] = Slider::find($id);
        return view('pages.slider.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $slider =  Slider::find($id);
        $slider->name = $request->name;
        $slider->description = $request->description;
        $slider->status = $request->status ? $request->status : 0;

        $slider->updated_by = Auth::id();


        $image = $request->file('image');

        if($image){

            if($slider->image){
                unlink($slider->image);
            }


            $image_name = Str::slug($request->name);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='uploads/slider/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $slider->image = $image_url;
            }
        }


        $slider->save();
        return  redirect()->route('slider.index');
    }


    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return  redirect()->route('slider.index');

    }
}