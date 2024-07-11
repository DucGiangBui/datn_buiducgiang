@extends('client.layouts.app')

@section('content')
    <div class="page-header align-items-start min-vh-100">
        <span class="mask opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="main-login">
                        <section class="login-form w-1440px">
                            <div class="main-form">
                                <h4 class="login-tittle">ĐĂNG NHẬP</h4>
                                <form method="POST" action="{{ route('login') }}" class="text-start">
                                    @csrf
                                    <div class="input-group">
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
                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label mb-0 ms-3" for="rememberMe">Nhớ mật khẩu</label>
                                    </div>

                                    <div class="text-center">

                                        <div class="btn-login">
                                            <button type="submit" class="buy-home">
                                                {{ __('Đăng nhập') }}
                                            </button>
                                        </div>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <div class="forgot">
                                            <a class="" href="{{ route('password.request') }}">
                                                {{ __('Quên mật khẩu?') }}
                                            </a>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
