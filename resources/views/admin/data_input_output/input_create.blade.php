@extends('admin.layout.master')
@section('content')
<div class="title-left">
    <h2>{{isset($product_edit) ? "Chỉnh sửa sản phẩm": "Nhập hàng"}}</h2>
</div>
<div class="col-md-12">
    <div class="x_panel">
        <form action="{{route('datainputoutput.input_store')}}"  method="POST" class="form-label-left input_mask" enctype="multipart/form-data">
            <div class="col-md-12 col-sm-12 form-group mt-5">
                <input type="text" class="form-control" value="" name="person" id="inputSuccess2" placeholder="Tên người nhập">
            </div>
            <div class="col-md-12 col-sm-12 form-group">
                <label for="">Nội dung nhập hàng: </label>
                <textarea class="form-control" rows="5"  name="content" id=""></textarea>
            </div>
            <div class="col-md-12 col-sm-12 form-group">
                <label for="">Ghi chú: </label>
                <textarea class="form-control" rows="3"  name="note" id=""></textarea>
            </div>
            <h6>Dữ liệu nhập hàng:</h6>
            <!-- <div class='row'>
                <table class="table" id="table_input_create">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Ngày sản xuất</th>
                            <th>Ngày hết hạn</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="body_input_create">
                        <tr>
                            <td>
                                <select class="select2_single form-control" name="product[]" >
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" value="" name="quantity[]" id="inputSuccess2" placeholder="">
                            </td>
                            <td>
                                <input type="text" name="price_unit[]" class="form-control" >
                            </td>
                            <td>
                                <input type="text" id="datepicker3" name="production_date[]" class="form-control" id="exampleInputEmail1">
                            </td>
                            <td>
                                <input type="text" id="datepicker4" name="expriration_date[]" class="form-control" id="exampleInputEmail1">
                            </td>
                            <td>
                                <input type="checkbox" id="select-all">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <span class="btn btn-warning delete">Xóa</span>
            </div> -->
            <div class="form-div element_need_add">
                <div class="row">
                    <div class="col">
                        <h6>Sản phẩm</h6>
                        <select class="select2_single form-control" name="product[]" id="firstname" >
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <h6>Số lượng</h6>
                        <input type="text" class="form-control" name="quantity[]" id="lastname">
                    </div>
                    <div class="col">
                        <h6>Đơn giá</h6>
                        <input type="text" class="form-control" name="price_unit[]" id="email" >
                    </div>
                    <div class="col" style="text-align: right;">
                        <h6>Ngày sản xuất</h6>
                        <input type="text" id="datepicker3" name="production_date[]" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="col" style="text-align: right;">
                        <h6>Ngày hết hạn</h6>
                        <input type="text" id="datepicker4" name="expriration_date[]" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="col" style="text-align: right;">
                        <h6>Xóa</h6>
                        <span class="btn btn-warning">Xóa</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6>Sản phẩm</h6>
                        <select class="select2_single form-control" name="product[]" id="firstname" >
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <h6>Số lượng</h6>
                        <input type="text" class="form-control" name="quantity[]" id="lastname">
                    </div>
                    <div class="col">
                        <h6>Đơn giá</h6>
                        <input type="text" class="form-control" name="price_unit[]" id="email" >
                    </div>
                    <div class="col" style="text-align: right;">
                        <h6>Ngày sản xuất</h6>
                        <input type="text" id="datepicker3" name="production_date[]" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="col" style="text-align: right;">
                        <h6>Ngày hết hạn</h6>
                        <input type="text" id="datepicker4" name="expriration_date[]" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="col" style="text-align: right;">
                        <h6>Xóa</h6>
                        <span class="btn btn-warning">Xóa</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6>Sản phẩm</h6>
                        <select class="select2_single form-control" name="product[]" id="firstname" >
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <h6>Số lượng</h6>
                        <input type="text" class="form-control" name="quantity[]" id="lastname">
                    </div>
                    <div class="col">
                        <h6>Đơn giá</h6>
                        <input type="text" class="form-control" name="price_unit[]" id="email" >
                    </div>
                    <div class="col" style="text-align: right;">
                        <h6>Ngày sản xuất</h6>
                        <input type="text" id="datepicker3" name="production_date[]" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="col" style="text-align: right;">
                        <h6>Ngày hết hạn</h6>
                        <input type="text" id="datepicker4" name="expriration_date[]" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="col" style="text-align: right;">
                        <h6>Xóa</h6>
                        <span class="btn btn-warning">Xóa</span>
                    </div>
                </div>
            </div>
            <div class="container">
                <!-- <table class="table">
                    <thead>
                        <tr>
                            <th>All <input type="checkbox" id="select-all"></th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>E-Mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" id="select-row"></td>
                            <td>example</td>
                            <td>example</td>
                            <td>example</td>
                        </tr>
                    </tbody>
                </table>
                <button class="remove-row" id="remove-row">Remove Row</button> -->
                <div class="ln_solid"></div>
                <div class="form-group row">
                    <a href="{{route('product.index')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save mr-1"></i>Lưu thông tin</button>
                    <button id="add_row" class="btn btn-success" type="reset"><i class="fa fa-plus mr-1"></i>Thêm sản phẩm</button>
                </div>
                @csrf
        </form>
        </div>
    </div>
</div>
@endsection