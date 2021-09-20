@extends('layouts.app', ['activePage' => 'slider', 'titlePage' => __('Slider')])

@section('content')
  <div class="content">
    <div class="container-fluid">



      <div class="row">
        <div class="col-md-12">
        

            <div class="card ">

              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('View Slider') }}</h4>
                <p class="card-category">{{ __('Slider information') }}</p>
              </div>

              <div class="card-body ">

                <h1>{{$slider->name}}</h1>






              </div>
           
            </div>
        </div>
      </div>





    </div>
  </div>
@endsection