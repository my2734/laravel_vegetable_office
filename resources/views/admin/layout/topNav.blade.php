<div class="top_nav">
  <div class="nav_menu">
    <div class="nav toggle">
      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <nav class="nav navbar-nav">
      <ul class=" navbar-right">

        <li class="nav-item dropdown open" style="padding-left: 15px;">
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <img src="{{asset('backend/images/img.jpg')}}" alt="">{{session('admin.name')}}
          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="javascript:;"> @lang('lang.profile')</a>
            <a class="dropdown-item" href="javascript:;">
              <span class="badge bg-red pull-right">50%</span>
              <span>Settings</span>
            </a>
            <a class="dropdown-item" href="javascript:;">@lang('lang.help')</a>
            <a class="dropdown-item" href="{{route('admin.logout')}}"><i class="fa fa-sign-out pull-right"></i> @lang('lang.logout')</a>
          </div>
        </li>

        <li role="presentation" class="nav-item dropdown open">
          <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span id="total_news" class="badge bg-green">{{ isset($total_news)? $total_news : 0 }}</span>
          </a>
          <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
            @if(isset($news))
            @foreach($news as $key => $news_item)
            <li @if($news_item->status==0) style="background-color: #CACFD2 !important;" else style="background-color: white !important" @endif class="nav-item row_news{{$news_item->id}}">
              <a id="{{ $news_item->id }}" class="change_status_news" @if($news_item->topic == "gmail") href="{{ $news_item->link }}" @else href="{{ route($news_item->link)}}" @endif class="dropdown-item">
                <span class="image">
                  @if($news_item->User_Info->avatar=="")
                  <img src="{{asset('backend/images/img.jpg')}}" alt="Profile Image" />
                  @else
                  <img src="{{asset('Uploads/'.$news_item->User_Info->avatar)}}" alt="">
                  @endif
                </span>
                <span>
                  <span class="font-weight-bold">{{ $news_item->User->name}}</span>
                  <span class="time">
                    <p>{{ $news_item->created_at }}</p>
                  </span>
                  <!-- <button class="ml-auto btn btn-sm btn-primary"><i class="fa fa-share" aria-hidden="true"></i></button> -->
                </span>
                <span class="message mt-2">
                  <p>
                    @if($news_item->topic == 'gmail')
                    {{ $news_item->User->name}} @lang('lang.notice_email')
                    @elseif($news_item->topic == 'comment')
                    {{ $news_item->User->name}} @lang('lang.notice_comment')
                    @else
                    {{ $news_item->User->name}} @lang('lang.notice_order')
                    @endif
                    <a @if($news_item->topic == "gmail") href="{{ $news_item->link }}" @else href="{{ route($news_item->link)}}" @endif><i class="fa fa-share" aria-hidden="true"></i></a>
                  </p>
                </span>
              </a>
            </li>
            @endforeach
            @endif
            <li id="allAlert" class="nav-item">
              <div class="text-center">
                <a class="dropdown-item">
                  <strong>@lang('lang.see_all')</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li>
        <li>
          <div class="mx-3">
            <a href="{{route('change.languge','vi')}}" class="custom-item-language ml-2">@lang('lang.vietnames')</a>
            <a href="{{route('change.languge','en')}}" class="custom-item-language ml-2">@lang('lang.english')</a>
          </div>
        </li>

      </ul>
    </nav>
  </div>
</div>