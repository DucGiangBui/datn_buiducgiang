<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Onetap</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    />
  </head>
  <body>
    <header class="header">
      <div class="box-content-header">
        <div class="content-header-tab">
          <div class="content-header-tab-1">
            <a href="./index.html"
              ><img class="logo-header" src="{{ asset('imgs/LOGO.png') }}"/></a>
            <a class="active btn-header-1" href="#">HOME PAGE</a>
            <a class="btn-header-1" href="#">CONTACTS</a>
            <a class="btn-header-1" href="#">BUY</a>
          </div>
          <div class="content-header-tab-2">
            <a class="btn-call-hotline" href="tel://0833200319">
              <i class="fa-solid fa-phone-volume"></i>
              <p class="hotline fw-500">HOTLINE</p>
            </a>
            <a class="btn-header-2 fw-700" href="">ĐĂNG NHẬP</a>
          </div>
        </div>
      </div>
    </header>
    <main class="py-4">
        @yield('content')
    </main>
    <footer class="footer">
        <p>Day la Footer</p>
    </footer>
  </body>
</html>


