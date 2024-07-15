@extends('guest.layouts.app')

@section('content')
    <section class="view-info w-1440px main-user-infos">
        <div class="info-item">
            <div class="avt-user">
                <div class="avt-back">
                    @if ($user->userInfo && $user->userInfo->avatar_url)
                        <img src="{{ asset($user->userInfo->avatar_url) }}" alt="User Avatar">
                    @else
                        <p>No avatar available.</p>
                    @endif
                    <a href="{{ route('profile.edit') }}" class="edit-icon buy-home" title="Edit Profile">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>
            </div>
            <h1 class="name-user">
                {{ $user->name }}
            </h1>
            <h4 class="position-user fw-300">
                {{ $user->userInfo->position}}
            </h4>
        </div>

        @if ($user->userSocialInfos->isNotEmpty())
            @foreach ($user->userSocialInfos as $userSocialInfo)
                @php
                    $socialInfo = $user->socialInfos->where('social_id', $userSocialInfo->social_id)->first();
                @endphp
                @if ($socialInfo)
                    <div class="social-link">
                        <a href="{{ $userSocialInfo->social_url }}" class="icon-button btn-link" target="_blank">
                            <span class="icon">
                                <img src="{{ asset($socialInfo->social_icon) }}" alt="{{ $socialInfo->platform }}">
                            </span>
                            <span class="button-text">{{ $socialInfo->platform }}</span>
                        </a>
                        <a href="{{ route('profile.edit.social', ['id' => $userSocialInfo->user_social_id]) }}?extra={{ $socialInfo->social_id }}"
                            class="edit-icon buy-home">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('profile.destroy') }}" method="POST" style="display: inline;"
                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa thông tin này không?');">
                            @csrf
                            <input type="hidden" name="user_social_id" value="{{ $userSocialInfo->user_social_id }}">
                            <button type="submit" class="edit-icon buy-home btn-del-social" style="text-decoration: none">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>

                    </div>
                @endif
            @endforeach
        @endif

        <div class="social-link btn-social-link">
            <a href="{{ route('profile.create') }}" class="btn buy-home" style="text-decoration: none">Thêm liên kết</a>
        </div>
        <div class="social-link btn-social-link">
            <a href="{{ route('myInfos', ['linkUrl' => $user->link_url]) }}" class="btn buy-home"
                style="text-decoration: none"><i class="fa-solid fa-eye"></i> Xem trước</a>
        </div>
    </section>
@endsection
