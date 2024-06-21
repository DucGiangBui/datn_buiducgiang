<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @unless (request()->is('order'))
    <title>Onetap</title>
    @endunless
    @unless (request()->is('/'))
    <title>Onetap | Đặt hàng</title>
    @endunless
    @unless (request()->is('login'))
    <title>Onetap | Đăng nhập</title>
    @endunless
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
    <header class="header">
        <div class="box-content-header">
            <div class="content-header-tab">
                <div class="content-header-tab-1">
                    <a href="{{ route('app') }}"><img class="logo-header" src="{{ asset('client/assets/imgs/LOGO.png') }}" /></a>
                    <!-- resources/views/layouts/app.blade.php -->

                    @unless (request()->is('login'))
                        <nav class="list-page">
                            <ul>
                                <li>
                                    <a href="{{ route('app') }}"
                                        class="btn-header-1 {{ Request::is('/') ? 'active' : '' }} link-line">GIỚI
                                        THIỆU</a>
                                </li>
                                @unless (request()->is('orders'))
                                <li>
                                    <a href="#demo" id="buy-header"
                                        class="btn-header-1 {{ Request::is('demo*') ? 'active' : '' }} link-line">DEMO</a>
                                </li>
                                <li>
                                    <a href="#contacts"
                                        class="btn-header-1 {{ Request::is('contacts*') ? 'active' : '' }} link-line">LIÊN
                                        HỆ</a>
                                </li>
                                @endunless
                                <li>
                                    <a href="{{ route('orders') }}"
                                        class="btn-header-1 {{ Request::is('orders') ? 'active' : '' }} link-line">ĐẶT
                                        HÀNG</a>
                                </li>
                            </ul>
                        </nav>
                    @endunless

                </div>
                <div class="content-header-tab-2">
                    <a class="btn-call-hotline" href="tel://0833200319">
                        <i class="fa-solid fa-phone-volume"></i>
                        <p class="hotline fw-500">HOTLINE</p>
                    </a>
                    @unless (request()->is('login'))
                    <a class="btn-header-2 fw-700 link-line" href="#">ĐĂNG NHẬP</a>
                    @endunless
                </div>
            </div>
        </div>
    </header>
    <main class="web-main">
        @yield('content')
    </main>
    <footer class="footer {{ Request::is('login') ? 'absolute-footer' : '' }}">
        <div class="footer-main">
            <section class="footer-content1 width-30">
                <div class="content1-main">
                    <div class="footer-widget">
                        <a href="index.html" class="footer-widget__Logo">
                            <img class="logo-footer" src="{{ asset('client/assets/imgs/LOGO.png') }}" />
                        </a>
                        <p class="tittle-logofooter">DANH THIẾP ĐIỆN TỬ THÔNG MINH</p>
                        <form action="#" class="mc-form">
                            <div class="input-group">
                                <input type="text" id="position" class="input-group__input input-txt-footer"
                                    required />
                                <label for="position" class="input-group__label input-label-footer">Email</label>
                            </div>
                            <button type="submit" class="send-email-footer buy-home">
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </form>
                        <div class="footer__social">
                            <a href="#" class="fab fa-facebook-square"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-pinterest-p"></a>
                            <a href="#" class="fab fa-instagram"></a>
                        </div>
                    </div>
                </div>
            </section>
            <span class="line-1px"></span>
            <section class="footer-content3 width-30">
                <div class="footer-contacts">
                    <h3 class="footer-widget__title">Liên hệ</h3>
                    <ul class="list-unstyled footer-widget__contact">
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <a href="tel:0833200319">Điện thoại : 0833 200 319</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-envelope"></i>
                            <a href="mailto:bgiang008@gmail.com"><span class="__cf_email__">Email:
                                    bgiang008@gmail.com</span></a>
                        </li>
                        <li>
                            <i class="fa-solid fa-earth-americas"></i>
                            <a href="#">Website: Onetap</a>
                        </li>
                        <li>
                            <i class="fa-brands fa-facebook"></i>
                            <a href="#">Fanpage: Onetap</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-location-pin"></i>
                            <a href="#">Địa chỉ: 114 Vũ Xuân Thiều, Long Biên, Hà Nội</a>
                        </li>
                    </ul>
                </div>
            </section>
            <span class="line-1px"></span>
            <section class="footer-content2 width-30">
                <div class="">
                    <div class="footer-widget footer-widget__links-widget">
                        <h3 class="footer-widget__title">Địa chỉ</h3>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3723.9648102212145!2d105.91625107571963!3d21.034093987594506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjHCsDAyJzAyLjciTiAxMDXCsDU1JzA3LjgiRQ!5e0!3m2!1svi!2s!4v1718790724020!5m2!1svi!2s"
                            width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </section>
        </div>
    </footer>
    <script src="{{ asset('client/assets/js/script.js') }}"></script>
</body>

</html>
