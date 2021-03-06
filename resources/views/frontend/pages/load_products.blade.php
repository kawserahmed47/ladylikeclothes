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

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        </div><!-- End .product-action-vertical -->

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

<div class="filter-pagination">
    {!!$products->links()!!}
</div>
