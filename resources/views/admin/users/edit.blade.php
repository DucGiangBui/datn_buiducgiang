@extends('admin.layouts.app')
@section('title', 'Cập nhật người dùng ' .$user->name)
@section('content')
<div class="card">
    <h1>Cập nhật người dùng</h1>

    @if (Session::has('message'))
    <div class="alert alert-success text-black">
        {{ Session::get('message') }}
    </div>
@endif
    <div>
        <form action="{{ route('users.update', $user->user_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="input-group input-group-static mb-4">
                <label for="">Tên người dùng</label>
                <input name="name" value="{{ old('name') ?? $user->name }}" type="text" class="form-control">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group input-group-static mb-4">
                <label for="">Email</label>
                <input name="email" value="{{ old('email') ?? $user->email }}" type="text" class="form-control">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group input-group-static mb-4">
                <label name="gender" class="ms-0">Gioi tinh</label>
                <select name="gender" class="form-control" value="{{ $user->gender }}">
                    <option value="1" {{ $user->gender == '1' ? 'selected' : '' }}>Nam</option>
                    <option value="0" {{ $user->gender == '0' ? 'selected' : '' }}>Nữ</option>
                </select>
                @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-submit btn-success">Cập nhật</button>
        </form>
    </div>
</div>

@endsection
