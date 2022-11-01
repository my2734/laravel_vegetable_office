@extends('auth.layout.main')
@section('content')
<div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card border-0 shadow rounded-3 my-5">
                        <div class="card-body p-4 p-sm-5">
                            <!-- <h5 class="card-title text-center mb-5 fw-light fs-5 mb-2">Vui lòng xem lại Email</h5> -->
                           
                           
                            <div class="card">
                                <div class="card-header">{{ __('Vui lòng kiểm tra Email') }}</div>

                                <div class="card-body">
                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.') }}
                                        </div>
                                    @endif

                                    {{ __('Trước khi tiếp tục, vui lòng kiểm tra email của bạn để biết liên kết xác minh.') }}
                                    {{ __('Nếu bạn không nhận được email') }},
                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Click vào đây để gửi yêu cầu khác') }}</button>.
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
