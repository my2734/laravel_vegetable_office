@extends('admin.layout.master')

@section('content')
    <div class="title_left">
        <h3>Danh sách Category(Blog)</h3>
    </div>
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Category Of Blog List </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="text-white" href="{{route('category_of_blog.create')}}"><button class="btn btn-primary ml-3 btn-sm">Create New <i class="fa fa-plus"></i></a></button>
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
                            <th>Name</th>
                            <th>Status</th>
                            <th>Manager</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($category_of_blogs as $key => $category_of_blog)
                        <tr>
                            <th scope="row">{{($key+1)}}</th>
                            <td>{{$category_of_blog->name}}</td>
                            <td><span id="{{$category_of_blog->id}}" class="cursor_pointer badge change_status_categoryofblog{{$category_of_blog->id}} change_status_categoryofblog {{$category_of_blog->status==1?'badge-danger':'badge-secondary'}}">{{$category_of_blog->status==1?"Hiển thị":"Không hiển thị"}}<span></td>
                            <td>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_category_ofblog">Delete</button>
                                <a href="{{route('category_of_blog.edit',$category_of_blog->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                
                            
                                <!-- Modal -->
                                <div class="modal fade" id="delete_category_ofblog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Bạn chắn chắc muốn danh mục blog này</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                                <a href="{{route('category_of_blog.delete',$category_of_blog->id)}}" class="btn btn-danger text-white">Chắc chắn</a>
                                                
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