@extends('admin.layouts.app')
@section('title', 'Cập nhật vai trò ' .$role->name)
@section('content')
<div class="card">
    <h1>Cập nhật vai trò</h1>
    <div>
        <form action="{{ route('roles.update', $role->role_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="input-group input-group-static mb-4">
                <label for="">Tên</label>
                <input name="name" value="{{ old('name') ?? $role->name }}" type="text" class="form-control">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group input-group-static mb-4">
                <label for="">Tên hiển thị</label>
                <input name="display_name" value="{{ old('display_name') ?? $role->display_name }}" type="text" class="form-control">
                @error('display_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- <div class="input-group input-group-static mb-4">
                <label name="group" class="ms-0">Nhóm</label>
                <select name="group" class="form-control" value="{{ $role->group }}">
                    <option value="system" {{ $role->group == 'system' ? 'selected' : '' }}>System</option>
                    <option value="user" {{ $role->group == 'user' ? 'selected' : '' }}>User</option>
                    <option value="card" {{ $role->group == 'card' ? 'selected' : '' }}>Card</option>
                    <option value="order" {{ $role->group == 'order' ? 'selected' : '' }}>Order</option>
                </select>
                @error('group')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div> --}}
            <button type="submit" class="btn btn-submit btn-success">Cập nhật</button>
        </form>
    </div>
</div>
@endsection
