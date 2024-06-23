@extends('admin.layouts.app')
@section('title', 'Cập nhật vai trò' .$role->name)
@section('content')
    <div class="card">
        <h1>
            Cập nhật vai trò
        </h1>
        <div>
            <form action="{{ route('roles.update'),$roles->id }}" method="post">
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
                    <input name="display_name" value="{{ old('display_name')?? $role->display_name }}" type="text" class="form-control">
                    @error('display_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group input-group-static mb-4">
                    <label name="group" class="ms-0">Nhóm</label>
                    <select name="group" class="form-control" value={{ $role->group}}>
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
                                            <input class="form-check-input" name="permission_ids" type="checkbox"{{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }}
                                            {{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }}
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
                <button type="submit" class="btn btn-submit btn-success">Caapj</button>
            </form>
        </div>
    </div>
@endsection
