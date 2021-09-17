@extends('layouts.app', ['activePage' => 'productSize', 'titlePage' => __('Product Size')])

@section('content')
  <div class="content">
    <div class="container-fluid">



      <div class="row">
        <div class="col-md-12">
        

            <div class="card ">

              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('View Product Size') }}</h4>
                <p class="card-category">{{ __('Product Size information') }}</p>
              </div>

              <div class="card-body ">

         

                <h1>{{$productSize->name}}</h1>




              </div>
           
            </div>
        </div>
      </div>





    </div>
  </div>
@endsection