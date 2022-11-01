@extends('admin.layout.master')
@section('content')
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách khách hàng</h2>
            <ul class="nav navbar-right panel_toolbox">
               
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
                        <th>Full Name</th>
                        <th>Image</th>
                        <th>Phone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_user as $key => $user)
                    <tr>
                        <th scope="row">{{($key+1)}}</th>
                        <td>{{$user->full_name}}</td>
                        <td>
                            @if(isset($user->avatar))
                            <img height="50" width="50" style="object-fit:cover" src="{{asset('Uploads/'.$user->avatar)}}" alt="">
                            @else
                            <img height="50" width="50" style="object-fit:cover" src="https://i.pinimg.com/280x280_RS/2e/45/66/2e4566fd829bcf9eb11ccdb5f252b02f.jpg" alt="">
                            @endif
                        </td>
                        <td>{{$user->phone}}</td>
                        <td>
                           {{$user->email}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection