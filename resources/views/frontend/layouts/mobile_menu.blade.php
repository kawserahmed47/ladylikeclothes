<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>
        
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active">
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    <a href="category.html">Shop</a>
                    <ul>
                        <li><a href="{{url('/products-by-category/sharee')}}">Sharee</a></li>
                        <li><a href="{{url('/products-by-category/joypuri')}}">&nbsp;-Joypuri</a></li>
                        <li><a href="{{url('/products-by-category/sharee')}}">3 Pcs</a></li>
                        <li><a href="{{url('/products-by-category/joypuri')}}"> &nbsp;-Batik</a></li>
                    </ul>
                </li>
             
           
                <li>
                    <a href="{{url('about-us')}}">About US</a>
                   
                </li>

                <li>
                    <a href="{{url('contact-us')}}">Contact US</a>
                   
                </li>
            </ul>
        </nav><!-- End .mobile-nav -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div>