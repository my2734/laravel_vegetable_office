@extends('admin.layout.master')

@section('content')
    <div class="title_left">
        
        <h3>Kho hàng</h3>
    </div>
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                    <div class="col-3">
                        <h2>Product List</h2>
                    </div>
                    <div class="col-6">
                        <!-- <form method="POST" action="{{route('product.search_product')}}">
                            <div class="input-group">
                                <input type="text" name="search_key" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary ml-1" type="button">Search</button>
                                </span>
                            </div>
                            @csrf
                        </form>     -->
                    </div>
                    <div class="col-3">
                        <!-- <ul class="nav navbar-right panel_toolbox">
                            <li><a class="text-white" href="{{route('product.create')}}"><button class="btn btn-primary ml-3 btn-sm">Create New <i class="fa fa-plus"></i></a></button>
                            </li>
                        </ul> -->
                    </div>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <div id="message_change_role_manager_human_success"></div>
            <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div> -->
                <table class="table table-bordered">
                    <thead style="font-size: 10px;">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Password</th>
                            <th>Admin</th>
                            <th>Staff</th>
                            <th></th>
                            
                            
                        </tr>
                    </thead>
                    <tbody style="font-size: 10px;">
                       @foreach($admins as $key => $admin)
                       <tr class="row_manger_human{{$admin->id}}">
                            <th>{{($key+1)}}</th>
                            <td>
                                {{ $admin->name }}
                            </td>
                            <td class="td_role_manager_human{{$admin->id}}">{{ ($admin->role == 0 ? 'Admin' : 'Staff') }}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{ $admin->phone }}</td>
                            <td>{{$admin->password}}</td>
                            <select>
                            <td>
                                <input class="input_role_admin input_role_admin{{$admin->id}}" value="1" @if($admin->role == 0) checked @endif type="checkbox">  
                            </td>
                            <td>
                                <input class="input_role_staff input_role_staff{{$admin->id}}" @if($admin->role != 0 ) checked @endif type="checkbox">  
                            </td>
                            </select>
                            <td style="font-size: 12px;">
                                @if(session('admin.id')==$admin->id)
                                 <button id="{{$admin->id}}" class="btn btn-sm btn-secondary" disabled>Unauthorize</button>
                                @else
                                    <button id="{{$admin->id}}" class="btn btn_authorize_manager_human btn-sm btn-success">Authorize</button>
                                @endif
                                <button id="{{$admin->id}}" class="btn btn-sm btn-warning btn_delete_manager_human">Delete User</button>
                                <!-- <a href="{{route('manager_human.change_user_current',$admin->id)}}" class="btn btn-sm btn-danger">Change User</a> -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

@endsection