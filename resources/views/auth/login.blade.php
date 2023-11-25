@extends('auth.layout.main')
@section('content')
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card border-0 shadow rounded-3 my-5">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title text-center mb-5 fw-light fs-5 mb-2">Sign In</h5>
                           
                           
                            <form method="POST" action="{{ route('login') }}">
                                <div class="form-floating mb-3">
                                  <label for="floatingInput">Email address</label>
                                    <input type="email" class="form-control" value="{{old('email')}}" name="email" id="floatingInput" placeholder="name@example.com">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                  <label for="floatingPassword">Password</label>
                                    <input type="password" class="form-control" value="{{old('password')}}" name="password" id="floatingPassword" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" name="remember" type="checkbox" value="" id="rememberPasswordCheck">
                                    <label class="form-check-label" for="rememberPasswordCheck">
                                    Remember password
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" style="text-decoration:none" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <div class="d-grid">
                                    <button id="btnSubmitLogin" class="site-btn btn-sm btn-login text-uppercase fw-bold" type="submit">Đăng nhập</button>
                                    <a href="{{route('register')}}" class="btn btn-secondary text-white float-right btn-sm btn-login text-uppercase fw-bold" >Đăng ký</a>
                                </div>
                                <hr class="my-4">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection