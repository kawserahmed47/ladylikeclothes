@extends('layouts.app', ['activePage' => 'brand', 'titlePage' => __('Brand')])

@section('content')
  <div class="content">
    <div class="container-fluid">



      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('brand.update', $brand->id)}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')
            <div class="card ">

              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Brand') }}</h4>
                <p class="card-category">{{ __('Brand information') }}</p>
              </div>

              <div class="card-body ">

         

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{$brand->name}}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>



                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                        <textarea class="form-control" name="description"  rows="5">{{$brand->description}}</textarea>
                    </div>
                  </div>
                </div>



              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>





    </div>
  </div>
@endsection