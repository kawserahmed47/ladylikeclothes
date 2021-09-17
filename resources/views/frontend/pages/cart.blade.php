@extends('frontend.master')

@section('content')

<div class="container">
    <div class="page-header page-header-big text-center" style="background-image: url('{{asset('frontend/assets')}}/images/about-header-bg.jpg')">
        <h1 class="page-title text-white">Shopping Cart<span class="text-white">shop</span></h1>
    </div><!-- End .page-header -->
</div><!-- End .container -->


<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->


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