@extends('fontend.layout.master')
@section('content')
    <div class="container">
    @if(session('message_success'))
    <div class="alert alert-success alert-dismissible mt-2 fade show text-center" role="alert">
        <strong>{{session('message_success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                   <h4 class="my-4 font-weight-bold" id="receive_order">Lịch sử mua hàng</h4>
                    <div class="x_content">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Product</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Price Unit</th>
                                    <th class="text-center">Stock</th>
                                    <th class="text-center">Add to cart</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($wish_list as $key => $wish_list_item)
                                <tr class="row_wish_list{{$wish_list_item->id}}">
                                    <th>{{ ($key+1) }}</th>
                                    <td class="text-center">{{ $wish_list_item->Product->name }}</td>
                                    <td class="text-center">
                                        <img width="50" height="50" src="{{asset('Uploads/'.$wish_list_item->Product->image)}}" alt="">
                                    </td>
                                    <td class="text-center">{{ $wish_list_item->Product->price_unit }}</td>
                                    <td class="text-center">{{ $wish_list_item->inventory }} in stock</td>
                                    <td class="text-center"> 
                                        <input type="hidden" class="qty_mul_pro" value="1">
                                        @if($wish_list_item->inventory > 0)
                                            <button  id="{{$wish_list_item->Product->id}}" class="primary-btn add_mul_product">ADD TO CARD</button>
                                        @else
                                            <button  data-toggle="modal" data-target="#notification_add_cart_wish_list" class="primary-btn">ADD TO CARD</button>
                                        @endif
                                    </td>
                                    <td class="text-center"><button id="{{$wish_list_item->id}}" class="btn btn-warning btn_delete_wish_list{{$wish_list_item->id}} btn_delete_wish_list">Delete</button></td>

                                    <!-- Modal notification_add_cart -->
                                    <div class="modal fade" id="notification_add_cart_wish_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Số lượng sản phẩm không đủ. Vui lòng chọn sản phẩm khác.</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-danger">Save changes</button> -->
                                        </div>
                                        </div>
                                    </div>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
