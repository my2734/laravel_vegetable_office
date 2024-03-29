@extends('admin.layout.master')
@section('content')
<div class="title_left">
    <h3>@lang('lang.list_tags_blog')</h3>
</div>
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>@lang('lang.list_tags_blog')</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="text-white" href="{{route('tags.create')}}"><button class=" ml-3 primary-btn custom-primary-btn p-2 text-white">@lang('lang.create_new') <i class="fa fa-plus"></i></a></button>
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
                        <th>@lang('lang.name')</th>
                        <th>@lang('lang.status')</th>
                        <th>@lang('lang.manager')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tagses as $key => $tags)
                    <tr>
                        <th scope="row">{{($key+1)}}</th>
                        <td>{{$tags->name}}</td>
                        <td><span id="{{$tags->id}}" class="cursor_pointer change_status_tags{{$tags->id}} change_status_tags badge {{$tags->status==1?'badge-danger':'badge-secondary'}}">
                            @if($tags->status==1)
                            @lang('lang.display')
                            @else
                            @lang('lang.not_display')
                            @endif    
                        </span></td>
                        <td>
                            <button class="primary-btn custom-primary-btn p-2 text-white" data-toggle="modal" data-target="#delete_tags{{$tags->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            <a href="{{route('tags.edit',$tags->id)}}" class="primary-btn custom-primary-btn p-2 text-white"><i class="fa fa-pencil" aria-hidden="true"></a>
                            <!-- Modal -->
                            <div class="modal fade" id="delete_tags{{$tags->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">@lang('lang.do_you_want_delete_category')</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="sub-btn custom-primary-btn p-2" data-dismiss="modal">@lang('lang.cancel')</button>
                                            <a href="{{route('tags.delete',$tags->id)}}" class="primary-btn custom-primary-btn p-2 text-white">@lang('lang.sure')</a>
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