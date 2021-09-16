@extends('layouts.app', ['activePage' => 'sellList', 'titlePage' => __('Sell List')])

@section('content')
    <div class="content">
        <div class="container-fluid">



            <div class="row">
                <div class="col-md-12">


                    <div class="card ">

                        <div class="card-header card-header-primary">

                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">{{ __('Sell Info') }}</h4>
                                    <p class="card-category">Draft NO: <strong>{{$sell->sell_no}}</strong></p>
                                    <p class="card-category">Total Amout: <strong>{{$sell->total_order_cost}}</strong></p>


                                </div>
                                <div class="col-md-6">
                                    <h4 class="card-title">{{ __('Customer Info') }}</h4>
                                    <p class="card-category">Customer Name: {{$sell->customer_name}}</p>
                                    <p class="card-category">Address: {{$sell->address}}</p>


                                </div>

                            </div>
                           
                        </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <a href="{{route('sell.index')}}" class="btn btn-sm btn-primary">View List</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th>#SL</th>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>
                                                   Order Quantity
                                                </th>
                                                <th>
                                                    MRP
                                                </th>
                                                <th>
                                                    Sub Total
                                                </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if ($sell->sellDetails)

                                                @foreach ($sell->sellDetails as $key=>$sellDetail)
                                                <tr>
                                                    <td>
                                                        {{++$key}}
                                                    </td>
                                                    <td>
                                                        <img src="{{$sellDetail->productUnit->image}}" alt="">
                                                    </td>
                                                    <td>
                                                        {{$sellDetail->product->name}}  {{$sellDetail->productUnit->name}}
                                                    </td>
                                                    <td>
                                                       {{$sellDetail->order_quantity}}
                                                    </td>
                                                    <td>
                                                        {{$sellDetail->product_unit_max_retail_price}}
                                                    </td>
                                                    <td>
                                                        {{$sellDetail->sub_total_product_unit_max_retail_price}}
                                                    </td>
                                               
                                                </tr>
    
                                                @endforeach
                                                
                                            @endif
                                            


                                        </tbody>
                                    </table>
                                </div>
                            </div>




                    </div>
                </div>
            </div>





        </div>
    </div>
@endsection
