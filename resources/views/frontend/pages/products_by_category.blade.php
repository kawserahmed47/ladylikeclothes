@extends('frontend.master')
@section('content')

<div class="container">
    <div class="page-header page-header-big text-center" style="background-image: url('{{asset('frontend/assets')}}/images/contact-header-bg.jpg')">
        <h1 class="page-title text-white">Contact us<span class="text-white">keep in touch with us</span></h1>
    </div><!-- End .page-header -->
</div><!-- End .container -->


<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact us</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->



@endsection