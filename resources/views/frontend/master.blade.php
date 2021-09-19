<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ladylike Clothes - Women's Clothing Store</title>
    <meta name="keywords" content="Ladylike Clothe - Women's Clothing Store">
    <meta name="description" content="Ladylike Clothes - We are selling women clothes (mainly three piece). We sell our products online. Best quality clothes with reasonable price for achieving the trust of our valued customers is our business goal. Stay with us.">
    <meta name="author" content="Ladylike Clothes">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('frontend/assets')}}/images/icons/favicon_img.jpg">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('frontend/assets')}}/images/icons/favicon_img.jpg">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('frontend/assets')}}/images/icons/favicon_img.jpg">
    {{-- <link rel="manifest" href="{{asset('frontend/assets')}}/images/icons/favicon_img.jpg"> --}}
    <link rel="mask-icon" href="{{asset('frontend/assets')}}/images/icons/favicon_img.jpg" color="#666666">
    <link rel="shortcut icon" href="{{asset('frontend/assets')}}/images/icons/favicon_img.jpg">


    <meta name="apple-mobile-web-app-title" content="Ladylike Clothes">
    <meta name="application-name" content="Ladylike Clothes">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('frontend/assets')}}/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/skins/skin-demo-7.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/demos/demo-7.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/skins/skin-demo-6.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/demos/demo-6.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/plugins/nouislider/nouislider.css">



    @stack('css')
</head>

<body>
    <div class="page-wrapper">
       
        @include('frontend.layouts.header')
        
        <!-- End .header -->

        <main class="main">

            @yield('content')

        </main><!-- End .main -->

        @include('frontend.layouts.footer')




    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    @include('frontend.layouts.mobile_menu')
    
    
    <!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
   

    @include('frontend.layouts.signin_register_modal')

    
    <!-- End .modal -->






    <!-- Plugins JS File -->
    <script src="{{asset('frontend/assets')}}/js/jquery.min.js"></script>
    <script src="{{asset('frontend/assets')}}/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/assets')}}/js/jquery.hoverIntent.min.js"></script>
    <script src="{{asset('frontend/assets')}}/js/jquery.waypoints.min.js"></script>
    <script src="{{asset('frontend/assets')}}/js/superfish.min.js"></script>
    <script src="{{asset('frontend/assets')}}/js/jquery.elevateZoom.min.js"></script>

    <script src="{{asset('frontend/assets')}}/js/bootstrap-input-spinner.js"></script>
    <script src="{{asset('frontend/assets')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontend/assets')}}/js/jquery.plugin.min.js"></script>
    <script src="{{asset('frontend/assets')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('frontend/assets')}}/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="{{asset('frontend/assets')}}/js/main.js"></script>
    <script src="{{asset('frontend/assets')}}/js/demos/demo-7.js"></script>


    <!-- Main JS File -->
    <script src="{{asset('frontend/assets')}}/js/main.js"></script>
    @stack('js')
</body>


</html>