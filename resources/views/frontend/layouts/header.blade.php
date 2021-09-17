<header class="header header-7">


    <div class="header-top">
        <div class="container-fluid">
            <div class="header-left">


                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="tel:01311-796531"><i class="icon-phone"></i>Call: +88 01311-796531</a></li>
                            <li><a href="mailto:info@ladylikeclothes.com"><i class="icon-envelope"></i>Email: info@ladylikeclothes.com</a></li>

                        </ul>
                    </li>
                </ul><!-- End .top-menu -->


            </div><!-- End .header-left -->

            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="wishlist.html"><i class="icon-heart-o"></i>My Wishlist <span>(3)</span></a></li>
                            <li><a href="#signin-modal" data-toggle="modal"><i class="fa fa-sign-in"></i>Login /</a></li>
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
                <div class="header-dropdown">
                    <a href="#"><i class="fa fa-user"></i>&nbsp;&nbsp; Username </a></a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-cog"></i>&nbsp;&nbsp;PROFILE</a></li>
                            <li><a href="#"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;LOGOUT</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container-fluid -->
    </div>
    
    <!-- End .header-top -->

    <div class="header-middle sticky-header">
        <div class="container-fluid">
            <div class="header-left">
                <button class="mobile-menu-toggler text-dark">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
                
                <a href="{{url('/')}}" class="logo">
                    <img width="230px" src="{{asset('frontend/assets')}}/images/icons/menu_logo.jpg" alt="Logo">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="{{url('/')}}" class="sf-with-ul"> <i class="fa fa-home"></i> Home</a>
                        </li>
                        <li>
                            <a href="{{url('/shop')}}" class="sf-with-ul">Shop</a>

                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="menu-col">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="menu-title">Sharee</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="{{url('/products-by-category/joypuri')}}">Joypuri</a></li>
                                                        <li><a href="{{url('/products-by-category/tangail')}}">Tangail</a></li>
                                                    </ul>

                                                   
                                                </div><!-- End .col-md-6 -->

                                                <div class="col-md-6">
                                                    <div class="menu-title">3 PCS</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="{{url('/products-by-category/batik')}}">Batik</a></li>
                                                        <li><a href="{{url('/products-by-category/jorjet')}}">Jorjet</a></li>
                                                    </ul>
                                                   
                                                </div><!-- End .col-md-6 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .col-md-8 -->

          
                                </div><!-- End .row -->
                            </div><!-- End .megamenu megamenu-md -->
                        </li>

                       
                      
                        <li>
                            <a href="{{url('/about-us')}}" class="sf-with-ul">ABOUT US</a>

                          
                        </li>
                        <li>
                            <a href="{{url('/contact-us')}}" class="sf-with-ul">CONTACT US</a>

                          
                        </li>
                       
                      
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <div class="header-search header-search-extended header-search-visible">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
                
                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count">2</span>
                    </a>

                @include('frontend.layouts.cart')
                    
                    
                    <!-- End .dropdown-menu -->
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container-fluid -->
    </div><!-- End .header-middle -->
</header>