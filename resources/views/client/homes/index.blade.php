@extends('client.layouts.app')
@section('content')
    <section id="intro" class="introduction-1">
        <div class="web-main-content">
            <div class="introduce">
                <h1 class="name-title pd-b60">ONETAP</h1>
                <h2 class="title mg-t-b-30">
                    DANH THIẾP ĐIỆN TỬ THÔNG MINH ĐẦU TIÊN TẠI VIỆT NAM
                </h2>
                <p class="text-infos mg-t-b-30">
                    Danh thiếp điện tử thông minh ONETAP là thẻ danh thiếp tích hợp
                    chip NFC, có thể sử dụng thay cho danh thiếp giấy truyền thống cho
                    phép bạn chia sẻ liên hệ với đối tác nhanh chóng và chuyên nghiệp.
                </p>
                <a href="#"><button class="buy-home">MUA NGAY</button></a>
            </div>
            <div class="img-demo">
                <img class="img-demo-phone" src="{{ asset('client/assets/imgs/Iphone16.png') }}" alt="" />
            </div>
        </div>
    </section>
    <section class="introduction-3">
        <div class="intro-content">
            <div class="mockup-card">
                <img src="{{ asset('client/assets/imgs/Mockup_Card.png') }}" alt="" />
            </div>
            <div class="content-whycard">
                <h1 class="title-whycard">LỢI ÍCH CỦA ONETAP?</h1>
                <div class="paragraph">
                    <p class="p-whycard t-ju">
                        Card visit điện tử ONETAP được thiết kế độc đáo sang trọng
                    </p>
                    <p class="p-whycard t-ju">
                        Chia sẻ thông tin liên lạc chỉ với một chạm, không cần in ấn hay
                        mang theo card visit giấy
                    </p>
                    <p class="p-whycard t-ju">
                        Cập nhật thông tin liên lạc dễ dàng, mọi lúc mọi nơi.
                    </p>
                    <p class="p-whycard t-ju">
                        Góp phần bảo vệ môi trường bằng cách giảm thiểu việc sử dụng
                        card visit giấy.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="demo" class="introduction-5">
        <div class="introduction-5__content w-1440px">
            <div class="introduction-5__text">
                <h1 class="introduction-5__bigtitle fw-300">DEMO</h1>
                <h1 class="introduction-5__title">NHẬP THÔNG TIN CỦA BẠN</h1>
                <div class="input-group">
                    <input type="text" id="input-name" class="input-group__input input-txt-5" required />
                    <label for="fname" class="input-group__label input-label-5">Họ và tên</label>
                </div>
                <div class="input-group">
                    <input type="text" id="input-position" class="input-group__input input-txt-5" required />
                    <label for="position" class="input-group__label input-label-5">Chức vụ</label>
                </div>
            </div>
            <div class="introduction-select">
                <ul>
                    @include('client.layouts.loadcard')
                </ul>
            </div>
            <div class="introduction-5__images w-50per">
                <div class="credit-card" id="card">
                    <h4 style="text-align: center; font-size:25px; font-weight: 400">GIÁ SẢN PHẨM: 100.000đ</h4>
                    <div class="card-img" id="card-img"
                        style="background-image: url(./assets/imgs/template_cards/Template1@2x.png)">
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
    <section id="contacts" class="introduction-6">
        <div class="container-contact w-1440px">
            <div class="contact-main">
                <h1 class="contact-title">LIÊN HỆ CHÚNG TÔI</h1>
                <div class="contact-child">
                    <div class="contact-form">
                        <div class="contact-info">
                            <img src="{{ asset('client/assets/imgs/iPhone16.png') }}" alt="" />
                        </div>
                        <div class="send-form">
                            <form class="validate-form">
                                <h1 class="form-title">NHẬN HỖ TRỢ</h1>
                                <div class="input-group">
                                    <input type="text" id="form-name" class="input-group__input input-txt-form"
                                        required />
                                    <label for="position" class="input-group__label input-label-form">Họ và tên</label>
                                </div>
                                <div class="input-group">
                                    <input type="text" id="form-email" class="input-group__input input-txt-form"
                                        required />
                                    <label for="position" class="input-group__label input-label-form">Email</label>
                                </div>
                                <div class="input-group">
                                    <input type="text" id="form-subject" class="input-group__input input-txt-form"
                                        required />
                                    <label for="position" class="input-group__label input-label-form">Chủ đề</label>
                                </div>
                                <div class="input-group">
                                    <textarea type="text" id="input-text" class="input-group__input input-textarea" required></textarea>

                                    <label for="position" class="input-group__label input-label-form">Tin nhắn</label>
                                </div>
                                <div class="container-contact1-form-btn">
                                    <button class="buy-home contact1-form-btn">
                                        <span>
                                            Gửi đi
                                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <button onclick="scrollToTop()" id="back-to-top-btn" title="Go to top">
        Top
    </button>
@endsection
