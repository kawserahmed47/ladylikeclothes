@extends('layouts.app', ['activePage' => 'category', 'titlePage' => __('Category')])

@section('content')
    <div class="content">
        <div class="container-fluid">



            <div class="row">
                <div class="col-md-12">


                    <div class="card ">

                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('View Category') }}</h4>
                            <p class="card-category">{{ __('Category information') }}</p>
                        </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <a href="{{route('category.create')}}" class="btn btn-sm btn-primary">Add new</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th>#SL</th>
                                                <th>Image</th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Parent Category
                                                </th>
                                                <th>
                                                    Description
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
                                                    Creation date
                                                </th>
                                                <th class="text-right">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if ($categories)

                                                @foreach ($categories as $key=>$category)
                                                    <tr>
                                                        <td>
                                                            {{++$key}}
                                                        </td>
                                                        <td>
                                                            @if ($category->image)
                                                            <img src="{{asset($category->image)}}" class="img-thumbnail previewImg" style="height:100px; width:100px" alt="previewImage">

                                                            @else
                                                            <img src="{{asset('not_found_image.png')}}" class="img-thumbnail previewImg" style="height:100px; width:100px" alt="previewImage">
   
                                                            @endif
                                                        </td>
                                                        <td>
                                                        {{$category->name}}
                                                        </td>
                                                        <td>
                                                           None
                                                        </td>
                                                        <td>
                                                            {{$category->description}}
                                                        </td>
                                                        <td>
                                                            @if ($category->status ==1)
                                                            <label class="badge badge-success">Active</label>

                                                            @else

                                                            <label class="badge badge-danger">Inactive</label>
                                                                
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ date('Y-m-d h:i a ', strtotime( $category->updated_at))}}
        
                                                        </td>
                                                        <td class="td-actions text-right">
                                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{route('category.edit', $category->id)}}"
                                                                data-original-title="" title="Edit">
                                                                <i class="material-icons">edit</i>
                                                                <div class="ripple-container"></div>
                                                            </a><br>
        
                                                            <a rel="tooltip" class="btn btn-dark btn-link" href="{{route('category.show', $category->id)}}"
                                                                data-original-title="" title="View">
                                                                <i class="material-icons">visibility</i>
                                                                <div class="ripple-container"></div>
                                                            </a>
        
        
                                                            <form method="POST"  action="{{route('category.destroy', $category->id)}}">
                                                                @csrf
                                                                @method('delete')
        
                                                                <button onclick="return(confirm('Are you sure?'))" type="submit" title="Delete"  rel="tooltip" class="btn btn-danger btn-link"> <i class="material-icons">close</i>
                                                                    <div class="ripple-container"></div></button>
        
                                                            </form>
        
        
                                                        </td>
                                                    </tr>

                                                    @if (count($category->children)>0)

                                                        @foreach ($category->children as $index=>$children)

                                                        <tr>
                                                            <td>
                                                                {{$key}} <span>.</span>{{++$index}}
                                                            </td>

                                                            <td>
                                                                @if ($children->image)
                                                                <img src="{{asset($children->image)}}" class="img-thumbnail previewImg" style="height:100px; width:100px" alt="previewImage">

                                                                @else
                                                                <img src="{{asset('not_found_image.png')}}" class="img-thumbnail previewImg" style="height:100px; width:100px" alt="previewImage">
    
                                                                @endif
                                                            </td>
                                                                
                                                            <td>
                                                                {{$children->name}}
                                                            </td>
                                                            <td>
                                                                {{$children->parent->name}}
                                                            </td>
                                                            <td>
                                                                {{$children->description}}
                                                            </td>
                                                            <td>
                                                                @if ($children->status ==1)
                                                                <label class="badge badge-success">Active</label>
    
                                                                @else
    
                                                                <label class="badge badge-danger">Inactive</label>
                                                                    
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{ date('Y-m-d h:i a ', strtotime( $children->updated_at))}}
                                                            </td>
                                                            <td class="td-actions text-right">
                                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{route('category.edit', $children->id)}}"
                                                                    data-original-title="" title="Edit">
                                                                    <i class="material-icons">edit</i>
                                                                    <div class="ripple-container"></div>
                                                                </a><br>
            
                                                                <a rel="tooltip" class="btn btn-dark btn-link" href="{{route('category.show', $children->id)}}"
                                                                    data-original-title="" title="View">
                                                                    <i class="material-icons">visibility</i>
                                                                    <div class="ripple-container"></div>
                                                                </a>
            
            
                                                                <form method="POST"  action="{{route('category.destroy', $category->id)}}">
                                                                    @csrf
                                                                    @method('delete')
            
                                                                    <button onclick="return(confirm('Are you sure?'))" type="submit" title="Delete"  rel="tooltip" class="btn btn-danger btn-link"> <i class="material-icons">close</i>
                                                                        <div class="ripple-container"></div></button>
            
                                                                </form>
            
            
                                                            </td>
                                                        </tr>
                                                            
                                                        @endforeach
                                                        
                                                    @endif

                                                  
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
