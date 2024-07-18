@extends('client.layouts.app')
@section('content')
    <section id="orders" class="introduction-5">
        <div class="introduction-5__content w-1440px">
            <div class="introduction-5__text">
                <form action="{{ route('neworders.store') }}" method="POST">
                    @csrf
                    <h1 class="introduction-5__bigtitle fw-300">ĐẶT HÀNG</h1>
                    <div class="input-group">
                        <input type="text" name="name" id="input-name" class="input-group__input input-txt-5"
                            required />
                        <label for="input-name" class="input-group__label input-label-5">Họ và tên</label>
                    </div>
                    <div class="input-group">
                        <input type="text" name="position" id="input-position" class="input-group__input input-txt-5"
                            required />
                        <label for="input-position" class="input-group__label input-label-5">Chức vụ</label>
                    </div>
                    <h1 class="introduction-5__title">NHẬP THÔNG TIN CỦA BẠN</h1>
                    <div class="input-group">
                        <input type="text" name="address" id="input-address" class="input-group__input input-txt-5"
                            required />
                        <label for="input-address" class="input-group__label input-label-5">Địa chỉ nhận hàng</label>
                    </div>
                    <div class="input-group">
                        <input type="text" name="phone" id="input-phone" class="input-group__input input-txt-5"
                            required />
                        <label for="input-phone" class="input-group__label input-label-5">Số điện thoại</label>
                    </div>

                    <input type="hidden" name="template_ids" id="template-ids" />

                    @if (Session::has('message'))
                        <div class="alert alert-success text-black" style="text-align: center; margin-bottom:20px">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <input class="buy-home btn-orders" type="submit" value="Đặt hàng">
                </form>
            </div>
            <div class="introduction-select">
                <ul>
                    @include('client.layouts.loadcard')
                </ul>
            </div>
            <div class="introduction-5__images w-50per">
                <div class="sub-items">
                    <h4 style="text-align: center; font-size:25px; font-weight: 400">GIÁ SẢN PHẨM: 100.000đ</h4>
                </div>
                <div class="credit-card" id="card">
                    <div class="card-img" id="card-img" style="background-image: url(./assets/imgs/Template1@2x.png)">
                        <div class="details-card">
                            <div>
                                <span id="card-holder-name">Nhập tên của bạn</span>
                                <span id="card-position">Nhập chức vụ của bạn</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.querySelector('.btn-orders').addEventListener('click', function() {
            let selectedTemplates = [];
            document.querySelectorAll('.template-checkbox:checked').forEach(function(checkbox) {
                selectedTemplates.push(checkbox.getAttribute('data-id'));
            });
            document.getElementById('template-ids').value = selectedTemplates;
        });
    </script>
@endsection
