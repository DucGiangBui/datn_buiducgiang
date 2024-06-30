@extends('guest.layouts.app')

@section('content')
<section class="view-info w-1440px">
    <div class="info-item">
        <form action="{{ route('profile.update.social', $socialInfo->social_id) }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" id="social_url" name="social_url"  class="input-group__input input-txt-5" value="{{ old('social_url', $socialInfo->pivot->social_url) }}"  required />
                    <label for="social_url" class="input-group__label input-label-5">Link</label>
                </div>
                <div class="form-group">
                    <label for="social_icon">Icon</label>
                    <select class="input-group__input" name="social_icon">
                        @foreach($allSocialInfos as $info)
                            <option value="{{ $info->social_icon }}" {{ $info->social_icon == $socialInfo->social_icon ? 'selected' : '' }}>
                                {{ $info->platform }}
                            </option>
                        @endforeach
                    </select>
                <img src="{{ asset($socialInfo->social_icon) }}" alt="icon" width="50" class="mt-2">
                </div>
                <button class="buy-home btn-ordes" type="submit">Cập nhật</button>
            </form>
    </div>
</section>

@endsection
