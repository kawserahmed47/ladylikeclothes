<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
  
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        if($subscriber->save()){
            $data['status'] = true;
            $data['message'] = "Successfully Subscribed !";
            return response()->json($data, 200);
        }else{
            $data['status'] = false;
            $data['message'] = "Failed Subscribed !";
            return response()->json($data, 500);
        }
       

        
    }

 
    public function show(Subscriber $subscriber)
    {
        //
    }

 
    public function edit(Subscriber $subscriber)
    {
        //
    }


    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }


    public function destroy(Subscriber $subscriber)
    {
        //
    }
}
