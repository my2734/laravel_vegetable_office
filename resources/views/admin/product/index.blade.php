@extends('admin.layout.master')

@section('content')
    <div class="title_left">
        
        <h3>Danh sách sản phẩm</h3>
    </div>
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                    <div class="col-3">
                        <form action="{{route('product.filter_by_category')}}" method="POST">
                            <select class="form-control p-2" name="cat_id" >
                                @foreach($categories as $key => $cat)
                                <option {{ (isset($cat_id) && $cat->id==$cat_id)?"selected":"" }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="primary-btn custom-primary-btn mt-2">Filter</button>
                            @csrf
                        </form>
                    </div>
                    <div class="col-6">
                        <form method="POST" action="{{route('product.search_product')}}">
                            <div class="input-group">
                                <input type="text" id="search_key" name="search_key" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button type="submit" class="primary-btn ml-1" type="button">Search</button>
                                </span>
                               
                            </div>
                            @csrf
                        </form> 
                    </div>
                    <div class="col-3">
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="text-white" href="{{route('product.create')}}"><button class="primary-btn custom-primary-btn ml-3 ">Create New <i class="fa fa-plus"></i></a></button>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @if(isset($cat_name))
                    <h4>{{$cat_name}}</h4>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price Unit</th>
                            <th>Price Promotion</th>
                            <th>Status</th>
                            <th>Import product</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Top Rate</th>
                            <th>Manager</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($products as $key => $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td><a href="{{route('product.edit',$product->id)}}">{{$product->name}}</a></td>
                            <td>{{number_format($product->price_unit)}} vnđ</td>
                            <td>{{number_format($product->price_promotion)}} vnđ</td>
                            <td><span id="{{$product->id}}" class="cursor_pointer change_status_product{{$product->id}} change_status_product badge {{($product->status==1?'badge-danger':'badge-secondary')}}">{{($product->status==1)?"Hiển thị":"Không hiển thị"}}</span>
                            <td><button data-toggle="modal" data-target="#import_product{{$product->id}}" class="primary-btn custom-primary-btn">Import</button></td>
                            <td width="200px">
                                @foreach($product->product_image as $pro_image)
                                    <img height="50px;" width="50px;" class="mt-1" src="{{asset('Uploads/'.$pro_image->image)}}" alt="">
                                @endforeach
                            </td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->top_rate==1 ? "Bán chạy" : "Bình thường"}}</td>
                            <td width="100">
                                <button class="primary-btn custom-primary-btn p-2" data-toggle="modal" data-target="#delete_product{{$product->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                <a href="{{route('product.edit',$product->id)}}" class="primary-btn custom-primary-btn p-2 text-white"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                
                                <!-- Modal -->
                                <div class="modal fade" id="delete_product{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Bạn chắn chắc muốn sản phẩm này</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="sub-btn custom-primary-btn p-2  mb-0" data-dismiss="modal">Không</button>
                                                <a href="{{route('product.delete',$product->id)}}" class="primary-btn custom-primary-btn p-2 text-white mb-0">Chắc chắn</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal import product -->
                                <div class="modal fade" id="import_product{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Nhập hàng</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('warehouse.import_quantity',$product->id)}}" method="POST">
                                                <div class="modal-body">
                                                    <lable>Số lượng:</label>
                                                    <input type="text" name="quantity" class="form-control">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                                    <button type="Submit" class="btn btn-danger text-white">Chắc chắn</button>
                                                </div>
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-right">
                    {{$products->links('vendor.pagination.custom')}}
                </div>
            </div>
        </div>
    </div>

@endsection