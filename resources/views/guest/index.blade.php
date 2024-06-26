@extends('guest.layouts.app')
@section('content')
<section class="view-info w-1440px">
    <div class="info-item">
        <div class="avt-user">
            <div class="avt-back">
                @if ($user->userInfo)
                    <img src="{{ asset($user->userInfo->avatar_url) }}" alt="">
                @else
                    <p>User information not found.</p>
                @endif
            </div>

        </div>
        <h1 class="name-user">{{ $user->name }}</h1>
        <h4 class="position-user fw-300">{{ $user->userInfo->position }}</h4>
    </div>
    @foreach($user->socialInfos as $socialInfo)
        <div class="social-link">
            <a href="{{$socialInfo->pivot->social_url}}" class="icon-button btn-link">
                <span class="icon"><img src="{{ asset($socialInfo->social_icon) }}" alt=""></span>
                <span class="button-text">{{ $socialInfo->platform }}</span>
            </a>
        </div>
    @endforeach
    <p class="onetap-credit">Created by Onetap <i class="fa-solid fa-heart"></i></p>
</section>

@endsection
