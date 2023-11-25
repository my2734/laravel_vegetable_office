@extends('admin.layout.master')

@section('content')
    <div class="title_left">
        
        <h3>@lang('lang.manager_comment')</h3>
    </div>
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>@lang('lang.approve')</th>
                            <th>@lang('lang.name_sender')</th>
                            <th>@lang('lang.comment')</th>
                            <th>@lang('lang.date_send')</th>
                            <th>@lang('lang.product')</th>
                            <th>@lang('lang.manager')</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($comments as $key => $comment)
                       <?php 
                            $color = "white";
                            if($comment->status ==0 ){
                                $color = "#E8E9EB";
                            }
                       ?>
                       <tr class="row_change_status{{$comment->id}}"  style="background-color: <?php echo $color ?>" >
                            <th>
                                @if($comment->status)
                                    <button id="{{$comment->id}}" class="primary-btn custom-primary-btn p-2 text-white btn_change_status{{$comment->id}} btn_change_comment">@lang('lang.reject')</button>
                                @else
                                    <button id="{{$comment->id}}" class="primary-btn custom-primary-btn p-2 text-white btn_change_status{{$comment->id}} btn_change_comment">@lang('lang.approve')</button>
                                @endif
                            </th>
                            <td>
                                {{ $comment->User->name }}
                            </td>
                            <td>
                                <p>{{ $comment->content }}<p>
                                <textarea class="form-control text_reply_comment{{$comment->id}}" rows="3" placeholder="{{ $comment->reply }}" name="description" id=""></textarea>
                                <button id="{{$comment->id}}" class="primary-btn custom-primary-btn p-2 text-white mt-1 btn_reply_comment btn_reply_comment{{$comment->id}}"><i class="fa fa-reply-all" aria-hidden="true"></i> @lang('lang.reply')</button>
                            </td>
                            <td>{{date('Y-m-d H:i:s')}}</td>
                            <td>{{ $comment->Product->name }}</td>
                            <td><button id="{{$comment->id}}" class="primary-btn custom-primary-btn p-2 text-white btn_delete_comment btn_delete_comment{{$comment->id}}" style="color: white;">@lang('lang.delete')</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection