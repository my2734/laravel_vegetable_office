@extends('admin.layout.master')
@section('content')
<div id="screen-message" class="container">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card chat-app">
                <div id="plist" class="people-list">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <ul class="list-unstyled chat-list mt-2 mb-0">
                        @if(isset($arr_list_user))
                        @foreach($arr_list_user as $user)
                        <li class="clearfix ">
                            <a href="{{route('admin.chat.detail', $user->id)}}" class="d-flex">
                                <div style="height: 45px; width: 45px;">
                                    <img style="height: 100%; width: 100%; object-fit: cover" src="{{asset('Uploads/'.$user->User_Info->avatar)}}" alt="avatar">
                                </div>
                                <div class="about">
                                    <div class="name">{{$user->User_Info->name}}</div>
                                    <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
                <div class="chat">
                    @if(isset($list_message_detail))
                    <div>
                        <div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="d-flex" href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                        <div style="height: 60px; width: 60px;">
                                            <img style="height: 100%; width: 100%; object-fit: cover" src="{{asset('Uploads/'.$userDetail->User_Info->avatar)}}" alt="avatar">
                                        </div>
                                        <div class="chat-about">
                                            <h6 class="m-b-0">{{$userDetail->name}}</h6>
                                            <small>Last seen: 2 hours ago</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chat-history" style="height: 300px; overflow-y: scroll; padding-top: 20px;">
                            <ul id="contentMessage" user_id="{{$userDetail->id}}" class="m-b-0 pb-0">
                                @if(isset($list_message_detail))
                                    @foreach($list_message_detail as $message_detail)
                                        @if($message_detail->role != 'client')
                                        <li class="clearfix">
                                            <div class="message-data text-right">
                                                <span class="message-data-time">{{$message_detail->time}}</span>
                                            </div>
                                            <div class="message other-message float-right">{{$message_detail->message}}</div>
                                        </li>
                                        @else
                                        <li class="clearfix">
                                            <div class="message-data">
                                                <img style="width: 40px; height: 40px;" src="{{asset('Uploads/'.$userDetail->User_Info->avatar)}}" alt="avatar">
                                                <span class="message-data-time">{{$message_detail->time}}</span>
                                            </div>
                                            <div class="message custom-message-time my-message mb-2">{{$message_detail->message}}</div>
                                        </li>
                                        @endif
                                    @endforeach
                                @endif
                                {{-- <li class="clearfix">
                                    <div class="message-data text-right">
                                        <span class="message-data-time">10:10 AM, Today</span>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                    </div>
                                    <div class="message other-message float-right"> Hi Aiden, how are you? How is the
                                        project coming along? 
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="message-data text-right">
                                        <span class="message-data-time">10:10 AM, Today</span>
                                    </div>
                                    <div class="message other-message float-right"> Hi Aiden, how are you? How is the
                                        project coming along? 
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="message-data">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                        <span class="message-data-time">10:12 AM, Today</span>
                                    </div>
                                    <div class="message my-message">Are we meeting today?</div>
                                </li>
                                <li class="clearfix">
                                    <div class="message-data">
                                        <span class="message-data-time">10:15 AM, Today</span>
                                    </div>
                                    <div class="message my-message">Project has been already finished and I have results
                                        to show you.
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="chat-message clearfix">
                            <div class="input-group mb-0">
                                <div class="input-group-prepend button-send-admin">
                                    <span class="input-group-text"><i class="fa fa-send"></i></span>
                                </div>
                                <input id="message_admin" type="text" class="form-control" placeholder="Enter text here...">
                            </div>
                        </div>
                    </div>
                    @else
                    <h1>Hello ca Admin</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection