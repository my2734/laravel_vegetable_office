@extends('ship.layout.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Quản lý nhân sự</h4>
                    <a href="{{route('ship.shiper.add')}}">
                        <button class="btn btn-primary" style="width: auto;">Thêm nhân viên<i style="font-size: 16px;" class="nc-icon ml-2 nc-circle-10"></i></button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Mã nhân viên
                                </th>
                                <th>
                                    Hình ảnh
                                </th>
                                <th>
                                    Họ tên
                                </th>
                                <th>
                                    Bộ phận
                                </th>
                                <th class="text-right">
                                    Số điện thoại
                                </th>
                                <th class="text-right" width="250" > 
                                    Địa chỉ
                                </th>
                            </thead>
                            <tbody>
                                @if(isset($shippers))
                                    @foreach($shippers as $key => $shipper)
                                    <tr>
                                        <td>
                                            {{$shipper->id}}
                                            <br />
                                            <a href="{{route('ship.shiper.edit', $shipper->id)}}" style="border: none;" class="badge badge-success border-none">Edit</a>
                                        </td>
                                        <td>
                                            <img width="100" src="{{asset('Uploads/'.$shipper->image)}}">
                                        </td>
                                        <td>
                                            {{$shipper->name}}
                                        </td>
                                        <td>
                                            Giao hàng
                                        </td>
                                        <td class="text-right">
                                            {{$shipper->phone}}
                                        </td>
                                        <td class="text-right">
                                            {{$shipper->address}}
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
@endsection