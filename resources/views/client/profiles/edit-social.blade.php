@extends('guest.layouts.app')

@section('content')
    <section class="view-info w-1440px main-user-infos">
        <div class="info-item">
            <form action="{{ route('profile.update.social', $usocialInfo->user_social_id) }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" id="social_url" name="social_url" class="input-group__input input-txt-5 mgt-0"
                        style="width:100%;height: 44px" value="{{ old('social_url', $usocialInfo->social_url) }}" required />
                    <label for="social_url" class="input-group__label input-label-5">Liên kết</label>
                </div>
                <div class="form-group">
                    <label for="social_id">Nền tảng: </label>
                    <select class="input-group__input input-label-5 btn-wh mgt-0" name="social_id">
                        @foreach ($allSocialInfos as $asi)
                            <option value="{{ $asi->social_id }}"
                                {{ $asi->social_id == $socialInfo->social_id ? 'selected' : '' }}>
                                {{ $asi->platform }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="social-link btn-social-link">
                    <button class="buy-home btn-ordes" type="submit">Cập nhật</button>
                </div>
            </form>
        </div>
    </section>
@endsection
