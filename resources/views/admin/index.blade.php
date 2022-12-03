@extends('admin.layout.master')
@section('content')
    <h1>Trang Admin</h1>
    @if(session('message_success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('message_success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
      <div class="row mb-5 text-white">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info px-2">
              <div class="inner text-white">
                <h3>{{$total_order}}</h3>
                <p>Total Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('order.index')}}" class="small-box-footer text-white btn btn-sm btn-primary text-center">More info</i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success px-2">
            <div class="inner text-white">
                <h3>{{$total_user}}</h3>
                <p>Total User</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('user.index')}}" class="small-box-footer text-white btn btn-sm btn-primary text-center">More info</i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning px-2">
            <div class="inner text-white">
                <h3>{{$total_product}}</h3>
                <p>Total Product</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('product.index')}}" class="small-box-footer text-white btn btn-sm btn-primary text-center">More info</i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger px-2">
            <div class="inner text-white">
                <h3>{{$total_blog}}</h3>
                <p>Total Blog</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('blog.index')}}" class="small-box-footer text-white btn btn-sm btn-primary text-center">More info</i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

      <div class="row my-5">
        <div class="col-3">
          <div class="form-group">
            <label for="exampleInputEmail1">Ngày bắt đầu</label>
            <input type="text" id="datepicker1" class="form-control" id="exampleInputEmail1">
            <span class="mt-2 btn btn-sm btn-primary btn_thong_ke">Thống kê</span>
          </div>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label for="exampleInputEmail1">Ngày kết thúc</label>
            <input type="text" id="datepicker2" class="form-control" id="exampleInputEmail1">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="exampleInputEmail1">Thống kê theo</label>
            <div class="form-group">
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-secondary btn_7ngaytruoc">7 ngày trước</button>
              <button type="button" class="btn btn-secondary btn_30ngaytruoc">1 tháng trước</button>
              <button type="button" class="btn btn-secondary btn_90ngaytruoc">3 tháng trước</button>
            </div>
            </div>
          </div>
        </div>
      
</div>
        <!-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <div class="col-3">
          <div class="form-group">
            <label for="exampleInputEmail1">Ngày bắt đầu</label>
          </div>
        </div>
      </div> -->
    <h4 class="ml-3" id="title_thong_ke"></h4>
     <div class="mt-3" id="myfirstchart" style="height: 250px;"></div>
      
      
      
      

@endsection
