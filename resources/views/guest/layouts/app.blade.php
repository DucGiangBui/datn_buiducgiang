<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ONETAP</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="shortcut icon" href="{{ asset('client/assets/imgs/fanvicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('client/assets/imgs/fanvicon.png') }}" type="image/x-icon">
    @vite(['resources/js/app.js', 'resources/css/app.css'])

</head>

<body>
    @if (request()->is('profile.*'))
        <header class="header">
            <div class="box-content-header">
                <div class="content-header-tab">
                    <div class="content-header-tab-1">
                        <a href="{{ route('homepage') }}"><img class="logo-header"
                                src="{{ asset('client/assets/imgs/LOGO.png') }}" /></a>
                        <nav class="list-page">
                            <ul>
                                <li>
                                    <a href="{{ route('homepage') }}"
                                        class="btn-header-1 {{ Request::is('/') ? 'active' : '' }} link-line">GIỚI
                                        THIỆU</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="content-header-tab-2">
                        <a class="btn-call-hotline" href="tel://0833200319">
                            <i class="fa-solid fa-phone-volume"></i>
                            <p class="hotline fw-500">HOTLINE</p>
                        </a>
                        @if (request()->is('login') || request()->is('profile.*'))
                            <a class="btn-header-2 fw-700 link-line" href="{{ route('login') }}">ĐĂNG NHẬP</a>
                        @endif
                        @if (request()->is('login') || request()->is('profile.*'))
                            <a class="btn-header-2 fw-700 link-line" href="{{ route('register') }}">ĐĂNG KÝ</a>
                        @endif
                        @if (request()->routeIs('profile.*'))
                            <a class="btn-header-2 fw-700 link-line" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">ĐĂNG
                                XUẤT</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </header>
    @endif
    @if(request()->routeIs('profile.*'))
        @include('guest.layouts.sidebar')
    @endif
    <main class="web-main">
        @yield('content')
    </main>
    <script src="{{ asset('client/assets/js/script.js') }}"></script>
</body>

</html>
