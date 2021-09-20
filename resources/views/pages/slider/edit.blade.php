@extends('layouts.app', ['activePage' => 'slider', 'titlePage' => __('Slider')])

@section('content')
  <div class="content">
    <div class="container-fluid">



      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('slider.update', $slider->id)}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')
            <div class="card ">

              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Create Slider') }}</h4>
                <p class="card-prdocutType">{{ __('Slider information') }}</p>
              </div>

              <div class="card-body ">

         

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{$slider->name}}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>



                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                        <textarea class="form-control" name="description"  rows="5">{{$slider->description}}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input name="status" @if ($slider->status == 1) checked @endif value="1" type="radio" id="active">
                      <label for="active"> Active </label>
                      <input name="status"  @if ($slider->status == 0 ) checked @endif value="0" type="radio" id="inactive">
                      <label for="inactive"> Inactive </label>

                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                  <div class="col-sm-4">
                      <input type="file" accept=".jpg, .jpeg, .png, .jfif"   name="image" class="inputImg">
                  </div>
                  <div class="col-sm-3 text-right">
                    @if ($slider->image)
                      <img src="{{asset($slider->image)}}" class="img-thumbnail previewImg" style="height:150px; width:150px" alt="previewImage">

                    @else 
                      <img src="{{asset('not_found_image.png')}}" class="img-thumbnail previewImg" style="height:150px; width:150px" alt="previewImage">

                    @endif
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


@push('js')

  <script>

    $(document).ready(function(){

      $('select').select2();


      
    })

  </script>


  <script>
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('.previewImg').attr('src', e.target.result);
              }
              reader.readAsDataURL(input.files[0]);
          }
      }

      $(".inputImg").change(function(){
          readURL(this);
      });
  </script>
      
@endpush