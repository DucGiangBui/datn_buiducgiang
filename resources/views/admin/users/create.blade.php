@extends('admin.layouts.app')
@section('title', 'Thêm người dùng')
@section('content')
    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h4 class="text-white text-capitalize ps-3">THÊM MỚI NGƯỜI DÙNG</h4>
            </div>
          </div>
        <div>
        <div class="mt-3">
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="input-group input-group-static mb-4">
                    <label for="">Tên người dùng</label>
                    <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group input-group-static mb-4">
                    <label for="">Email</label>
                    <input name="email" value="{{ old('email') }}" type="text" class="form-control">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group input-group-static mb-4">
                    <label name="gender" class="ms-0">Giới tính</label>
                    <select name="gender" class="form-control" id="exampleFormControlSelect1">
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                    @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-submit btn-success">Thêm người dùng</button>
            </form>
        </div>
    </div>
@endsection
