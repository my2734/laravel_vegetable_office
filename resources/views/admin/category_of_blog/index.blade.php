@extends('admin.layout.master')

@section('content')
    <div class="title_left">
        <h3>@lang('lang.list_category_blog')</h3>
    </div>
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h3>@lang('lang.list_category_blog')</h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="text-white" href="{{route('category_of_blog.create')}}"><button class="primary-btn custom-primary-btn p-2 text-white ml-3">@lang('lang.create_new') <i class="fa fa-plus"></i></a></button>
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
                       @foreach($category_of_blogs as $key => $category_of_blog)
                        <tr>
                            <th scope="row">{{($key+1)}}</th>
                            <td>{{$category_of_blog->name}}</td>
                            <td><span id="{{$category_of_blog->id}}" class="cursor_pointer badge change_status_categoryofblog{{$category_of_blog->id}} change_status_categoryofblog {{$category_of_blog->status==1?'badge-danger':'badge-secondary'}}">{{$category_of_blog->status==1?"Hiển thị":"Không hiển thị"}}<span></td>
                            <td>
                                <button class="primary-btn custom-primary-btn p-2 text-white" data-toggle="modal" data-target="#delete_category_ofblog{{$category_of_blog->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                <a href="{{route('category_of_blog.edit',$category_of_blog->id)}}" class="primary-btn custom-primary-btn p-2 text-white"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                
                            
                                <!-- Modal -->
                                <div class="modal fade" id="delete_category_ofblog{{$category_of_blog->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">@lang('lang.do_you_want_delete_category_blog')</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="sub-btn custom-primary-btn p-2" data-dismiss="modal">@lang('lang.cancel')</button>
                                                <a href="{{route('category_of_blog.delete',$category_of_blog->id)}}" class="primary-btn custom-primary-btn p-2 text-white">@lang('lang.sure')</a>
                                                
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