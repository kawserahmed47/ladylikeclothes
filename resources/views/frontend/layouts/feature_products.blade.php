<div class="bg-light-2 pt-6 pb-6 featured">
    <div class="container-fluid">
        <div class="heading heading-center mb-3">
            <h2 class="title">FEATURED PRODUCTS</h2><!-- End .title -->

            <ul class="nav nav-pills justify-content-center" role="tablist">
                @if ($categories)

                    @foreach ($categories as $key=>$category)
                    <li class="nav-item">
                        <a class="nav-link @if($key==0) active @endif " id="featured-women-link" data-toggle="tab" href="#featured-{{$category->slug}}-tab" role="tab" aria-controls="featured-{{$category->slug}}-tab" aria-selected="true">{{$category->name}}</a>
                    </li>
                    @endforeach
                    
                @endif
              
            </ul>
        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel">

            @if ($categories)

                @foreach ($categories as $key=>$category)
                <div class="tab-pane p-0 fade  @if($key==0) show active @endif " id="featured-{{$category->slug}}-tab" role="tabpanel" aria-labelledby="featured-{{$category->slug}}-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow " data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":5,
                                    "nav": true
                                }
                            }
                        }'>


                        @if(count($category->children)>0)

                            @foreach ($category->children as $children)

                                @if (count($children->product)>0)

                                    @foreach ($children->product as $product)

                                        @if (count($product->productUnits)>0)

                                            @foreach ($product->productUnits as $unit)


                                                    <div class="product product-7 text-center">
                                                        <figure class="product-media">
                                                            <a href="{{url('/product-details', [$product->slug, $unit->id])}}">
                                                                <img src="{{$unit->image}}"  style="height: 350px" alt="Product image" class="product-image">
                                                                <img src="{{$unit->image}}"  style="height: 350px" alt="Product image" class="product-image-hover">
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
                                                            <h3 class="product-title"><a href="{{url('/product-details', [$unit->slug, $unit->id])}}">{{$product->name}} {{$unit->name}}</a></h3><!-- End .product-title -->
                                                            <div class="product-price">
                                                               <span>  &#2547;&nbsp;{{$unit->max_retail_price}}</span> 
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
                                                    
                                                
                                            @endforeach
                                        
                                        @endif
                                        
                                    @endforeach
                                    
                                @endif


                                
                            @endforeach

                        @endif

                      
    
                       
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                @endforeach
                
            @endif

           
           
        </div><!-- End .tab-content -->
    </div><!-- End .container-fluid -->
</div>