@extends('admin.layouts.app')
@section('title', 'Thêm người dùng')
@section('content')
    <div class="card">
        <h1>
            Thêm mới người dùng
        </h1>
        <div>
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
