@extends('admin.layouts.app')
@section('title', 'Thêm vai trò')
@section('content')
    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h4 class="text-white text-capitalize ps-3">THÊM MỚI VAI TRÒ</h4>
            </div>
          </div>
        <div>
        <div class="mt-3">
            <form action="{{ route('roles.store') }}" method="post">
                @csrf
                <div class="input-group input-group-static mb-4">
                    <label for="">Tên</label>
                    <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group input-group-static mb-4">
                    <label for="">Tên hiển thị</label>
                    <input name="display_name" value="{{ old('display_name') }}" type="text" class="form-control">
                    @error('display_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div class="input-group input-group-static mb-4">
                    <label name="group" class="ms-0">Nhóm</label>
                    <select name="group" class="form-control" id="exampleFormControlSelect1">
                        <option value="system">System</option>
                        <option value="user">User</option>
                        <option value="card">Card</option>
                        <option value="order">Order</option>
                    </select>
                    @error('group')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}
                <button type="submit" class="btn btn-submit btn-success">Thêm vai trò</button>
            </form>
        </div>
    </div>
@endsection
