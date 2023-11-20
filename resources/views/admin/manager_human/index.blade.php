@extends('admin.layout.master')

@section('content')
    <div class="title_left">
        
        <h3>Quản lý nhân viên</h3>
    </div>
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <div id="message_change_role_manager_human_success"></div>
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
                                    <button id="{{$admin->id}}" class=" btn_authorize_manager_human primary-btn custom-primary-btn p-2 text-white">Authorize</button>
                                @endif
                                <button id="{{$admin->id}}" class="primary-btn custom-primary-btn p-2 text-white btn_delete_manager_human">Delete User</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

@endsection