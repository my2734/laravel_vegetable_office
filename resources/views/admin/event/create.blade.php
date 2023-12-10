@extends('admin.layout.master')
@section('content')
    <div class="title-left">
        <h2>Tạo mới danh mục</h2>
    </div>
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{isset($event_edit) ? "Update Event" : "Create Event"}}</h2>
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
                <form action="{{isset($event_edit) ? route('event.update',$event_edit->id): route('event.store')}}"  method="POST" class="form-label-left input_mask" enctype="multipart/form-data">
                    <div class="col-md-12 col-sm-12  form-group">
                        <input type="text" class="form-control" value="{{isset($event_edit) ? $event_edit->name : old('name')  }}" name="name" placeholder="Tên sự kiện giảm giá">
                        @if($errors->has('name'))
                            <span class="text-danger ">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="col-md-12 col-sm-12  form-group">
                        <input type="text" class="form-control" value="{{isset($event_edit) ? $event_edit->percent : old('percent')  }}" name="percent" placeholder="Phần trăm giảm giá">
                        @if($errors->has('percent'))
                            <span class="text-danger ">{{$errors->first('percent')}}</span>
                        @endif
                    </div>
                    <div class="col-md-12 col-sm-12  form-group">
                        <textarea name="description" class="form-control" placeholder="Mô tả" id="floatingTextarea">{{isset($event_edit) && $event_edit->description ? $event_edit->description : old('description')}}</textarea>
                    </div>
                    <div class="col-md-6 col-sm-6  form-group">
                        <label>Ngày bắt đầu</label>
                        <input value="{{isset($event_edit) ? $event_edit->start_date :old('start_date')}}" name="start_date" type="date" class="form-control">
                        @if($errors->has('start_date'))
                        <span class="text-danger ">{{$errors->first('start_date')}}</span>
                    @endif
                    </div>
                    <div class="col-md-6 col-sm-6  form-group">
                        <label>Ngày kết thúc</label>
                        <input value="{{isset($event_edit) ? $event_edit->end_date : old('end_date')}}" name="end_date" type="date" class="form-control">
                        @if($errors->has('end_date'))
                        <span class="text-danger ">{{$errors->first('end_date')}}</span>
                    @endif
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group row justify-content-center mt-5">
                            <a href="{{route('event.index')}}"><button type="button" class="primary-btn custom-primary-btn p-2 text-white btn-submit-store-form btn-update-category">Cancel</button></a>
                            <button class="primary-btn custom-primary-btn p-2 text-white btn-submit-store-form btn-update-category" type="reset">Reset</button>
                            @if(isset($event_edit))
                            <button type="submit" class="primary-btn custom-primary-btn p-2 text-white btn-submit-store-form btn-update-category">Update</button>
                            @else
                            <button type="submit" class="primary-btn custom-primary-btn p-2 text-white btn-submit-store-form btn-update-category">Submit</button>
                            @endif
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection