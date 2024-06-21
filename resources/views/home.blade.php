@extends('layouts.app')

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
                <img class="img-demo-phone" src="{{ asset('imgs/Iphone16.png') }}" alt="" />
            </div>
        </div>
    </section>
    <section class="introduction-3">
        <div class="intro-content">
            <div class="mockup-card">
                <img src="{{ asset('imgs/Mockup_Card.png') }}" alt="" />
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
    <section class="introduction-4">
        <h1 class="introduction4-tittle font-title t-cent fw-300">
            ĐÁNH GIÁ CỦA KHÁCH HÀNG
        </h1>
        <div class="scroll-comment">
            <div class="cont-scroll">
                <div class="scroll_infi">
                    <div class="item-scroll">
                        <img class="item-img" src="{{ asset('imgs/male_boy_person_people_avatar_icon_159358.png') }}"
                            alt="" />
                        <h1 class="item-name">Phuong Diep</h1>
                        <div class="item-star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="item-content">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Nesciunt quas assumenda animi odio. Officiis illo corporis
                            porro dignissimos nihil, soluta nemo.
                        </p>
                    </div>
                    <div class="item-scroll">
                        <img class="item-img" src="{{ asset('imgs/male_boy_person_people_avatar_icon_159358.png') }}"
                            alt="" />
                        <h1 class="item-name">Xuan Linh</h1>
                        <div class="item-star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="item-content">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Rerum quod consequatur nemo facilis fugiat qui officiis dolor
                            illo molestias ullam.
                        </p>
                    </div>
                    <div class="item-scroll">
                        <img class="item-img" src="{{ asset('imgs/male_boy_person_people_avatar_icon_159358.png') }}"
                            alt="" />
                        <h1 class="item-name">Minh Duc</h1>
                        <div class="item-star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="item-content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Minima beatae, veniam fuga obcaecati architecto necessitatibus
                            cupiditate harum labore, ab animi velit.
                        </p>
                    </div>
                    <div class="item-scroll">
                        <img class="item-img" src="{{ asset('imgs/male_boy_person_people_avatar_icon_159358.png') }}"
                            alt="" />
                        <h1 class="item-name">Duc Giang</h1>
                        <div class="item-star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="item-content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Ducimus voluptate, fugit illo ut repudiandae assumenda itaque
                            quis! Reprehenderit dolorem natus
                        </p>
                    </div>
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
                    <input type="text" id="input-name1" class="input-group__input input-txt-5" required />
                    <label for="fname" class="input-group__label input-label-5">Họ và tên</label>
                </div>
                <div class="input-group">
                    <input type="text" id="input-position" class="input-group__input input-txt-5" required />
                    <label for="position" class="input-group__label input-label-5">Chức vụ</label>
                </div>
            </div>
            <div class="introduction-select">
                <ul>
                    <li class="select-items" data-src="{{ asset('imgs/Template1@2x.png') }}">
                        <div class="sub-items">
                            <div class="checkbox-wrapper">
                                <input id="_checkbox-1" type="checkbox" />
                                <label for="_checkbox-1">
                                    <div class="tick_mark"></div>
                                </label>
                            </div>
                            <img src="{{ asset('imgs/Template1@2x.png') }}" alt="" class="img-item mg-10" />
                        </div>
                    </li>
                    <li class="select-items" data-src="{{ asset('imgs/Template2@2x.png') }}">
                        <div class="sub-items">
                            <div class="checkbox-wrapper">
                                <input id="_checkbox-2" type="checkbox" />
                                <label for="_checkbox-2">
                                    <div class="tick_mark"></div>
                                </label>
                            </div>
                            <img src="{{ asset('imgs/Template2@2x.png') }}" alt="" class="img-item mg-10" />
                        </div>
                    </li>
                    <li class="select-items" data-src="{{ asset('imgs/Template3@2x.png') }}">
                        <div class="sub-items">
                            <div class="checkbox-wrapper">
                                <input id="_checkbox-3" type="checkbox" />
                                <label for="_checkbox-3">
                                    <div class="tick_mark"></div>
                                </label>
                            </div>
                            <img src="{{ asset('imgs/Template3@2x.png') }}" alt="" class="img-item mg-10" />
                        </div>
                    </li>
                    <li class="select-items" data-src="{{ asset('imgs/MatTruoc@4x.png') }}">
                        <div class="sub-items">
                            <div class="checkbox-wrapper">
                                <input id="_checkbox-4" type="checkbox" />
                                <label for="_checkbox-4">
                                    <div class="tick_mark"></div>
                                </label>
                            </div>
                            <img src="{{ asset('imgs/MatTruoc@4x.png') }}" alt="" class="img-item mg-10" />
                        </div>
                    </li>
                    <li class="select-items" data-src="{{ asset('imgs/MatSau@4x.png') }}">
                        <div class="sub-items">
                            <div class="checkbox-wrapper">
                                <input id="_checkbox-5" type="checkbox" />
                                <label for="_checkbox-5">
                                    <div class="tick_mark"></div>
                                </label>
                            </div>
                            <img src="{{ asset('imgs/MatSau@4x.png') }}" alt="" class="img-item mg-10" />
                        </div>
                    </li>
                </ul>
            </div>
            <div class="introduction-5__images w-50per">
                <div class="credit-card" id="card">
                    <div class="card-img" id="card-img" style="background-image: url(./assets/imgs/Template1@2x.png)">
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
    <section id="contacts" class="introduction-6">
        <div class="container-contact w-1440px">
            <div class="contact-main">
                <h1 class="contact-title">LIÊN HỆ CHÚNG TÔI</h1>
                <div class="contact-child">
                    <div class="contact-form">
                        <div class="contact-info">
                            <img src="{{ asset('imgs/iPhone16.png') }}" alt="" />
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
