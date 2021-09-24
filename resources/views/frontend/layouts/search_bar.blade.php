

<div class="card-body-search" id="cardbodysearch">
    <ul class="search-list">

        @if ($products)
            @foreach ($products as $unit)
                <li class="hoverClasssd">
                    <a href="{{url('/product-details', [$unit->product->slug, $unit->id])}}">
                        <div class="ais-hits--item">
                            <div class="hit cc_pointer">
                                <div class="hit-image">
                                    <img style="height: 40px; width:50px" src="{{asset($unit->image)}}"alt="Image"> 
                                </div>
                                <div class="hit-content">
                                    <h2 class="hit-name">{{substr($unit->product->name." ".$unit->name, 0, 30)}} <span data-toggle="tooltip" data-placement="top" title="{{$unit->product->name}}">...</span></h2>
                                    <div class="hit-prices">
                                        <span class="hit-price"style="color: black;"> <p> ৳ {{$unit->max_retail_price}}</p></span>
                                        {{-- <span class="hit-old-price"style="color: black;"><p>৳2350</p></span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach

      
        @else 

        <li class="hoverClasssd">
            <div class="ais-hits--item">
                <div class="hit cc_pointer">
                    <div class="hit-content">
                        <h2 class="hit-name">No Products Found</h2>
                    </div>
                </div>
            </div>
        </li>
            
        @endif


      
    


    
    </ul>
</div>
