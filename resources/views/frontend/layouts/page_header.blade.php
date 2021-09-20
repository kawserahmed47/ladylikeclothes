<div class="container">
    <div class="page-header page-header-big text-center" style="background-image: url('{{asset($slider->image)}}')">
        <h1 class="page-title text-white">{{$title}}  <span class="text-white"><a href="{{url('/shop')}}"> Shop Now </a></span> </h1> <br>
    </div><!-- End .page-header -->
</div><!-- End .container -->


<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->