@extends('layouts.app', ['activePage' => 'category', 'titlePage' => __('Category')])

@section('content')
  <div class="content">
    <div class="container-fluid">



      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">

              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Create Category') }}</h4>
                <p class="card-category">{{ __('Category information') }}</p>
              </div>

              <div class="card-body ">

               

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="" required="true" aria-required="true"/>
                        </div>
                      </div>
                    </div>
  
  
  
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group">
                            <textarea class="form-control" name="description"  rows="5"></textarea>
                        </div>
                      </div>
                    </div>
  
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Parent Category') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <select name="parent_id" class="form-control" >
                            <option value="0">None</option>
                            @if ($categories)
                              @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                            @endif
                          </select>
                        </div>
                      </div>
                    </div>
  
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                      <div class="col-sm-4">
                          <input type="file" accept=".jpg, .jpeg, .png, .jfif"  name="image" class="inputImg">
                      </div>
                      <div class="col-sm-3 text-right">
                        <img src="{{asset('not_found_image.png')}}" class="img-thumbnail previewImg" style="height:150px; width:150px" alt="previewImage">
                      </div>
                    </div>

             


              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
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