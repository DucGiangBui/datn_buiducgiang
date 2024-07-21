@extends('admin.layouts.app')
@section('title', 'Vai trò')
@section('content')
    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h4 class="text-white text-capitalize ps-3">DANH SÁCH VAI TRÒ</h4>
            </div>
        </div>
        @include('admin.layouts.noti')
        <div>
            <div>
                <a href="{{ route('roles.create') }}" class="btn btn-primary mt-2">Thêm mới</a>
            </div>
            <div>
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Tên hiển thị</th>
                        <th>Chỉnh sửa</th>
                        <th>Xoá</th>
                    </tr>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->role_id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name }}</td>
                            <td>
                                <a href="{{ route('roles.edit', $role->role_id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <button class="bd-none"
                                    onclick="confirmDelete('{{ route('roles.destroy', $role->role_id) }}')"><i
                                        class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $roles->links() }}
            </div>
        </div>

        @include('admin.layouts.modal')
    @endsection
