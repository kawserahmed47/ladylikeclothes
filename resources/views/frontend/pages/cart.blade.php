@extends('frontend.master')

@section('content')

@include('frontend.layouts.page_header')



<div class="page-content">


    <div class="cart">
        <div class="container dynamicCart">

            <h1 class="text-center">No Item Found !</h1>

          
        </div><!-- End .container -->
    </div><!-- End .cart -->
</div><!-- End .page-content -->
    
@endsection


@push('js')

<script>


viewShopCart()


    $(document).ready(function(){


        
    })





</script>
    
@endpush