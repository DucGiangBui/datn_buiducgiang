<aside class="sidenav navbar" id="sidenav-main">
    <div class="sidenav-header">
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">
            <img src="{{ asset('client/assets/imgs/LOGO.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item {{ request()->routeIs('profile.*') && !request()->routeIs('profile.card') ? 'active-link' : '' }}">
                <a class="nav-link " href="{{ route('profile.index') }}">
                    <i class="fa-solid fa-eye"></i>
                    <span>Thiết lập thông tin</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('profile.card') ? 'active-link' : '' }}">
                <a class="nav-link active-a" href="{{ route('profile.card') }}">
                    <i class="active-a fa-solid fa-address-card"></i>
                    <span>Card visit</span>
                </a>
            </li>
            <h4 class="title-account">Tài khoản</h4>
            <li class="nav-item {{ request()->routeIs('profile') ? 'active-link' : '' }}">
                <a class="nav-link" href="{{ route('profile.index') }}">
                    <i class="fa-solid fa-gear"></i>
                    <span>Cài đặt</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i>Đăng xuất
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>
