@extends('guest.layouts.app')

@section('content')
    <section class="view-info w-1440px">
        <div class="info-item">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="avt-user">
                    <div class="avt-back">
                        <img src="{{ asset($user->userInfo->avatar_url) }}" alt="User Avatar">
                    </div>
                </div>
                <div class="social-link btn-social-link w-100per">
                    <div class="input-group">
                        <p style="font-size:15px; font-weith:300; padding-left:10px;" for="avatar">   Ảnh đại diện</p>
                        <div class="width:100%">
                            <input style="width: 100%" class="" type="file" name="avatar">
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <input class="input-group__input input-txt-5" type="text" name="name"
                        value="{{ old('name', $user->name) }}" required>
                    <label class="input-group__label input-label-5" for="name">Họ và tên</label>
                </div>

                <div class="input-group">
                    <input class="input-group__input input-txt-5" type="text" name="position"
                        value="{{ old('position', $user->userInfo->position ?? '') }}">
                    <label class="input-group__label input-label-5" for="position">Mô tả ngắn</label>
                </div>

                <div class="social-link btn-social-link">
                    <button class="buy-home" type="submit">Cập nhật</button>
                </div>
            </form>
        </div>
    </section>
@endsection
