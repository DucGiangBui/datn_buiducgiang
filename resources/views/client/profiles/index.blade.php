@extends('guest.layouts.app')

@section('content')
<section class="view-info w-1440px">
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
            {{ $user->userInfo->position ?? 'Position not provided.' }}
        </h4>
    </div>

    @if ($user->socialInfos->isNotEmpty())
            @foreach($user->socialInfos as $socialInfo)
                <div class="social-link">
                    <a href="{{ $socialInfo->pivot->social_url }}" class="icon-button btn-link " target="_blank">
                        <span class="icon"><img src="{{ asset($socialInfo->social_icon) }}" alt="{{ $socialInfo->platform }}"></span>
                        <span class="button-text">{{ $socialInfo->platform }}</span>
                    </a>
                    <a href="{{ route('profile.edit.social', $socialInfo->social_id) }}" class="edit-icon buy-home" title="Edit Social Link">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>
            @endforeach
            <div class="social-link">
                <form action="{{ route('profile.index') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                </form>
                <button style="" class="btn buy-home" type="submit">Thêm</button>
            </div>
    @else
        <p class="no-social-links">No social links available.</p>
    @endif

    <p class="onetap-credit">Created by Onetap <i class="fa-solid fa-heart"></i></p>
</section>
@endsection
