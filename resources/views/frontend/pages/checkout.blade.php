@extends('frontend.master')

@section('content')

@include('frontend.layouts.page_header')


<div class="page-content">
    <div class="checkout">
        <div class="container">
       
            <form method="POST" id="checkoutForm">

                @csrf

                <div class="row">
                    <div class="col-lg-9">
                        <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->

                          

                           @if (Auth::check())
                          
                            <div class="row">
                                    <div class="col-sm-12">
                                        <label>Full Name *</label>
                                        <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" required>
                                    
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->



                            <label>Full address *</label>
                            <input type="text" name="address" class="form-control" placeholder="" required>

                    

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Email address *</label>
                                    <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Mobile Number *</label>
                                    <input type="tel" name="mobile" value="{{Auth::user()->mobile}}" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                           @else 

                           <div class="row">
                            <div class="col-sm-12">
                                <label>Full Name *</label>
                                <input type="text" name="name" class="form-control" required>
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->



                        <label>Full address *</label>
                        <input type="text" name="address" class="form-control" placeholder="" required>

                   

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Email address *</label>
                                <input type="email" name="email" class="form-control" required>
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <label>Mobile Number *</label>
                                <input type="tel" name="mobile" class="form-control" required>
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="create_account" class="custom-control-input" id="checkout-create-acc">
                                <label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
                            </div><!-- End .custom-checkbox -->
                           
                           
                           @endif

                          

                          

                            <label>Order notes (optional)</label>
                            <textarea class="form-control" name="description" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary">
                            <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @if ($items)

                                        @foreach ($items as $item)
                                        <tr>
                                            <td><a href="#">{{$item->name}}</a></td>
                                            <td> <span> {{$item->price}} x {{$item->quantity}} </span></td>
                                            <td>  &#2547;&nbsp; {{$item->getPriceSum()}}</td>
                                        </tr>
                                        @endforeach
                                        
                                    @endif
                                  



                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td></td>
                                        <td> &#2547;&nbsp; {{$getSubTotal}}
                                        </td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr>
                                        <td>Shipping:</td>
                                        <td></td>
                                        <td>Free shipping</td>
                                    </tr>
                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td></td>
                                        <td> &#2547;&nbsp; {{$getSubTotal}}</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <div class="accordion-summary" id="accordion-payment">
                               

                             

                                <div class="card">
                                    <div class="card-header" id="heading-3">
                                        <h2 class="card-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                Cash on delivery
                                            </a>
                                        </h2>
                                    </div><!-- End .card-header -->
                                    <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                                        <div class="card-body">
                                            Please keep ready with order amount for smootly delivery. 
                                        </div><!-- End .card-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .card -->

                              
                            </div><!-- End .accordion -->

                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                <span class="btn-text">Place Order</span>
                                <span class="btn-hover-text">Proceed to Checkout</span>
                            </button>
                        </div><!-- End .summary -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </form>
        </div><!-- End .container -->
    </div><!-- End .checkout -->
</div><!-- End .page-content -->


    
@endsection

@push('js')

<script>
    $(document).ready(function(){

        $("#checkoutForm").on('submit', function(e){
            e.preventDefault();
            

            var formData = $(this).serialize();
            $.ajax({
                url: "{{route('order.store')}}",
                type: "post",
                data: formData,
                success:function(response){

                    if(response.status){
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                         
                            })

                            Toast.fire({
                                type: 'success',
                                title: 'Order successfully placed'
                            })
                  
                           
                           location.reload();
                      

                    }else{
                       
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                         
                            })

                            Toast.fire({
                                type: 'error',
                                title: 'Error!'
                            })
                        
                    }

                },
                error:function(err){

                }
            });

        })



    })

</script>
    
@endpush
