@guest
    @if (Route::has('login'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    @endif
    @if (Route::has('register'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    </li>
    @endif
@else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
@endguest




@auth
<div class="header__top__right__language">
    <a href="{{route('checkout.lich_su_mua_hang')}}" style="color: #000;" class="">Lịch sử mua hàng</a>
</div>
<div class="header__top__right__language">
    <a style="color: #000;" href="{{route('home.get_user_info')}}">{{ Auth::user()->name }}</a>
</div>



<div class="header__top__right__auth">
<button class="btn_custom" data-toggle="modal" data-target="#modalLogout"><i class="fa fa-user"></i> Logout</button>
<!-- Modal -->
<div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn chắn chắc muốn Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                <!-- <a href="{{route('logout')}}"><i class="fa fa-user"></i> Logout</a> -->
                <a href="{{route('logout')}}" type="button" class="btn btn-danger text-white">Chắc chắn</a>
            </div>
        </div>
    </div>
</div>
@endauth

@guest
<a href="{{route('login')}}"><i class="fa fa-user"></i> Login</a>
@end@guest