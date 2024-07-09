@extends('client.layouts.app')
@section('content')
<section id="orders" class="introduction-5">
    <div class="introduction-5__content w-1440px">
        <div class="introduction-5__text">
            <h1 class="introduction-5__bigtitle fw-300">ĐẶT HÀNG</h1>
            <h1 class="introduction-5__title">NHẬP THÔNG TIN CỦA BẠN</h1>
            <div class="input-group">
                <input type="text" id="input-name1" class="input-group__input input-txt-5" required />
                <label for="fname" class="input-group__label input-label-5">Họ và tên</label>
            </div>
            <div class="input-group">
                <input type="text" id="input-position" class="input-group__input input-txt-5" required />
                <label for="position" class="input-group__label input-label-5">Chức vụ</label>
            </div>
            <form action="submit">
                <h1 class="introduction-5__title">NHẬP THÔNG TIN NHẬN HÀNG</h1>
                <div class="input-group">
                    <input type="text" id="input-phone" class="input-group__input input-txt-5" required />
                    <label for="phone" class="input-group__label input-label-5">Số điện thoại</label>
                </div>
                <div class="input-group">
                    <input type="text" id="input-address" class="input-group__input input-txt-5" required />
                    <label for="address" class="input-group__label input-label-5">Địa chỉ nhận hàng</label>
                </div>
                <input class="buy-home btn-ordes" type="button" value="Đặt hàng">
            </form>
        </div>
        <div class="introduction-select">
            <ul>
                @include('client.layouts.loadcard')
            </ul>
        </div>
        <div class="introduction-5__images w-50per">
            <div class="credit-card" id="card">
                <div class="card-img" id="card-img"
                    style="background-image: url(./assets/imgs/Template1@2x.png)">
                    <div class="details-card">
                        <div>
                            <span id="card-holder-name">Your Name Here</span>
                            <span id="card-position">your position</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
