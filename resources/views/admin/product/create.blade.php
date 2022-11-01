@extends('admin.layout.master')

@section('content')
    <div class="title-left">
        <h2>{{isset($product_edit) ? "Chỉnh sửa sản phẩm": "Tạo mới sản phẩm"}}</h2>
    </div>
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{isset($product_edit) ? "Update Product": "Create Product"}}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                <form action="{{isset($product_edit) ? route('product.update',$product_edit->id) : route('product.store') }}"  method="POST" class="form-label-left input_mask" enctype="multipart/form-data">
                    <div class="col-md-6 col-sm-6 form-group">
                        <input type="text" class="form-control" value="{{isset($product_edit) ? $product_edit->name : old('name') }}" name="name" id="inputSuccess2" placeholder="Tên sản phẩm">
                        @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 form-group">
                        <input type="text" class="form-control" value="{{isset($product_edit) ? $product_edit->price_unit : old('price_unit') }}" name="price_unit" id="inputSuccess2" placeholder="Giá sản phẩm">
                        @if($errors->has('price_unit'))
                            <span class="text-danger">{{$errors->first('price_unit')}}</span>
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 form-group">
                        <input type="text" class="form-control" value="{{isset($product_edit) ? $product_edit->price_promotion : old('price_promotion') }}" name="price_promotion" id="inputSuccess2" placeholder="Giá khuyến mãi">
                        
                    </div>
                    
                    <div class="col-md-6 col-sm-6 form-group">
                        <input type="text" class="form-control" value="{{isset($product_edit) ? $product_edit->quantity : old('quantity') }}" name="quantity" id="inputSuccess2" placeholder="Số lượng">
                        @if($errors->has('quantity'))
                            <span class="text-danger">{{$errors->first('quantity')}}</span>
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 form-group">
                        <select class="select2_single form-control" name="cat_id" >
                            @foreach($categories as $category)
                                <option <?php if(isset($product_edit) && $product_edit->cat_id==$category->id) { ?>
                                    selected
                            <?php   }elseif(old('cat_id')==$category->id){ ?>
                                    selected
                            <?php  } ?> value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="col-md-6 col-sm-6 form-group">
                        <div class="custom-file">
                            <input type="file" name="images[]" class="custom-file-input" id="customFile" multiple>
                            <label class="custom-file-label" for="customFile">{{isset($product_edit) ? "Đã có ảnh" : "Chọn ảnh"}}</label>
                            @if($errors->has('images'))
                                <span class="text-danger">{{$errors->first('images')}}</span>
                            @endif
                        </div>
                    </div>
                   
                    <div class="col-md-12 col-sm-12  form-group">
                        <label for="">Mô tả</label>
                        <textarea class="form-control" rows="5"  name="description" id="">{{isset($product_edit) ? $product_edit->description : old('description')}}</textarea>
                    </div>
                    <div class="col-md-6 col-sm-6 form-group">
                        <div class="checkbox">
                            <h4>
                                <input type="checkbox"  @if(isset($product_edit)) @if($product_edit->top_rate==1) checked @endif @endif name="top_rate" value="1" class="mr-3">Bán chạy
                            </h4>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2 col-sm-6 form-group">
                        <div class="checkbox">
                            <h4>
                                <input type="checkbox" @if(isset($product_edit)) @if($product_edit->status==1) checked @endif @endif name="status" value="1" class="mr-3">Trạng thái
                            </h4>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group row">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <a href="{{route('product.index')}}"><button type="button" class="btn btn-primary">Cancel</button></a>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                    
                    @csrf
                </form>
            </div>
        </div>
    </div>


@endsection