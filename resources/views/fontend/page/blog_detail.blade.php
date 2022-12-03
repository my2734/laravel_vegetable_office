@extends('fontend.layout.master')

@section('content')
     <!-- Blog Details Hero Begin -->
     <section class="blog-details-hero set-bg" data-setbg="{{asset('fontend/img/blog/details/details-hero.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>{{$blog_detail->title}}</h2>
                        <ul>
                            <li>By Admin</li>
                            <li>{{$blog_detail->created_at}}</li>
                            <!-- <li>8 Comments</li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->
    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="#">@lang('lang.all')</a></li>
                                @foreach($category_of_blogs as $category_of_blog)
                                <li><a href="{{route('home.category_of_blog',$category_of_blog->slug)}}">{{$category_of_blog->name}} ({{$blogs->where('cat_id',$category_of_blog->id)->count()}})</a></li>
                               @endforeach
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
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
                            <h4>Search By</h4>
                            <div class="blog__sidebar__item__tags">
                                @foreach($tagses as $tags)
                                <a href="{{route('home.tags',$tags->slug)}}">{{$tags->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img width="100%" src="{{asset('Uploads/'.$blog_detail->image)}}" alt="">
                        <p>{{$blog_detail->detail_header}} </p>
                        <h3> {{$blog_detail->title}} </h3>
                        <p>{{$blog_detail->detail_footer}}
                        </p>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="{{asset('fontend/img/admin.jpg')}}" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>Phạm Thị Ngọc Mỹ</h6>
                                        <span>Admin</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>@lang('lang.categories'):</span> {{$blog_detail->category_of_blog->name}}</li>
                                        <li><span>@lang('lang.tags'): </span>
                                                    @foreach($blog_detail->tagses as $key => $tags)
                                                    {{ $key != 0 ? "," : ""}} {{$tags->name}}
                                                    @endforeach

                                            </span>
                                        </li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>@lang('lang.post_you_may_like')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogs->take(6) as $key => $blog)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img height="320px" src="{{asset('Uploads/'.$blog->image)}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{$blog->updated_at}}</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="{{route('home.blog_detail',$blog->slug)}}">{{$blog->title}}</a></h5>
                            <p class="limit_text">{{$blog->detail_header}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->
@endsection
