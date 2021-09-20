<div class="intro-slider-container">
    <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{
        "dots": false,
        "nav": false, 
        "responsive": {
            "992": {
                "nav": true
                    }
                }
            }'>


            @if ($sliders)

                @foreach ($sliders as $slider)
                <div class="intro-slide" style="background-image: url({{asset($slider->image)}});">
                    <div class="container intro-content text-center">
                        <h3 class="intro-subtitle text-white">{{$slider->name}}</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title text-white">{{$slider->description}}</h1><!-- End .intro-title -->
    
                        <a href="{{url('/shop')}}" class="btn btn-outline-white-4">
                            <span>Discover More</span>
                        </a>
                    </div><!-- End .intro-content -->
                </div><!-- End .intro-slide -->
                @endforeach
                
            @endif

          

          
    </div><!-- End .intro-slider owl-carousel owl-theme -->

        <span class="slider-loader"></span><!-- End .slider-loader -->
</div>