@extends('layouts.app', ['activePage' => 'productUnit', 'titlePage' => __('Product Unit')])

@section('content')
  <div class="content">
    <div class="container-fluid">



      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('productUnit.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">

              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Create Product Unit') }}</h4>
                <p class="card-prdocutUnit">{{ __('Product Unit information') }}</p>
              </div>

              <div class="card-body ">

                <div class="productUnit">

                  <div class="row">


                    <div class="col-sm-12">
  
                      <div class="form-group">
                        <label class="col-form-label">{{ __('Product') }} <span> <a class="btn btn-link btn-sm btn-primary" rel="tooltip" title="Add New" href="{{route('product.create')}}"> <i class="fa fa-plus"></i></a> </span> </label>
  
                        <select name="product_id" class="form-control" id="product" required>
                          <option value="">--</option>
                          @if ($products)
                            @foreach ($products as $product)
                              <option value="{{$product->id}}">{{$product->name}}</option>
  
                            @endforeach
                              
                          @endif
                        </select>   
                        
                        
                      </div>
  
                    </div>

                 

                  </div>

                  <div class="row">
                    <div class="col-sm-4">
  
                      <div class="form-group">
                        <label class="col-form-label">{{ __('Supplier') }}</label>
  
                        <select name="supplier_id" class="form-control" id="supplier" required>
                          <option value="">--</option>
                          @if ($suppliers)
                            @foreach ($suppliers as $supplier)
                              <option value="{{$supplier->id}}">{{$supplier->name}}</option>
  
                            @endforeach
                              
                          @endif
                        </select>   
                        
                        
                      </div>
  
                    </div>
                    <div class="col-sm-4">
  
                      <div class="form-group">
                        <label class="col-form-label">{{ __('Size') }}</label>
  
                        <select name="product_size_id" class="form-control" id="size" >
                          <option value="">--</option>
                          @if ($productSizes)
                            @foreach ($productSizes as $productSize)
                              <option value="{{$productSize->id}}">{{$productSize->name}}</option>
  
                            @endforeach
                              
                          @endif
                        </select>   
                        
                        
                      </div>
  
                    </div>
                    <div class="col-sm-4">
  
                      <div class="form-group">
                        <label class="col-form-label">{{ __('Color') }}</label>
  
                        <select name="product_color_id" class="form-control" id="color" >
                          <option value="">--</option>
                          @if ($productColors)
                            @foreach ($productColors as $productColor)
                              <option value="{{$productColor->id}}">{{$productColor->name}}</option>
  
                            @endforeach
                              
                          @endif
                        </select>   
                        
                        
                      </div>
  
                    </div>
                  
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
  
                      <div class="form-group">
                        <label class="col-form-label">{{ __('Supplier Price') }}</label> <br>
  
                        <input type="text"  class="form-control" name="supplier_price" value="">
                        
                        
                      </div>
  
                    </div>
                    <div class="col-sm-4">
  
                      <div class="form-group">
                        <label class="col-form-label">{{ __('Sell Price') }}</label> <br>
  
                        <input type="text"  class="form-control" name="max_retail_price" value="">
 
                        
                        
                      </div>
  
                    </div>
                    <div class="col-sm-4">
  
                      <div class="form-group">
                        <label class="col-form-label">{{ __('Quantity') }}</label> <br>
  
                        <input type="text" class="form-control" name="available_stock" value="">
                        
                        
                      </div>
  
                    </div>
                  
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
  
                      <div class="form-group">
                        <label class="col-form-label">{{ __('Unit') }}  </label> <br>
  
                        <input type="text" class="form-control" name="name">
                        
                        
                      </div>
  
                    </div>

                    <div class="col-sm-8">
                      <div class="form-group">
                        <label  class="">Description</label>
  
                          <textarea class="form-control" name="description"  rows="5"></textarea>
                      </div>
                    </div>

                  
                  

                  </div>

                  <div class="row">
                    <div class="col-sm-4">
  
                      <div class="">
                        <label class="col-form-label">{{ __('Feature Image') }}</label> <br>
  
                        <input type="file" class="inputImg"  name="image" >
                        
                        
                      </div>
  
                    </div>
                    <div class="col-sm-4">
  
                      <img src="{{asset('not_found_image.png')}}" class="img-thumbnail previewImg" style="height:150px; width:150px" alt="previewImage">

  
                    </div>
                    <div class="col-sm-4">
  
                      <div class="">
                        <label class="col-form-label">{{ __('Additional Images') }}</label> <br>
  
                        <input type="file" name="additional_images[]" multiple>
                        
                        
                      </div>
  
                    </div>
                  
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