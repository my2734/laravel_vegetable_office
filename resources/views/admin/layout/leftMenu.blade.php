<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        @if(session('admin.role') == 0 || session('admin.role') == 1)
        <li><a href="{{route('admin.index')}}"><i class="fa fa-home"></i> @lang('lang.home')</a></li>
        <li><a href="{{route('order.index')}}"><i class="fa fa-shopping-cart"></i>@lang('lang.order')</a></li>
        <li><a href="{{route('product.index')}}"><i class="fa fa-table"></i> @lang('lang.product')</a></li>
        <li><a href="{{route('category.index')}}"><i class="fa fa-list-alt"></i> @lang('lang.category') </a> </li>
        <li><a href="{{route('warehouse.index')}}"><i class="fa fa-truck" aria-hidden="true"></i>@lang('lang.warehouse')</a> </li>
        <li><a href="{{route('admin.chat.index')}}"><i class="fa fa-weixin" aria-hidden="true"></i> @lang('lang.message') </a></li>
        <li><a href="{{route('blog.index')}}"><i class="fa fa-cloud-upload" aria-hidden="true"></i> @lang('lang.post_blog')</a></li>
        <li><a href="{{route('category_of_blog.index')}}"><i class="fa fa-list-alt"></i> @lang('lang.category_blog') </a> </li>
        <li><a href="{{route('tags.index')}}"><i class="fa fa-tags"></i></i> Tags (Blogs)</a></li>
        <li><a href="{{route('event.index')}}"><i class="fa fa-birthday-cake" aria-hidden="true"></i> @lang('lang.event')</a></li>
        <li><a href="{{route('user.index')}}"><i class="fa fa-user" aria-hidden="true"></i> @lang('lang.user') </a></li>
        <li><a href="{{route('comment.index')}}"><i class="fa fa-comments" aria-hidden="true"></i> @lang('lang.comment') </a></li>
        <li><a href="{{route('setting.index')}}"><i class="fa fa-cog" aria-hidden="true"></i> @lang('lang.setting') </a></li>
        @if(session('admin.role')!=1)
        <li><a href="{{route('manager_human.index')}}"><i class="fa fa-users" aria-hidden="true"></i> @lang('lang.manager_human')</a></li>
        @endif
        @endif
        @if(session('admin.role') == 2 || session('admin.role') == 0)
        <li><a href="{{route('ship.order.index')}}"><i class="fa fa-bicycle" aria-hidden="true"></i> @lang('lang.shipment') </a></li>
        @endif
      </ul>
    </div>
  </div>