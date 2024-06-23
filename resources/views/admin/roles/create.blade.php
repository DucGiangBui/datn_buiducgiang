@extends('admin.layouts.app')
@section('tittle', 'Thêm vai trò')
@section('content')
    <div class="card">
        <h1>
            Thêm mới vai trò
        </h1>
        <div>
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
                <div class="input-group input-group-static mb-4">
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
                </div>
                <div class="form-group">
                    <label for="">Quyền hạn</label>
                    <div class="row">
                        @foreach ($permissions as $groupName => $permission)
                            <div class="col-5">
                                <p class="text-capitalize text-bold m-0">{{ $groupName }}</p>
                                <div>
                                    @foreach ($permission as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" name="permission_ids" type="checkbox"
                                                value="{{ $item->id }}">
                                            <label class="custom-control-label"
                                                for="customCheck1">{{ $item->display_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-submit btn-success">Thêm vai trò</button>
            </form>
        </div>
    </div>
@endsection
