@extends('layouts.app', ['activePage' => 'product', 'titlePage' => __('Product')])

@section('content')
  <div class="content">
    <div class="container-fluid">



      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('product.update', $product->id)}}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="card ">

              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Create Product') }}</h4>
                <p class="card-product">{{ __('Product information') }}</p>
              </div>

              <div class="card-body ">


                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-form-label">{{ __('Category') }}</label> <br>

                      <select name="category_id" class="form-control" id="category" required>
                        <option value="">--</option>
                        @if ($categories)
                          @foreach ($categories as $category)
                            <option value="{{$category->id}}"  @if ($product->category_id == $category->id) selected @endif>{{$category->name}}</option>
                            
                            @if (count($category->children))

                            @foreach ($category->children as $children)
                              <option value="{{$children->id}}"  @if ($product->category_id == $children->id) selected @endif >&nbsp;&nbsp;&nbsp; - {{$children->name}}</option>

                            @endforeach

                          @endif

                          @endforeach
                            
                        @endif
                      </select>                    
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class=" col-form-label">{{ __('Product Type') }}</label> <br>

                      <select name="product_type_id" class="form-control" id="productType" >
                        <option value="">--</option>
                        @if ($productTypes)
                          @foreach ($productTypes as $productType)
                            <option value="{{$productType->id}}" @if ($product->product_type_id == $productType->id) selected @endif >{{$productType->name}}</option>

                          @endforeach
                            
                        @endif
                      </select>                     
                    </div>
                  </div>
                </div>

              
            
         

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="col-form-label">{{ __('Name') }}</label> <br>

                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{$product->name}}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>



                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="col-form-label">{{ __('Description') }}</label> <br>

                        <textarea class="form-control" name="description"  rows="5">{{$product->description}}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>

                  <div class="col-sm-7">
                    <div class="form-group">
                      <input name="status" @if ($product->status == 1) checked @endif value="1" type="radio" id="active">
                      <label for="active"> Active </label>
                      <input name="status"  @if ($product->status == 0 ) checked @endif value="0" type="radio" id="inactive">
                      <label for="inactive"> Inactive </label>

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