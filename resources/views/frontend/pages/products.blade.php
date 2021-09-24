@extends('frontend.master')

@push('css')

<style>
    nav{
        text-align: center;
    }
    nav span .relative {
        display: none;
    }
</style>
    
@endpush

@section('content')


@include('frontend.layouts.page_header')






<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="toolbox">
                    <div class="toolbox-left">
                        <div class="toolbox-info">
                            {{-- Showing <span>9 of 56</span> Products --}}
                        </div><!-- End .toolbox-info -->
                    </div><!-- End .toolbox-left -->

                    <div class="toolbox-right">

                        {{-- <div class="toolbox-sort">
                            <label for="sortby">Sort by:</label>
                            <div class="select-custom">
                                <select name="sortby" id="sortby" class="form-control">
                                    <option value="popularity" selected="selected">Most Popular</option>
                                    <option value="rating">Most Rated</option>
                                    <option value="date">Date</option>
                                </select>
                            </div>
                        </div> --}}
                        
                        <!-- End .toolbox-sort -->

                        {{--                         
                        <div class="toolbox-layout">
                            <a href="category-list.html" class="btn-layout">
                                <svg width="16" height="10">
                                    <rect x="0" y="0" width="4" height="4" />
                                    <rect x="6" y="0" width="10" height="4" />
                                    <rect x="0" y="6" width="4" height="4" />
                                    <rect x="6" y="6" width="10" height="4" />
                                </svg>
                            </a>

                            <a href="category-2cols.html" class="btn-layout">
                                <svg width="10" height="10">
                                    <rect x="0" y="0" width="4" height="4" />
                                    <rect x="6" y="0" width="4" height="4" />
                                    <rect x="0" y="6" width="4" height="4" />
                                    <rect x="6" y="6" width="4" height="4" />
                                </svg>
                            </a>

                            <a href="category.html" class="btn-layout active">
                                <svg width="16" height="10">
                                    <rect x="0" y="0" width="4" height="4" />
                                    <rect x="6" y="0" width="4" height="4" />
                                    <rect x="12" y="0" width="4" height="4" />
                                    <rect x="0" y="6" width="4" height="4" />
                                    <rect x="6" y="6" width="4" height="4" />
                                    <rect x="12" y="6" width="4" height="4" />
                                </svg>
                            </a>

                            <a href="category-4cols.html" class="btn-layout">
                                <svg width="22" height="10">
                                    <rect x="0" y="0" width="4" height="4" />
                                    <rect x="6" y="0" width="4" height="4" />
                                    <rect x="12" y="0" width="4" height="4" />
                                    <rect x="18" y="0" width="4" height="4" />
                                    <rect x="0" y="6" width="4" height="4" />
                                    <rect x="6" y="6" width="4" height="4" />
                                    <rect x="12" y="6" width="4" height="4" />
                                    <rect x="18" y="6" width="4" height="4" />
                                </svg>
                            </a>
                        </div> --}}
                        
                        <!-- End .toolbox-layout -->
                    </div><!-- End .toolbox-right -->
                </div><!-- End .toolbox -->



                <div class="load-products">


                    <div class="products mb-3">
                        <div class="row justify-content-center">
    
                            @if ($products)
    
                                @foreach ($products as $unit)
                                <div class="col-6 col-md-4 col-lg-4">
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <span class="product-label label-new">New</span>
                                            <a href="{{url('/product-details', [$unit->product->slug, $unit->id])}}">
                                                <img src="{{asset($unit->image)}}" style="height:400px" alt="Product image" class="product-image">
                                            </a>
        
                                            {{-- <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            </div> --}}
                                            
                                            <!-- End .product-action-vertical -->
        
                                            <div class="product-action">
                                                <button  onclick="addToCart({{$unit->id}})" class="btn-product btn-cart"><span>add to cart</span></button>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->
        
                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{$unit->product->category->name}}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="{{url('/product-details', [$unit->product->slug, $unit->id])}}">{{$unit->product->name}} {{$unit->name}}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                &#2547;&nbsp;{{$unit->max_retail_price}}
                                            </div><!-- End .product-price -->


                                            {{-- <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 2 Reviews )</span>
                                            </div> --}}
                                            
                                            <!-- End .rating-container -->
        
                                            
    
    
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-lg-4 -->
                                @endforeach
                                
                            @endif
    
                          
                          
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                    {!!$products->links()!!}

                </div>

           
            </div><!-- End .col-lg-9 -->


            <aside class="col-lg-3 order-lg-first">
                <div class="sidebar sidebar-shop">

                    <form action="{{url()->current()}}" class="filterForm" method="get">

                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="{{url('/shop')}}" onclick="location.reload()" class="sidebar-filter-clear filterOption">Clean All</a>
                        </div><!-- End .widget widget-clean -->

                        <div class="widget widget-collapsible">

                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Category
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">

                                        @if ($categories)

                                            @foreach ($categories as $index=>$category)

                                            <div class="filter-item">
                                                <div class="">
                                                    <label class="">{{$category->name}}</label>
                                                </div><!-- End .custom-checkbox -->
                                                {{-- <span class="item-count">3</span> --}}
                                            </div><!-- End .filter-item -->

                                            @if (count($category->children)> 0)

                                                @foreach ($category->children as $key=>$item)

                                                @if (count($item->product)>0)

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="category[]" value="{{$item->id}}" class="custom-control-input filterOption" id="cat-{{$index}}{{$key}}">
                                                        <label class="custom-control-label" for="cat-{{$index}}{{$key}}">{{$item->name}}</label>
                                                    </div><!-- End .custom-checkbox -->
                                                    <span class="item-count">{{count($item->product)}}</span>
                                                </div><!-- End .filter-item -->
                                                    
                                                @endif

                                            


                                                @endforeach
                                                
                                            @endif
        
                                                
                                            @endforeach
                                            
                                        @endif

                                    
                                    
                                

                                    



                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                                    Size
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-2">
                                <div class="widget-body">
                                    <div class="filter-items">

                                        @if ($sizes)

                                            @foreach ($sizes as $key=>$size)
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="size[]" class="custom-control-input filterOption" value="{{$size->id}}" id="size-{{$key}}">
                                                        <label class="custom-control-label" for="size-{{$key}}">{{$size->name}}</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->
                                            @endforeach
                                            
                                        @endif

                                    

                                

                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                                    Colour
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-3">
                                <div class="widget-body">
                                    <div class="filter-colors">
                                        
                                        @if ($colors)

                                        @foreach ($colors as $key=>$color)
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="color[]" class="custom-control-input filterOption" value="{{$color->id}}" id="color-{{$key}}">
                                                    <label class="custom-control-label" for="color-{{$key}}">{{$color->name}}</label>&nbsp;	&nbsp;
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->
                                        @endforeach
                                        
                                    @endif
                                    
                                    </div><!-- End .filter-colors -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->

                            
                        </div><!-- End .widget -->

                        {{-- <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                    Brand
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-4">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-1">
                                                <label class="custom-control-label" for="brand-1">Next</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-2">
                                                <label class="custom-control-label" for="brand-2">River Island</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-3">
                                                <label class="custom-control-label" for="brand-3">Geox</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-4">
                                                <label class="custom-control-label" for="brand-4">New Balance</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-5">
                                                <label class="custom-control-label" for="brand-5">UGG</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-6">
                                                <label class="custom-control-label" for="brand-6">F&F</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-7">
                                                <label class="custom-control-label" for="brand-7">Nike</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div> --}}
                        
                        
                        <!-- End .widget -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                    Price
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-5">
                                <div class="widget-body">
                                    <div class="filter-price">
                                        <div class="filter-price-text">
                                            Price Range:
                                            <span id="filter-price-range"></span>
                                        </div><!-- End .filter-price-text -->

                                        <div id="price-slider">


                                            <div class="filter-item">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" name="price_range" value="1" class="custom-control-input filterOption" id="price-range-1">
                                                    <label class="custom-control-label" for="price-range-1">100 - 500</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->
        
                                            <div class="filter-item">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio"  name="price_range" value="2" class="custom-control-input filterOption" id="price-range-2">
                                                    <label class="custom-control-label" for="price-range-2">501 - 1000</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->
        
                                            <div class="filter-item">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio"  name="price_range" value="3" class="custom-control-input filterOption" id="price-range-3">
                                                    <label class="custom-control-label" for="price-range-3">1000 - 2000</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->
                                            
                                        </div><!-- End #price-slider -->
                                    </div><!-- End .filter-price -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div>

                    </form>
                    
                    
                    <!-- End .widget -->
                </div><!-- End .sidebar sidebar-shop -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .page-content -->
    
@endsection


@push('js')

<script>
    $(document).ready(function(){


        $('.filterOption').on('change', function(e){
            e.preventDefault();
           var  formData =   $(this).closest("form").serialize();
            $.ajax({
                type:"GET",
                url: "/products-by-filter",
                data: formData,
                success:function(response){
                    // console.log(response);
                    $('.load-products').html(response);
                },
                error:function(err){
                    console.log(err);
                }
            })

        })
    })
</script>
    
@endpush