<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{route('order.index')}}"><i class="fa fa-shopping-cart"></i>Order</a></li>
        <li><a href="{{route('product.index')}}"><i class="fa fa-table"></i> Product</a></li>
        <li><a href="{{route('category.index')}}"><i class="fa fa-list-alt"></i> Category </a> </li>
        <li><a href="{{route('warehouse.index')}}"><i class="fa fa-truck" aria-hidden="true"></i>Warehouse</a> </li>
        <li><a href="{{route('admin.chat.index')}}"><i class="fa fa-weixin" aria-hidden="true"></i> Messager </a></li>

        <!-- <li><a><i class="fa fa-edit"></i>Dữ liệu nhập xuất <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" style="">
            <li><a href="{{route('datainputoutput.input_index')}}">Dữ liệu nhập hàng</a></li>
            <li><a href="{{route('datainputoutput.output_index')}}">Dữ liệu xuát hàng</a></li>
            <li><a href="form_advanced.html">Dữ liệu kho hàng</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-edit"></i>Báo cáo thống kê<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" style="">
            <li><a href="form.html">Thống kê nhập xuất tồn đầu</a></li>
            <li><a href="form_advanced.html">Thống kê doanh thu</a></li>
            <li><a href="form_advanced.html">Thống kê số lượng hàng bán ra</a></li>
          </ul>
        </li> -->
        <li><a href="{{route('blog.index')}}"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Post Blog</a></li>
        <li><a href="{{route('category_of_blog.index')}}"><i class="fa fa-list-alt"></i> Category Of Blog </a> </li>
        <li><a href="{{route('tags.index')}}"><i class="fa fa-tags"></i></i> Tags (Blogs)</a></li>
        <li><a href="{{route('user.index')}}"><i class="fa fa-user" aria-hidden="true"></i> User </a></li>
        <li><a href="{{route('comment.index')}}"><i class="fa fa-comments" aria-hidden="true"></i> Manager Comment </a></li>
        <li><a href="{{route('manager_human.index')}}"><i class="fa fa-users" aria-hidden="true"></i> Manager Human</a></li>
      </ul>
    </div>
  </div>