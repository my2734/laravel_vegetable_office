@extends('ship.layout.master')
@section('content')
<div class="content">
    <div class="row">
       <div class="col-md-8 offset-md-2">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">{{isset($shipper_edit)?"Edit":"Create"}} Profile</h5>
            </div>
            <div class="card-body">
                <form action="{{isset($shipper_edit)?route('ship.shiper.update',$shipper_edit->id):route('ship.shiper.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>User name</label>
                                <input type="text" value="{{isset($shipper_edit)?$shipper_edit->name:""}}" class="form-control" placeholder="" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Avatar</label>
                                <div class="custom-file">
                                    <input name="image" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                                <span style="font-size: 12px;">{{isset($shipper_edit) && isset($shipper_edit) ? "Có ảnh":""}}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" value="{{isset($shipper_edit)?$shipper_edit->phone:''}}" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" value="{{isset($shipper_edit)?$shipper_edit->email:''}}" type="email" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input name="address" value="{{isset($shipper_edit)?$shipper_edit->address:''}}" type="text" class="form-control" placeholder="Home Address" value="Melbourne, Australia">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button style="width: auto;" type="submit" class="btn btn-primary btn-round">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
       </div>
       
    </div>
</div>
@endsection