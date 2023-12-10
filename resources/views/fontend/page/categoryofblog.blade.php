@extends('fontend.layout.master')
@section('content')
  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="{{asset('fontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>@lang('lang.blog')</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('home.index')}}">@lang('lang.home')</a>
                        <span>@lang('lang.blog') - @lang('lang.category')({{$category_of_blog_slug->name}})</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>@lang('lang.categories')</h4>
                        <ul>
                            <li><a href="{{route('home.blog')}}">@lang('lang.all')</a></li>
                            @foreach($category_of_blogs as $category_of_blog)
                            <li><a href="{{route('home.category_of_blog',$category_of_blog->slug)}}">{{$category_of_blog->name}} ({{$blogs->where('cat_id',$category_of_blog->id)->count()}})</a></li>
                           @endforeach
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>@lang('lang.recent_news')</h4>
                        <div class="blog__sidebar__recent">
                            @foreach($blogs->take(3) as $blog)
                            <a href="{{route('home.blog_detail',$blog->slug)}}" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img class="img_current_blog" src="{{asset('Uploads/'.$blog->image)}}" alt="">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h6>{{$blog->title}}</h6>
                                    <span>{{$blog->updated_at}}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>@lang('lang.search_by')</h4>
                        <div class="blog__sidebar__item__tags">
                            @foreach($tagses as $tags)
                            <a href="{{route('home.tags',$tags->slug)}}">{{$tags->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    @foreach($blog_about_category as $key => $blog)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img class="custom_img_blog" src="{{asset('Uploads/'.$blog->image)}}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> {{$blog->updated_at}}</li>
                                    {{-- <li><i class="fa fa-comment-o"></i> 5</li> --}}
                                </ul>
                                <h5><a href="#">{{$blog->title}}</a></h5>
                                <p class="limit_text">{{$blog->detail_header}} </p>
                                <a href="{{route('home.blog_detail',$blog->slug)}}" class="blog__btn">@lang('lang.read_more') <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{$blogs->links('vendor.pagination.custom')}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection