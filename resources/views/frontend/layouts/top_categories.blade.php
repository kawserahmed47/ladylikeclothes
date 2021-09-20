<div class="row">

    @if ($categories)

    @foreach ($categories as $category)

    <div class="col-lg-6">
        <div class="banner banner-big banner-overlay">
            <a href="{{url('/products-by',[$category->slug, $category->id])}}">
                <img style="height: 400px" src="{{asset($category->image)}}" alt="Banner">
            </a>

            <div class="banner-content banner-content-center">
                <h3 class="banner-subtitle text-white"><a href="{{url('/products-by',[$category->slug, $category->id])}}">New Collection</a></h3><!-- End .banner-subtitle -->
                <h2 class="banner-title text-white"><a href="{{url('/products-by',[$category->slug, $category->id])}}">{{$category->name}}</a></h2><!-- End .banner-title -->
                <a href="{{url('/products-by',[$category->slug, $category->id])}}" class="btn underline"><span>Discover Now</span></a>
            </div><!-- End .banner-content -->
        </div><!-- End .banner -->
    </div><!-- End .col-lg-6 -->
        
    @endforeach
        
    @endif


  



</div>