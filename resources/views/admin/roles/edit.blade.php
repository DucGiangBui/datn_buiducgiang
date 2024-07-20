@extends('admin.layouts.app')
@section('title', 'Cập nhật vai trò ' .$role->name)
@section('content')
<div class="card">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h4 class="text-white text-capitalize ps-3">CHỈNH SỬA VAI TRÒ</h4>
        </div>
      </div>
    <div>
    <div class="mt-3">
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
            <button type="submit" class="btn btn-submit btn-success">Cập nhật</button>
        </form>
    </div>
</div>
@endsection
