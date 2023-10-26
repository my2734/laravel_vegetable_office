
<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
      <a href="{{route('ship.profile',0)}}" class="simple-text logo-mini">
        <div class="logo-image-small">
          <img src="{{asset('ship/assets/img/shipper-1.jpg')}}">
        </div>
        <!-- <p>CT</p> -->
      </a>
      <a href="{{route('ship.profile')}}" class="simple-text logo-normal">
        Giao hàng
        <!-- <div class="logo-image-big">
          <img src="../assets/img/logo-big.png">
        </div> -->
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="">
          <a href="{{route('ship.order.index')}}">
            <i class="nc-icon nc-basket"></i>
            <p>Quản lý đơn hàng</p>
          </a>
        </li>
        <li class="">
          <a href="{{route('ship.shiper.index')}}">
            <i class="nc-icon nc-circle-10"></i>
            <p>Quản lý nhân sự</p>
          </a>
        </li>
        <li>
          <a href="{{route('admin.index')}}">
            <i class="nc-icon nc-user-run"></i>
            <p>Đăng xuất</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
