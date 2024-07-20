@extends('guest.layouts.app')

@section('content')
    <section class="view-info w-1440px main-user-infos">
        <div class="info-item">
            <form action="{{ route('profile.store.social') }}" method="POST">
                @csrf
                <h3 class="title-social">Thêm liên kết</h3>
                <div class="input-group">
                    <input type="text" id="social_url" name="social_url" class="input-group__input input-txt-5"
                        value="{{ old('social_url') }}" required />
                    <label for="social_url" class="input-group__label input-label-5">Nhập liên kết:</label>
                </div>
                <div class="form-group">
                    <label for="social_id">Nền tảng: </label>
                    <select class="input-group__input  input-label-5 btn-wh mgt-0" name="social_id">
                        @foreach ($allSocialInfos as $info)
                            <option value="{{ $info->social_id }}">
                                {{ $info->platform }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="social-link btn-social-link">
                    <button class="buy-home btn-ordes" type="submit">Tạo mới</button>
                </div>
            </form>
        </div>
    </section>
@endsection
