@extends('layouts.app', ['activePage' => 'productUnit', 'titlePage' => __('Product Unit')])

@section('content')
  <div class="content">
    <div class="container-fluid">



      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('productUnit.update', $productUnit->id)}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')

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
  
                        <select name="product_id" id="product" class="form-control" required>
                          <option value="">--</option>
                          @if ($products)
                            @foreach ($products as $product)
                                <option value="{{$product->id}}" @if ($productUnit->product_id  == $product->id ) selected @endif>{{$product->name}}</option>
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
  
                        <select name="supplier_id" id="supplier" required class="form-control">
                          <option value="">--</option>
                          @if ($suppliers)
                            @foreach ($suppliers as $supplier)
                                <option value="{{$supplier->id}}" @if ($productUnit->supplier_id  == $supplier->id ) selected @endif >{{$supplier->name}}</option>
                            @endforeach
                          @endif
  
                        </select>   
                        
                        
                      </div>
  
                    </div>
                    <div class="col-sm-4">
  
                      <div class="form-group">
                        <label class="col-form-label">{{ __('Size') }}</label>
  
                        <select name="product_size_id" class="form-control" id="size" required>
                          <option value="">--</option>
                          @if ($productSizes)
                            @foreach ($productSizes as $productSize)
                              <option value="{{$productSize->id}}" @if ($productSize->id == $productUnit->product_size_id) selected @endif>{{$productSize->name}}</option>
  
                            @endforeach
                              
                          @endif
                        </select>   
                        
                        
                      </div>
  
                    </div>
                    <div class="col-sm-4">
  
                      <div class="form-group">
                        <label class="col-form-label">{{ __('Color') }}</label>
  
                        <select name="product_color_id" class="form-control" id="color" required>
                          <option value="">--</option>
                          @if ($productColors)
                            @foreach ($productColors as $productColor)
                              <option value="{{$productColor->id}}" @if ($productColor->id == $productUnit->product_color_id) selected @endif >{{$productColor->name}}</option>
  
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
  
                        <input type="text"  class="form-control" name="supplier_price" value="{{$productUnit->supplier_price}}">
                        
                        
                      </div>
  
                    </div>
                    <div class="col-sm-4">
  
                      <div class="form-group">
                        <label class="col-form-label">{{ __('Sell Price') }}</label> <br>
  
                        <input type="text"  class="form-control" name="max_retail_price" value="{{$productUnit->max_retail_price}}">
 
                        
                        
                      </div>
  
                    </div>
                    <div class="col-sm-4">
  
                      <div class="form-group">
                        <label class="col-form-label">{{ __('Quantity') }}</label> <br>
  
                        <input type="text" class="form-control" name="available_stock" value="{{$productUnit->available_stock}}">
                        
                        
                      </div>
  
                    </div>
                  
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
  
                      <div class="form-group">
                        <label class="col-form-label">{{ __('Unit') }}  </label> <br>
  
                        <input type="text" class="form-control" name="name" value="{{$productUnit->name}}">
                        
                        
                      </div>
  
                    </div>

                    <div class="col-sm-8">
                      <div class="form-group">
                        <label  class="">Description</label>
  
                          <textarea class="form-control" name="description"  rows="5">{{$productUnit->description}}</textarea>
                      </div>
                    </div>

                  
                  

                  </div>

                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group">
                        <input name="status" @if ($productUnit->status == 1) checked @endif value="1" type="radio" id="active">
                        <label for="active"> Active </label>
                        <input name="status"  @if ($productUnit->status == 0 ) checked @endif value="0" type="radio" id="inactive">
                        <label for="inactive"> Inactive </label>
  
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
  
                      @if ($productUnit->image)
                      <img src="{{asset($productUnit->image)}}" class="img-thumbnail previewImg" style="height:150px; width:150px" alt="previewImage">

                      @else 

                      <img src="{{asset('not_found_image.png')}}" class="img-thumbnail previewImg" style="height:150px; width:150px" alt="previewImage">

                      @endif

  
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