<div class="pt-2 pb-3">

    <div class="container-fluid">


       @include('frontend.layouts.top_categories')
        
        <!-- End .row -->

        <div class="row justify-content-center">

            @if ($productTypeTops)

                @foreach ($productTypeTops as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="banner banner-overlay text-white">
                        <a href="#">
                            <img src="{{asset($item->image)}}" style="height: 300px" alt="Banner">
                        </a>
    
                        <div class="banner-content banner-content-right">
                            <h4 class="banner-subtitle"><a href="{{url('/shop')}}">Top Rated</a></h4><!-- End .banner-subtitle -->
                            <h3 class="banner-title"><a href="{{url('/shop')}}">{{$item->name}}<br>sale -{{rand(10,80)}}% off</a></h3><!-- End .banner-title -->
                            <a href="{{url('/shop')}}" class="btn underline btn-outline-white-3 banner-link">Shop Now</a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-lg-4 -->
                @endforeach
                
            @endif

            

        </div><!-- End .row -->
    </div><!-- End .container-fluid -->
    
</div>
