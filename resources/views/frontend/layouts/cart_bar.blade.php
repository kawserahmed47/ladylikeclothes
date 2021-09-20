<div class="dropdown-cart-products">


    @if ($items)

        @foreach ($items as $key=>$item)
        <div class="product">


            <div class="product-cart-details">
                <h4 class="product-title">
                    <a href="{{url('/product-details', [$item->name, $key])}}">{{$item->name}}</a>
                </h4>
    
                <span class="cart-product-info">
                    <span class="cart-product-qty">{{$item->quantity}}</span>
                    x  &#2547;&nbsp;{{$item->price}} =  &#2547;&nbsp;{{$item->getPriceSum()}}
                </span>
            </div><!-- End .product-cart-details -->
    
            <figure class="product-image-container">
                <a href="{{url('/product-details', [$item->name, $key])}}" class="product-image">
                    <img src="{{asset($item->attributes->image)}}" style="height: 100px" alt="product">
                </a>
            </figure>
            <a href="#" onclick="removeItem({{$key}})" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
        </div><!-- End .product -->
        @endforeach
        
    @endif

   

</div><!-- End .cart-product -->

<div class="dropdown-cart-total">
    <span>Total</span>

    <span class="cart-total-price">  &#2547;&nbsp; {{$getSubTotal}}</span>
</div><!-- End .dropdown-cart-total -->

<div class="dropdown-cart-action">
    <a href="{{url('/view-cart')}}" class="btn btn-primary">View Cart</a>
    <a href="{{url('/checkout')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
</div><!-- End .dropdown-cart-total -->