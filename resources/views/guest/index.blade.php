@extends('guest.layouts.app')

@section('content')
    <section class="view-info w-1440px">
        <div class="info-item">
            <div class="avt-user">
                <div class="avt-back">
                    @if ($user && $user->userInfo && $user->userInfo->avatar_url)
                        <img src="{{ asset($user->userInfo->avatar_url) }}" alt="User Avatar">
                    @else
                        <p>Chưa có thông tin</p>
                    @endif
                </div>
            </div>
            <h1 class="name-user">
                {{ $user->name }}
            </h1>
            <h4 class="position-user fw-300">
                {{ $user->userInfo->position }}
            </h4>
        </div>
        @if ($user && $user->socialInfos->isNotEmpty())
            @foreach ($user->socialInfos as $socialInfo)
                <div class="social-link">
                    <a href="{{ $socialInfo->social_url }}" class="icon-button btn-link" target="_blank">
                        <span class="icon">
                            <img src="{{ asset($socialInfo->social_icon) }}" alt="{{ $socialInfo->platform }} Icon">
                        </span>
                        <span class="button-text">{{ $socialInfo->platform }}</span>
                    </a>
                </div>
            @endforeach
        @else
            <div class="social-link">
                <p style="text-align: center">Chưa có thông tin !</p>
            </div>
        @endif
        <p class="onetap-credit">Created by Onetap <i class="fa-solid fa-heart"></i></p>
    </section>
@endsection
