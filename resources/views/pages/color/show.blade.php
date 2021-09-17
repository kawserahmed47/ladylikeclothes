@extends('layouts.app', ['activePage' => 'productColor', 'titlePage' => __('Product Color')])

@section('content')
  <div class="content">
    <div class="container-fluid">



      <div class="row">
        <div class="col-md-12">
        

            <div class="card ">

              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('View Product Color') }}</h4>
                <p class="card-category">{{ __('Product Color information') }}</p>
              </div>

              <div class="card-body ">

         

                <h1>{{$productColor->name}}</h1>




              </div>
           
            </div>
        </div>
      </div>





    </div>
  </div>
@endsection