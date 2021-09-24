<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Slider;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    
    public function index()
    {
        return view('pages.customer.index');
    }


    public function create()
    {
        return view('pages.customer.create');
    }

    public function customerLogin(Request $request){

        $email = NULL;
        $mobile = NULL;

        $email_or_mobile =  $request->email_or_mobile;

        if (strpos($email_or_mobile, '@') !== false) {
            $email = $email_or_mobile;
            Auth::attempt(['email' => $email, 'password' => $request->password]);

        }else{
            $mobile = $email_or_mobile;
            Auth::attempt(['mobile' => $mobile, 'password' => $request->password]);

        }

        if(Auth::check()){
            $data['status'] = true;
            $data['message'] = "Login Successfully";
            return response()->json($data, 200);


        }else{

            $data['status'] = false;
            $data['message'] = "Login Failed";
            return response()->json($data, 500);

        }



    }

    public function forgetPassword(Request $request){

        $email = NULL;
        $mobile = NULL;

        $email_or_mobile =  $request->email_or_mobile;

        if (strpos($email_or_mobile, '@') !== false) {
            $email = $email_or_mobile;
            $checkEmail = User::where('email', $email)->exists(); 

            if($checkEmail ){

                $data['email_or_mobile'] =  $email_or_mobile;
                return view('frontend.pages.forget_password', $data);

            }else{
                $data['status'] = false;
                $data['message'] = "your email or mobile not found";
                return response()->json($data,404);
            }
        }else{
            $mobile = $email_or_mobile;

            $checkMobile = User::where('mobile', $mobile)->exists(); 

            if($checkMobile ){
                $data['email_or_mobile'] = $email_or_mobile;
                return view('frontend.pages.forget_password', $data);

            }else{
                $data['status'] = false;
                $data['message'] = "your email or mobile not found";
                return response()->json($data,404);
            }


        }





    }

    public function resetPassword(Request $request){

        $email = NULL;
        $mobile = NULL;

        $email_or_mobile =  $request->email_or_mobile;

        if (strpos($email_or_mobile, '@') !== false) {
            $email = $email_or_mobile;
            $checkEmail = User::where('email', $email)->first(); 

            if($checkEmail ){

                $checkEmail->password = Hash::make($request->password);
                $checkEmail->save();

                $data['status'] = true;
                $data['message'] = "Password Reset Successfully !";
                return response()->json($data,200);


            }else{
                $data['status'] = false;
                $data['message'] = "your email or mobile not found";
                return response()->json($data,404);
            }
        }else{
            $mobile = $email_or_mobile;

            $checkMobile = User::where('mobile', $mobile)->first(); 

            if($checkMobile ){
                $checkMobile->password = Hash::make($request->password);
                $checkMobile->save();

                $data['status'] = true;
                $data['message'] = "Password Reset Successfully !";
                return response()->json($data,200);

            }else{
                $data['status'] = false;
                $data['message'] = "your email or mobile not found";
                return response()->json($data,404);
            }


        }

    }

    public function profileUpdate(Request $request){


        $user = User::where('id', Auth::id())->where('role_id', 2)->first();

        if($user){

            
        DB::beginTransaction();

        try {
 
         $user->name = $request->name;
         $user->email = $request->email;
         $user->mobile = $request->mobile;
         if($request->password){
            $user->password = Hash::make($request->new_password);
         }
  
         if($user->save()){
  
           $customer =  Customer::where('user_id', $user->id)->first();
  
           $customer->name = $request->name;
           $customer->email = $request->email;
           $customer->mobile = $request->mobile;
           $customer->address = $request->address;
           $customer->updated_by = Auth::id();
  
           $customer->save();
  
         }
           
         DB::commit();
         // all good
 
         $data['status'] = true;
         $data['message'] = "Profile Update Successfully";
 
         
 
 
        } catch (\Exception $th) {
 
         DB::rollback();
 
         $data['status'] = false;
         $data['message'] = "Server Error";
         $data['errors'] = $th;
 
         return response()->json($data, 500);
           
        }
 

        }else{
            $data['status'] = false;
            $data['message'] = "Not Found";
            return response()->json($data, 404);

        }




    }



    public function store(Request $request)
    {



        DB::beginTransaction();

       try {

        
        $email = NULL;
        $mobile = NULL;

        $email_or_mobile =  $request->email_or_mobile;

        if (strpos($email_or_mobile, '@') !== false) {
            $email = $email_or_mobile;
        }else{
            $mobile = $email_or_mobile;
        }

        $user = new User();
        $user->role_id = 2; 
        $user->permission_id  = 1;
        $user->email = $email;
        $user->mobile = $mobile;
        $user->password = Hash::make($request->password);
 
        if($user->save()){
 
         if (strpos($email_or_mobile, '@') !== false) {
             Auth::attempt(['email' => $email, 'password' => $request->password]);
         }else{
             Auth::attempt(['mobile' => $mobile, 'password' => $request->password]);
         }
 
 
          $customer = new Customer();
 
          $customer->user_id = $user->id;
          $customer->id_no = rand(100000, 999999);
 
          $customer->email =  $email;
          $customer->mobile = $mobile;
 
          if(Auth::check()){
              $customer->created_by = Auth::id();
          }
 
          $customer->save();
 
        }
          
        DB::commit();
        // all good

        $data['status'] = true;
        $data['message'] = "Registration Successfully";

        


       } catch (\Exception $th) {

        DB::rollback();

        $data['status'] = false;
        $data['message'] = "Server Error";
        $data['errors'] = $th;

        return response()->json($data, 500);
          
       }

    


    }


    public function customerProfile(){

        if(Auth::check()){
            $data['customer'] = Customer::where('user_id', Auth::id())->first();
            $data['categories']= Category::with(array('children'=>function($q){
                $q->with('parent', 'children')
                
                ->get();
            }))->where('status', 1)->where('parent_id', 0)->get();
            $data['slider'] = Slider::where('status', 1)->inRandomOrder()->first();
            $data['title'] ="Profile";

            
            $data['orders'] = Order::with(array('orderDetails'=>function($q1){
                $q1->with('product', 'productUnit')->get();
            }))->where('user_id',Auth::id())->get();

            return view('frontend.pages.profile', $data);
        }else{
            return redirect()->back();
        }
    }

    public function show($id)
    {
        return view('pages.customer.show');
    }


    public function edit($id)
    {
        return view('pages.customer.edit');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
