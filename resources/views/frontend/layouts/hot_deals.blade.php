
            <div class="deal bg-image pt-8 pb-8" style="background-image: url({{asset('http://localhost:8000/uploads/category/sharee.png')}});">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-8 col-lg-6">
                            <div class="deal-content text-center">
                                <h4>Limited quantities. </h4>
                                <h2>Deal of the Day</h2>
                                <div class="deal-countdown" data-until="+10h"></div><!-- End .deal-countdown -->
                            </div><!-- End .deal-content -->
                            <div class="row deal-products">
                                @if ($dealOfTheDays)

                                    @foreach ($dealOfTheDays as $unit)
                                    <div class="col-6 deal-product text-center">
                                        <figure class="product-media">
                                            <a href="{{url('product-details', [$unit->product->slug, $unit->id])}}">
                                                <img src="{{asset($unit->image)}}" alt="Product image" style="height:300px" class="product-image">
                                            </a>
    
                                        </figure><!-- End .product-media -->
    
                                        <div class="product-body">
                                            <h3 class="product-title"><a href="{{url('product-details', [$unit->product->slug, $unit->id])}}">{{$unit->product->name}} {{$unit->name}} </a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price">Now  &#2547;&nbsp;{{$unit->max_retail_price}}</span>
                                                {{-- <span class="old-price">Was $30.99</span> --}}
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                        <a href="{{url('product-details', [$unit->product->slug, $unit->id])}}" class="action">shop now</a>
                                    </div>
                                    @endforeach
                                    
                                @endif
                               
                              
                            </div>
                        </div><!-- End .col-lg-5 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div>
            