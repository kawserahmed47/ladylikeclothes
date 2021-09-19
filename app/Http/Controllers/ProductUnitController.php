<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductUnit;
use App\Models\ProductUnitImage;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Picqer;

class ProductUnitController extends Controller
{


    function generateBarcodeNumber() {
        $number = mt_rand(1000000000, 9999999999); // better than rand()

        // call the same function if the barcode exists already
        if ($this->barcodeNumberExists($number)) {
            return $this->generateBarcodeNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    function barcodeNumberExists($number) {
        // query the database and return a boolean
        return ProductUnit::where('barcode',$number)->exists();
    }
    
    public function index()
    {
        $data['productUnits'] = ProductUnit::with('product', 'product', 'productSize', 'productColor' , 'productUnitImage')->orderBy('id', 'DESC')->get();
        return view('pages.product_unit.index', $data);
    }


    public function create()
    {
        $data['products'] = Product::where('status',1)->get();
        $data['suppliers'] = Supplier::where('status',1)->get();
        $data['productSizes'] = ProductSize::where('status',1)->get();
        $data['productColors'] = ProductColor::where('status',1)->get();


        return view('pages.product_unit.create', $data);
    }

    public function store(Request $request)
    {


        DB::beginTransaction();

        try {


            $productUnit = new ProductUnit();
            $productUnit->product_id = $request->product_id;
            $productUnit->supplier_id = $request->supplier_id;
            $productUnit->product_size_id = $request->product_size_id;
            $productUnit->product_color_id = $request->product_color_id;

            $productUnit->name = $request->name;
            $productUnit->available_stock = $request->available_stock;
            $productUnit->supplier_price = $request->supplier_price;
            $productUnit->max_retail_price = $request->max_retail_price; 
   
            $productUnit->description = $request->description;
            $productUnit->created_by = Auth::id() ;
     
            if($request->barcode){
             $gettingBarcode= $request->barcode;
            }else{
             $gettingBarcode= $this->generateBarcodeNumber();
            }
     
              $productUnit->barcode = $gettingBarcode;
              if($gettingBarcode){
                  // This will output the barcode as HTML output to display in the browser
                  $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                  $productUnit->barcode_view= $generator->getBarcode($gettingBarcode, $generator::TYPE_CODE_128);
              }



              $image = $request->file('image');

              if($image){
      
                  $image_name = Str::slug($request->name)."-".rand(100,999);
                  $ext = strtolower($image->getClientOriginalExtension());
                  $image_full_name=$image_name.".".$ext;
                  $upload_path='uploads/feature/';
                  $image_url=$upload_path.$image_full_name;
                  $success=$image->move($upload_path,$image_full_name);
                  if ($success) {
                      $productUnit->image = $image_url;
                  }
              }
     
     
    
            $productUnit->save();

            DB::commit();
            // all good

            return redirect()->route('productUnit.index');





        } catch (\Exception $ex) {
            DB::rollback();

            $data['message'] = "Server Error";
            $data['error'] = $ex;
            return response()->json($data);
            // something went wrong

            // return redirect()->back();
        }

    }


    public function show($id)
    {
        $data['products'] = Product::all();
        $data['suppliers'] = Supplier::all();
        $data['productUnit'] = ProductUnit::find($id);
        return view('pages.product_unit.show', $data);
    }


    public function edit($id)
    {
        $data['products'] = Product::where('status',1)->get();
        $data['suppliers'] = Supplier::where('status',1)->get();
        $data['productSizes'] = ProductSize::where('status',1)->get();
        $data['productColors'] = ProductColor::where('status',1)->get();
        $data['productUnit'] = ProductUnit::find($id);
        return view('pages.product_unit.edit', $data);
    }


    public function update(Request $request, $id)
    {

        DB::beginTransaction();


        try{


            




        $productUnit = ProductUnit::find($id);
        $productUnit->product_id = $request->product_id;
        $productUnit->supplier_id = $request->supplier_id;
        $productUnit->product_size_id = $request->product_size_id;
        $productUnit->product_color_id = $request->product_color_id;

        $productUnit->name = $request->name;
        $productUnit->available_stock = $request->available_stock;
        $productUnit->supplier_price = $request->supplier_price;
        $productUnit->max_retail_price = $request->max_retail_price; 
        $productUnit->status = $request->status ? $request->status : 0;

        $productUnit->description = $request->description;
        $productUnit->updated_by = Auth::id() ;


        if($request->barcode){
            $gettingBarcode= $request->barcode;
           }else{
            $gettingBarcode= $this->generateBarcodeNumber();
           }
    
             $productUnit->barcode = $gettingBarcode;
             if($gettingBarcode){
                 // This will output the barcode as HTML output to display in the browser
                 $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                 $productUnit->barcode_view= $generator->getBarcode($gettingBarcode, $generator::TYPE_CODE_128);
             }



             $image = $request->file('image');

             if($image){

                if($productUnit->image){
                    unlink($productUnit->image);
                }
     
                 $image_name = Str::slug($request->name)."-".rand(100,999);
                 $ext = strtolower($image->getClientOriginalExtension());
                 $image_full_name=$image_name.".".$ext;
                 $upload_path='uploads/feature/';
                 $image_url=$upload_path.$image_full_name;
                 $success=$image->move($upload_path,$image_full_name);
                 if ($success) {
                     $productUnit->image = $image_url;
                 }
             }

            

        $productUnit->save();

        $additionalImages =   $request->file('additional_images');

        if($additionalImages){

            $unitImages = ProductUnitImage::where('product_unit_id', $id)->get();

            if($unitImages){
                foreach($unitImages as $unitImage){

                    if($unitImage->image){
                        unlink($unitImage->image);
                        ProductUnitImage::where('id',$unitImage->id)->delete();
                    }

                }
            }



            foreach($additionalImages as $additionalImage){

                if($additionalImage){

                    $unitImage = new ProductUnitImage();
                    $unitImage->product_unit_id = $id;
                    $additionalImage_name = Str::slug($request->name)."-".rand(100,999);
                    $ext = strtolower( $additionalImage->getClientOriginalExtension());
                    $additionalImage_full_name= $additionalImage_name.".".$ext;
                    $upload_path='uploads/units/';
                    $additionalImage_url=$upload_path. $additionalImage_full_name;
                    $success= $additionalImage->move($upload_path, $additionalImage_full_name);
                     if ($success) {
                        $unitImage->image =  $additionalImage_url;
                        $unitImage->save();
                     }



                 }

            }



        }
 


        DB::commit();
        // all good
        
        return redirect()->route('productUnit.index');





        } catch (\Exception $ex) {
            DB::rollback();
            // something went wrong
            $data['message'] = "Server Error";
            $data['error'] = $ex;
            return response()->json($data);
        }






    }


    public function destroy($id)
    {
        $productUnit = ProductUnit::find($id);
        $productUnit->delete();
        return redirect()->route('productUnit.index');

    }
}