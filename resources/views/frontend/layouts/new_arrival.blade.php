
            <div class="container-fluid">
                <div class="heading heading-center mb-3">
                    <h2 class="title">NEW ARRIVALS</h2><!-- End .title -->

                    <ul class="nav nav-pills justify-content-center" role="tablist">


                        @if ($categories)

                        @foreach ($categories as $key=>$category)
                        <li class="nav-item">
                            <a class="nav-link @if($key==0) active @endif " id="featured-women-link" data-toggle="tab" href="#new-{{$category->slug}}-tab" role="tab" aria-controls="new-{{$category->slug}}-tab" aria-selected="true">{{$category->name}}</a>
                        </li>
                        @endforeach
                        
                    @endif
                    </ul>
                </div><!-- End .heading -->

                <div class="tab-content">

                    @if ($categories)
                        @foreach ($categories as $key=>$category)
                            <div class="tab-pane p-0 fade  @if($key==0) show active @endif " id="new-{{$category->slug}}-tab" role="tabpanel" aria-labelledby="new-{{$category->slug}}-link">
                                <div class="products">

                                    <div class="row justify-content-center">

                                        @if(count($category->children)>0)

                                            @foreach ($category->children as $children)

                                                @if (count($children->product)>0)

                                                    @foreach ($children->product as $product)

                                                        @if (count($product->productUnits)>0)

                                                            @foreach ($product->productUnits as $unit)

                                                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                                                    <div class="product product-7 text-center">
                                                                        <figure class="product-media">
                                                                            <span class="product-label label-circle label-sale">Sale</span>
                                                                            <a href="{{url('/product-details', [$product->slug, $unit->id])}}">
                                                                                <img src="{{asset($unit->image)}}" style="height: 350px" alt="Product image" class="product-image">
                                                                                <img src="{{asset($unit->image)}}" style="height: 350px"  alt="Product image" class="product-image-hover">
                                                                            </a>

                                                                            <div class="product-action-vertical">
                                                                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                                            </div><!-- End .product-action-vertical -->

                                                                            <div class="product-action">
                                                                                <button onclick="addToCart({{$unit->id}})" class="btn-product btn-cart"><span>add to cart</span></button>
                                                                            </div><!-- End .product-action -->
                                                                        </figure><!-- End .product-media -->

                                                                        <div class="product-body">
                                                                            <h3 class="product-title"><a href="{{url('/product-details', [$product->slug, $unit->id])}}">{{$product->name}} {{$unit->name}}</a></h3><!-- End .product-title -->
                                                                            <div class="product-price">
                                                                                <span class="new-price"> &#2547;&nbsp;{{$unit->max_retail_price}} </span>
                                                                                {{-- <span class="old-price">$84.00</span> --}}
                                                                            </div><!-- End .product-price -->
                                                                            <div class="ratings-container">
                                                                                <div class="ratings">
                                                                                    <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                                                                                </div><!-- End .ratings -->
                                                                                <span class="ratings-text">( 4 Reviews )</span>
                                                                            </div><!-- End .rating-container -->
                                                                        </div><!-- End .product-body -->
                                                                    </div><!-- End .product -->
                                                                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                                                                    
                                                            @endforeach
                                                        
                                                        @endif
                                                        
                                                    @endforeach
                                                    
                                                @endif
                                                
                                            @endforeach

                                        @endif
                                    </div><!-- End .row -->


                                </div><!-- End .products -->
                            </div><!-- .End .tab-pane -->
                        @endforeach
                    @endif
                   
                </div><!-- End .tab-content -->

                <div class="more-container text-center mt-2">
                    <a href="{{url('/shop')}}" class="btn btn-outline-dark-3 btn-more"><span>See more</span><i class="icon-long-arrow-right"></i></a>
                </div><!-- End .more-container -->

            </div>