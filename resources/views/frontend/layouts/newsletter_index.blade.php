<div class="container-fluid">

    <div class="container newsletter">
        <div class="row">
            <div class="col-lg-6 banner-overlay-div">
                <div class="banner banner-overlay">
                    <a href="{{url('/shop')}}">
                        <img  src="{{asset($productTypeBottoms->image)}}" alt="Banner">
                    </a>

                    <div class="banner-content banner-content-center">
                        <h4 class="banner-subtitle text-white"><a href="{{url('/shop')}}">Limited time only.</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title text-white"><a href="{{url('/shop')}}">{{$productTypeBottoms->name}}<br>save up to 50% off</a></h3><!-- End .banner-title -->
                        <a href="{{url('/shop')}}" class="btn btn-outline-white banner-link underline">Shop Now</a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-6 -->

            <div class="col-lg-6 d-flex align-items-stretch subscribe-div">
                <div class="cta cta-box">
                    <div class="cta-content">
                        <h3 class="cta-title">Subscribe To Our Newsletter</h3><!-- End .cta-title -->
                        <p>Sign up now for <span class="primary-color">10% discount</span> on first order. Customise my news:</p>

                        <form class="subscribeForm" method="post">
                            @csrf
                            <input type="email" name="email" class="form-control" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                            <div class="text-center">
                                <button class="btn btn-outline-dark-2" type="submit"><span>subscribe</span></i></button>
                            </div><!-- End .text-center -->
                        </form>
                    </div><!-- End .cta-content -->
                </div><!-- End .cta -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->


</div>