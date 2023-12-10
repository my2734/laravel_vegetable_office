@extends('admin.layout.master')
@section('content')
<div class="title_left">
    <h3>Danh sách giảm giá</h3>
</div>
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Event List </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="{{route('event.create')}}" class="text-white" href=""><button class="btn btn-primary ml-3 btn-sm">Thêm<i class="fa fa-plus"></i></a></button>
                </li>
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>Phần trăm giảm giá</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Quản Lý</th>
                    </tr>
                </thead>
                <tbody>
                   @if(isset($arr_list_event))
                   @foreach($arr_list_event as $key => $event)
                    <tr>
                        <th scope="row">{{($key+1)}}</th>
                        <td>{{$event->name}}</td>
                        <td>{{$event->description}}</td>
                        <td>{{$event->percent}}%</td>
                        <td>
                           {{$event->start_date}}
                        </td>
                        <td>{{$event->end_date}}</td>
                        <td>
                            <button class="btn btn_delete_category btn-danger btn-sm" data-toggle="modal" data-target="#delete_category{{$event->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            <a href="{{route('event.edit', $event->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <!-- Modal -->
                            <div class="modal fade" id="delete_category{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Bạn chắn chắc muốn xóa giảm giá này</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                            <a href="{{route('event.delete', $event->id)}}" class="btn btn-danger text-white">Chắc chắn</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection