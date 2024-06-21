@extends('layouts.app')

@section('content')
    <div class="main-login">
        <section class="login-form w-1440px">
            <div class="main-form">
                <h1 class="login-tittle">ĐĂNG NHẬP</h1>
                <div class="input-group">
                    <input type="text" id="username" class="input-group__input input-login" required />
                    <label for="username" class="input-group__label login-label">Tên đăng nhập</label>
                </div>
                <div class="input-group">
                    <input type="password" id="password" class="input-group__input input-login" required />
                    <label for="password" class="input-group__label login-label">Mật khẩu</label>
                </div>
                <span class="login-alert"></span>

                <div class="login-action">
                    <div class="remember">
                        <label class="cyberpunk-checkbox-label">
                            <input type="checkbox" class="cyberpunk-checkbox" id="remember">Nhớ mật khẩu</label>
                    </div>
                    <div class="forgot">
                        <a href="#">Quên mật khẩu?</a>
                    </div>
                </div>
                <div class="btn-login">
                    <input class="buy-home" type="button" value="Đăng nhập" onclick="login()">
                </div>
            </div>
        </section>
    </div>
@endsection
