<footer class="footer footer-2">
    <div class="footer-middle">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-4">
                    <div class="widget widget-about">
                        <img src="{{asset('frontend/assets')}}/images/icons/menu_logo.jpg" class="footer-logo" alt="Footer Logo" width="105" height="25">
                        <p>We are selling women clothes (mainly three piece). We sell our products online. Best quality clothes with reasonable price for achieving the trust of our valued customers is our business goal. Stay with us.</p>
                        
                        <div class="widget-about-info">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <span class="widget-about-title">Got Question? Call us 24/7</span>
                                    <a href="tel:+8801311796531">+88 01311-796531 </a>
                                </div><!-- End .col-sm-6 -->
                             
                            </div><!-- End .row -->
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-12">
                                    <span class="widget-about-title">Payment Method</span>
                                    <figure class="footer-payments">
                                        <img src="{{asset('frontend/assets')}}/images/desi-payment.png" alt="Payment methods">
                                    </figure><!-- End .footer-payments -->
                                </div><!-- End .col-sm-6 -->

                            </div>
                        </div><!-- End .widget-about-info -->
                    </div><!-- End .widget about-widget -->
                </div><!-- End .col-sm-12 col-lg-4 -->

                <div class="col-sm-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Useful links</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{url('/about-us')}}">About LADYLIKE</a></li>
                            <li><a href="{{url('/how-to-shop')}}">How to shop on LADYLIKE</a></li>
                            <li><a href="{{url('/faq')}}">FAQ</a></li>
                            <li><a href="{{url('/contact-us')}}">Contact us</a></li>
                            <li><a href="{{url('/sign-in')}}">Log in</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-4 col-lg-2 -->

                <div class="col-sm-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{url('/payment-method')}}">Payment Methods</a></li>
                            <li><a href="{{url('/money-back-guaranty')}}">Money-back guarantee!</a></li>
                            <li><a href="{{url('/returns-policy')}}">Returns</a></li>
                            <li><a href="{{url('/shipping-information')}}">Shipping</a></li>
                            <li><a href="{{url('/terms-and-conditions')}}">Terms and conditions</a></li>
                            <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-4 col-lg-2 -->

                <div class="col-sm-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{url('/sign-in')}}">Sign In</a></li>
                            <li><a href="{{url('/view-cart')}}">View Cart</a></li>
                            <li><a href="{{url('/wishlist')}}">My Wishlist</a></li>
                            <li><a href="{{url('/')}}">Track My Order</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-4 col-lg-2 -->

                <div class="col-sm-6 col-lg-2">
                    <div class="widget widget-newsletter">
                        <h4 class="widget-title">Sign up to newsletter</h4><!-- End .widget-title -->

                        <p>Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan.</p>
                        
                        <form action="#">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                <div class="input-group-append">
                                    <button class="btn btn-dark" type="submit"><i class="icon-long-arrow-right"></i></button>
                                </div><!-- .End .input-group-append -->
                            </div><!-- .End .input-group -->
                        </form>
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-2 -->
            </div><!-- End .row -->
        </div><!-- End .container-fluid -->
    </div><!-- End .footer-middle -->

    <div class="footer-bottom">
        <div class="container-fluid">
            <p class="footer-copyright">Copyright © {{date('Y')}} LADYLIKE CLOTHES. All Rights Reserved.</p><!-- End .footer-copyright -->
            <ul class="footer-menu">
                <li><a href="#">Terms Of Use</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul><!-- End .footer-menu -->

            <div class="social-icons social-icons-color">
                <span class="social-label">Social Media</span>
                <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
            </div><!-- End .soial-icons -->
        </div><!-- End .container-fluid -->
    </div><!-- End .footer-bottom -->
</footer><!-- End .footer -->