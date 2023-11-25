@extends('admin.layout.master')

@section('content')
    <div class="title_left">
        <h3>@lang('lang.list_blog')</h3>
    </div>
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>@lang('lang.list_blog')</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="text-white" href="{{route('blog.create')}}"><button class="primary-btn custom-primary-btn p-2 text-white ml-3">@lang('lang.create_new') <i class="fa fa-plus"></i></a></button>
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
                            <th>@lang('lang.title')</th>
                            <th>@lang('lang.category')</th>
                            <th>Tags</th>
                            <th>@lang('lang.descript_header_blog')</th>
                            <th>@lang('lang.descript_footer_blog')</th>
                            <th>@lang('lang.image')</th>
                            <th>@lang('lang.manager')</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        
                        @foreach($blogs as $key => $blog)
                        
                        <tr>
                            <th scope="row">{{$blog->id}}</th>
                            <td>{{$blog->title}}</td>
                            <td>{{$blog->category_of_blog->name}}</td>
                            <td>
                                @foreach($blog->tagses as $tags)
                                <span class="badge badge-secondary p-1">{{$tags->name}}</span>
                                @endforeach
                            </td>
                            <td>{{$blog->detail_header}}</td>
                            <td>{{$blog->detail_footer}}</td>
                            <td>
                                <img height="50px;" src="{{asset('Uploads/'.$blog->image)}}" alt="">
                            </td>
                            <td>
                                <button class="primary-btn custom-primary-btn p-2 text-white" data-toggle="modal" data-target="#delete_category{{$blog->id}}">@lang('lang.delete')</button>
                                <a href="{{route('blog.edit',$blog->id)}}" class="primary-btn custom-primary-btn p-2 text-white">@lang('lang.edit')</a>
                            
                                <!-- Modal -->
                                <div class="modal fade" id="delete_category{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">@lang('lang.do_you_want_delete_blog')</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="sub-btn custom-primary-btn p-2" data-dismiss="modal">@lang('lang.cancel')</button>
                                                <a href="{{route('blog.delete',$blog->id)}}" class="primary-btn custom-primary-btn p-2 text-white">@lang('lang.sure')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
                <div class="float-right">
                    {{$blogs->links('vendor.pagination.custom')}}
                </div>
            </div>
        </div>
    </div>

@endsection