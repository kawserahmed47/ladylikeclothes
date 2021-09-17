@extends('frontend.master')

@section('content')

<div class="container">
    <div class="page-header page-header-big text-center" style="background-image: url('{{asset('frontend/assets')}}/images/contact-header-bg.jpg')">
        <h1 class="page-title text-white">Wish List<span class="text-white">all of your wish list</span></h1>
    </div><!-- End .page-header -->
</div><!-- End .container -->


<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Wish List</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->



<div class="page-content">
    <div class="container">
        <table class="table table-wishlist table-mobile">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Stock Status</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="product-col">
                        <div class="product">
                            <figure class="product-media">
                                <a href="#">
                                    <img src="{{asset('frontend/assets')}}/images/products/table/product-1.jpg" alt="Product image">
                                </a>
                            </figure>

                            <h3 class="product-title">
                                <a href="#">Beige knitted elastic runner shoes</a>
                            </h3><!-- End .product-title -->
                        </div><!-- End .product -->
                    </td>
                    <td class="price-col">$84.00</td>
                    <td class="stock-col"><span class="in-stock">In stock</span></td>
                    <td class="action-col">
                        <div class="dropdown">
                        <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-list-alt"></i>Select Options
                        </button>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">First option</a>
                            <a class="dropdown-item" href="#">Another option</a>
                            <a class="dropdown-item" href="#">The best option</a>
                          </div>
                        </div>
                    </td>
                    <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                </tr>
                <tr>
                    <td class="product-col">
                        <div class="product">
                            <figure class="product-media">
                                <a href="#">
                                    <img src="{{asset('frontend/assets')}}/images/products/table/product-2.jpg" alt="Product image">
                                </a>
                            </figure>

                            <h3 class="product-title">
                                <a href="#">Blue utility pinafore denim dress</a>
                            </h3><!-- End .product-title -->
                        </div><!-- End .product -->
                    </td>
                    <td class="price-col">$76.00</td>
                    <td class="stock-col"><span class="in-stock">In stock</span></td>
                    <td class="action-col">
                        <button class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>Add to Cart</button>
                    </td>
                    <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                </tr>
                <tr>
                    <td class="product-col">
                        <div class="product">
                            <figure class="product-media">
                                <a href="#">
                                    <img src="{{asset('frontend/assets')}}/images/products/table/product-3.jpg" alt="Product image">
                                </a>
                            </figure>

                            <h3 class="product-title">
                                <a href="#">Orange saddle lock front chain cross body bag</a>
                            </h3><!-- End .product-title -->
                        </div><!-- End .product -->
                    </td>
                    <td class="price-col">$52.00</td>
                    <td class="stock-col"><span class="out-of-stock">Out of stock</span></td>
                    <td class="action-col">
                        <button class="btn btn-block btn-outline-primary-2 disabled">Out of Stock</button>
                    </td>
                    <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                </tr>
            </tbody>
        </table><!-- End .table table-wishlist -->

    </div><!-- End .container -->
</div><!-- End .page-content -->





    
@endsection
