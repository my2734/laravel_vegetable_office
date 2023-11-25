@extends('admin.layout.master')
@section('content')
<div class="title_left">
    <h3>@lang('lang.manager_human')</h3>
</div>
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div id="message_change_role_manager_human_success"></div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>@lang('lang.username')</th>
                        <th>@lang('lang.email_address')</th>
                        <th>@lang('lang.phone')</th>
                        <th>@lang('lang.role')</th>
                        <th>@lang('lang.manager')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $key => $admin)
                    <tr class="row_manger_human{{$admin->id}}">
                        <th>{{($key+1)}}</th>
                        <td>
                            {{ $admin->name }}
                        </td>
                        <td>{{$admin->email}}</td>
                        <td>{{ $admin->phone }}</td>
                        <td>
                            @if($admin->role == 0)
                            <p style="font-size: 16px;">Administrator</p>
                            @else
                            <select class="form-control choose-role-user" name="chooseRoleUser" id="<?php echo $admin->id ?>">
                                <option <?php echo $admin->role == 0 ? "selected" : "" ?> value="0">@lang('lang.administrator')</option>
                                <option <?php echo $admin->role == 1 ? "selected" : "" ?> value="1">@lang('lang.staff')</option>
                                <option <?php echo $admin->role == 2 ? "selected" : "" ?> value="2">@lang('lang.shipper')</option>
                            </select>
                            @endif
                        </td>
                        <td>
                            @if($admin->role == 0)
                            <button id="{{$admin->id}}" class="primary-btn custom-primary-btn p-2 text-white bg-secondary">@lang('lang.delete_user')</button>
                            @else
                            <button data-toggle="modal" data-target="#delete_user{{$admin->id}}" id="{{$admin->id}}" class="primary-btn custom-primary-btn p-2 text-white">@lang('lang.delete_user')</button>
                            @endif
                            <!-- Modal -->
                            <div class="modal fade" id="delete_user{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">@lang('lang.do_you_want_delete_user')</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="sub-btn custom-primary-btn p-2" data-dismiss="modal">@lang('lang.cancel')</button>
                                            <a href="{{route('manager_human.delete_role', $admin->id)}}" class="primary-btn custom-primary-btn p-2 text-white">@lang('lang.sure')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection