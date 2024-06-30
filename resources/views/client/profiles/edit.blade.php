@extends('guest.layouts.app')

@section('content')
<section class="view-info w-1440px">
    <div class="info-item">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar">
                @if ($user->userInfo && $user->userInfo->avatar_url)
                    <img class=" width='100px' " src="{{ asset($user->userInfo->avatar_url) }}" alt="User Avatar" class="avatar-preview">
                @endif
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" name="position" value="{{ old('position', $user->userInfo->position ?? '') }}">
            </div>

            <button type="submit">Update Profile</button>
        </form>
    </div>
</section>
@endsection
