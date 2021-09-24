@extends('frontend.master')

@section('content')

@include('frontend.layouts.page_header')



<div class="page-content">
    <div class="dashboard">
        <div class="container">
            <div class="row">
                <aside class="col-md-4 col-lg-3">
                    <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                    
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                        </li>
                 

                        <li class="nav-item">
                            <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                <i class="fa fa-sign-out"></i>&nbsp;&nbsp;LOGOUT
                            </a>
                        </li>
                    </ul>
                </aside><!-- End .col-lg-3 -->

                <div class="col-md-8 col-lg-9">
                    <div class="tab-content">
                       

                        <div class="tab-pane fade show active" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">

                            @if (count($orders)>0)

                            <div>

                                @foreach ($orders as $key=>$order)
                                <div class="card mt-5">
                                    <div class="card-head">
                                        <h1 class="card-title">ORDER NO: {{$order->order_no}}</h1>
                                        <h3>Amount:  {{$order->total_order_cost}} </h3>

                                        @php
                                            $orderStatus = "";
                                            if($order->status == 1){
                                                $orderStatus = "Pending";
                                            }else if ($order->status == 2) {
                                                $orderStatus = "Received";
                                            } else if ($order->status == 3) {
                                                $orderStatus = "Cancel";
                                            }else if ($order->status == 4) {
                                                $orderStatus = "Success";
                                            }else{
                                                $orderStatus = "Unknown";
                                            }
                                        
                                        @endphp

                                        <p>Status :  
                                            
                                        
                                            {{$orderStatus}}
                                        
                                        
                                        </p>
    
                                    </div>
    
                                    <div class="card-body">
                                        <div class="table-responsive">
    
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <td>Product</td>
                                                        <td>Quantity</td>
                                                        <td>Unit Price</td>
                                                        <td>Total</td>
                                                    </tr>
                                                </thead>
            
                                                <tbody>
                                                    @if ($order->orderDetails)

                                                        @foreach ($order->orderDetails as $item)

                                                            <tr>
                                                                <td>{{$item->product->name}} {{$item->productUnit->name}}</td>
                                                                <td>{{$item->order_quantity}}</td>
                                                                <td>{{$item->product_unit_max_retail_price}}</td>
                                                                <td>{{$item->order_quantity*$item->product_unit_max_retail_price}}</td>
                                                            </tr>
                                                            
                                                        @endforeach
                                                        
                                                    @endif
            
                                                </tbody>
            
                                            </table>
            
                                        </div>
    
                                    </div>
    
                                </div>
                                @endforeach

                             

                            </div>

                       

                         

                            @else 
                            <p>No order has been made yet.</p>
                            <a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                        
                                
                            @endif
                         
                        </div><!-- .End .tab-pane -->

                    
                        <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                            <form id="customerProfileForm" method="POST">

                                @csrf

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Full Name *</label>
                                        <input type="text" name="name" class="form-control" value="{{$customer->address}}" required>
                                    </div><!-- End .col-sm-6 -->

                                  
                                </div><!-- End .row -->


                                <label>Email address *</label>
                                <input type="email" class="form-control" name="email" value="{{$customer->email}}"  required>

                                <label>Mobile number *</label>
                                <input type="mobile" class="form-control" name="mobile" value="{{$customer->mobile}}" required>

                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control"  rows="5">{{$customer->address}}</textarea>
                                    </div><!-- End .col-sm-6 -->

                                </div>

                                <label>Current password (leave blank to leave unchanged)</label>
                                <input type="password" name="password" class="form-control">

                                <label>New password (leave blank to leave unchanged)</label>
                                <input type="password" name="new_password" class="form-control">

                                <label>Confirm new password</label>
                                <input type="password" name="confir_password" class="form-control mb-2">

                                <button type="submit" class="btn btn-outline-primary-2">
                                    <span>SAVE CHANGES</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </form>
                        </div><!-- .End .tab-pane -->
                    </div>
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .dashboard -->
</div><!-- End .page-content -->



@endsection

@push('js')

<script>
    $(document).ready(function(){

        $('#customerProfileForm').on('submit', function(e){

        e.preventDefault();
        var formData = $(this).serialize();


        $.ajax({
            url: APP_URL+"/customer-profile-update",
            type: "post",
            data: formData,
            success:function(response){

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                        
                })

                Toast.fire({
                    type: 'success',
                    title: 'Profile Update successfully'
                })

                // location.reload();
                // location.href(APP_URL+'/customer-profile');

            },
            error:function(err){

                console.log(err);

            }
        });



})
    
    
    
    })
</script>
@endpush


