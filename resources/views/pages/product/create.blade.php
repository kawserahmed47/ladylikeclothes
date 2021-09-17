@extends('layouts.app', ['activePage' => 'product', 'titlePage' => __('Product')])

@section('content')
  <div class="content">
    <div class="container-fluid">



      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">

              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Create Product') }}</h4>
                <p class="card-product">{{ __('Product information') }}</p>
              </div>

              <div class="card-body ">

                <div class="row">
                

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-form-label">{{ __('Category') }}</label>

                      <select name="category_id" class="form-control" id="category" required>
                        <option value="">--</option>
                        @if ($categories)
                          @foreach ($categories as $category)
                            <option value="{{$category->id}}"> <strong>{{$category->name}}</strong> </option>

                            @if (count($category->children))

                              @foreach ($category->children as $children)
                                <option value="{{$children->id}}">&nbsp;&nbsp;&nbsp; - {{$children->name}}</option>

                              @endforeach

                            @endif

                          @endforeach
                            
                        @endif
                      </select>   
                      
                      
                    </div>

                  </div>

                  <div class="col-sm-6">

                    <div class="form-group">
                      <label class="col-form-label">{{ __('Product Type') }}</label>

                      <select name="product_type_id" class="form-control" id="productType" >
                        <option value="">--</option>
                        @if ($productTypes)
                          @foreach ($productTypes as $productType)
                            <option value="{{$productType->id}}">{{$productType->name}}</option>

                          @endforeach
                            
                        @endif
                      </select>                     
                    </div>

                  </div>


                </div>

             

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="input-name" class="">Name</label>
                      <input class="form-control" name="name" id="input-name" type="text" value="" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>



                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label  class="">Description</label> <br>

                        <textarea class="form-control" name="description"  rows="5"></textarea>
                    </div>
                  </div>

               
                </div>

                <hr>

            

                



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