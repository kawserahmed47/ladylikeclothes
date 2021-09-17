@extends('frontend.master')

@section('content')

    @include('frontend.layouts.slider')
    <!-- End .intro-slider-container -->
    @include('frontend.layouts.icon_box')
    <!-- End .icon-boxes-container -->
    @include('frontend.layouts.special_offer')
    @include('frontend.layouts.feature_products');
    <!-- End .bg-light-2 pt-4 pb-4 -->
    @include('frontend.layouts.hot_deals');
    <!-- End .deal -->
    <hr class="mt-0 mb-6">
    @include('frontend.layouts.new_arrival')
    @include('frontend.layouts.newsletter_index');
    <hr class="mt-0 mb-6">
    {{-- @include('frontend.layouts.blogs') --}}
    <!-- End .container-fluid -->
    @include('frontend.layouts.testimonial')
    <!-- End .bg-light pt-5 pb-5 -->
    {{-- @include('frontend.layouts.brands') --}}
    <!-- End .owl-carousel -->


        @include('frontend.layouts.newsletter_popup')

@endsection