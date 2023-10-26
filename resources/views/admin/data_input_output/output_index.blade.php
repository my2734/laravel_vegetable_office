@extends('admin.layout.master')

@section('content')
    <div class="title_left">
        
        <h3>Danh sách đơn xuat</h3>
    </div>
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                    <div class="col-3">
                        <h2>Product List</h2>
                    </div>
                    <div class="col-6">
                        <form method="POST" action="{{route('product.search_product')}}">
                            <div class="input-group">
                                <input type="text" name="search_key" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary ml-1" type="button">Search</button>
                                </span>
                            </div>
                            @csrf
                        </form>    
                    </div>
                    <div class="col-3">
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="text-white" href="{{route('datainputoutput.output_create')}}"><button class="btn btn-primary ml-3 btn-sm">Create New <i class="fa fa-plus"></i></a></button>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price Unit</th>
                            <th>Price Promotion</th>
                            <!-- <th>Status</th> -->
                            <th>Quantity</th>
                            <!-- <th>Image</th> -->
                            <th>Category</th>
                            <!-- <th>Top Rate</th> -->
                            <th>Manager</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($products as $key => $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price_unit}}</td>
                            <td>{{$product->price_promotion}}</td>
                            <!-- <td><span id="{{$product->id}}" class="cursor_pointer change_status_product{{$product->id}} change_status_product badge {{($product->status==1?'badge-danger':'badge-secondary')}}">{{($product->status==1)?"Hiển thị":"Không hiển thị"}}</span> -->
                            <td>{{$product->quantity}}</td>
                            <!-- <td width="200px">
                                <img height="50px;" width="50px;" class="mt-1" src="{{asset('Uploads/'.$product->product_image[0]->image)}}" alt="">
                                @foreach($product->product_image as $pro_image)
                                    <img height="50px;" width="50px;" class="mt-1" src="{{asset('Uploads/'.$pro_image->image)}}" alt="">
                                @endforeach
                            </td> -->
                            <td>{{$product->category->name}}</td>
                            <!-- <td>{{$product->top_rate==1 ? "Bán chạy" : "Bình thường"}}</td> -->
                            <td>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_product">Delete</button>
                                <a href="{{route('product.edit',$product->id)}}" class="btn btn-warning btn-sm">Edit</a>

                                
                                <!-- Modal -->
                                <div class="modal fade" id="delete_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Bạn chắn chắc muốn sản phẩm này</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                                <a href="{{route('product.delete',$product->id)}}" class="btn btn-danger text-white">Chắc chắn</a>
                                            </div>
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