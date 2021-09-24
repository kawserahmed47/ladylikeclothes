@extends('frontend.master')
@section('content')

@include('frontend.layouts.page_header')


<div class="page-content">
    <div class="container-fluid">


        {{-- <div class="toolbox">
            <div class="toolbox-left">
                <a href="#" class="sidebar-toggler"><i class="icon-bars"></i>Filters</a>
            </div><!-- End .toolbox-left -->


            <div class="toolbox-right">
                <div class="toolbox-sort">
                    <label for="sortby">Sort by:</label>
                    <div class="select-custom">
                        <select name="sortby" id="sortby" class="form-control">
                            <option value="popularity" selected="selected">Most Popular</option>
                            <option value="rating">Most Rated</option>
                            <option value="date">Date</option>
                        </select>
                    </div>
                </div><!-- End .toolbox-sort -->
            </div><!-- End .toolbox-right -->
        </div><!-- End .toolbox --> --}}

        <div class="products">
            <div class="row">

                @if ($products)

                    @foreach ($products as $product)

                    @if ($product->productUnits)

                        @foreach ($product->productUnits as $unit)
                        <div class="col-6 col-md-4 col-lg-4 col-xl-3 col-xxl-2">
                            <div class="product">
                                <figure class="product-media">
                                    <span class="product-label label-new">New</span>
                                    <a href="{{url('product-details', [$product->slug, $unit->id])}}">
                                        <img src="{{asset($unit->image)}}" style="height: 400px" alt="Product image" class="product-image">
                                    </a>
        
                                    {{-- <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    </div> --}}
                                    
                                    <!-- End .product-action -->
        
                                    <div class="product-action action-icon-top">
                                        <button  onclick="addToCart({{$unit->id}})" class="btn-product btn-cart"><span>add to cart</span></button>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->
        
                                <div class="product-body">
                                   
                                    <h3 class="product-title"><a href="{{url('product-details', [$product->slug, $unit->id])}}">{{$product->name}} {{$unit->name}} </a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        &#2547;&nbsp; {{$unit->max_retail_price}}
                                    </div><!-- End .product-price -->


                                    {{-- <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 0%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 0 Reviews )</span>
                                    </div> --}}
                                    
                                    <!-- End .rating-container -->
        
                                  
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
        
                        @endforeach
                        
                    @endif
                        
                    @endforeach
                    
                @endif

            
            </div><!-- End .row -->

           


        </div><!-- End .products -->

        
        
        <!-- End .sidebar-filter -->
    </div><!-- End .container-fluid -->
</div><!-- End .page-content -->



@endsection