@extends('admin.layouts.app')
@section('title', 'Cập nhật người dùng ' . $user->name)
@section('content')
<div class="card">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h4 class="text-white text-capitalize ps-3">CẬP NHẬT NGƯỜI DÙNG</h4>
        </div>
      </div>
    <div>
    <div class="mt-3">
        <form action="{{ route('users.update', $user->user_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group input-group-static mb-4">
                <label for="">Tên người dùng</label>
                <input name="name" value="{{ old('name', $user->name) }}" type="text" class="form-control">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group input-group-static mb-4">
                <label for="">Email</label>
                <input name="email" value="{{ old('email', $user->email) }}" type="text" class="form-control">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group input-group-static mb-4">
                <label for="gender" class="ms-0">Giới tính</label>
                <select name="gender" class="form-control">
                    <option value="1" {{ old('gender', $user->gender) == '1' ? 'selected' : '' }}>Nam</option>
                    <option value="0" {{ old('gender', $user->gender) == '0' ? 'selected' : '' }}>Nữ</option>
                </select>
                @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group input-group-static mb-4">
                <label for="role_id" class="ms-0">Vai trò</label>
                <select name="role_id" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->role_id }}" {{ old('role_id', $user->role_id) == $role->role_id ? 'selected' : '' }}>
                            {{ $role->display_name }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-submit btn-success">Cập nhật</button>
        </form>
    </div>
</div>
@endsection
