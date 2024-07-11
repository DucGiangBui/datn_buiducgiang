@extends('client.layouts.app')

@section('content')
    <div class="page-header align-items-start min-vh-100">
        <span class="mask opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="main-login">
                            <section class="login-form w-1440px">
                                <div class="main-form">
                                    <h4 class="login-tittle">ĐĂNG KÝ</h4>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="input-group input-group-outline my-3">
                                            <input id="name" type="name"
                                                class="input-group__input input-login @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required autocomplete="name"
                                                autofocus>
                                            <label class="input-group__label login-label">Họ tên</label>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline my-3">
                                            <input id="email" type="email"
                                                class="input-group__input input-login @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus>
                                            <label class="input-group__label login-label">Email</label>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="input-group input-group-outline mb-3">
                                            <input id="password" type="password"
                                                class="input-group__input input-login @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">
                                            <label class="input-group__label login-label">Mật khẩu</label>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input id="password-confirm" type="password"
                                                class="input-group__input input-login" name="password_confirmation" required
                                                autocomplete="new-password">
                                            <label class="input-group__label login-label">Nhập lại mật khẩu</label>
                                        </div>
                                        <div class="text-center">
                                            <div class="btn-login">
                                                <button type="submit" class="buy-home">
                                                    {{ __('Đăng ký') }}
                                                </button>
                                            </div>
                                        </div>
                                        <p class="mt-4 text-sm text-center">
                                            Đã có tài khoản?
                                            <a href="{{ route('login') }}"
                                                class="text-primary text-gradient font-weight-bold">Đăng
                                                nhập</a>
                                        </p>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
