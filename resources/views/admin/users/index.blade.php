@extends('admin.layouts.app')
@section('title', 'Người dùng')
@section('content')
    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h4 class="text-white text-capitalize ps-3">DANH SÁCH NGƯỜI DÙNG</h4>
            </div>
        </div>
        @include('admin.layouts.noti')
        <div>
            <a href="{{ route('users.create') }}" class="btn btn-primary mt-3">Thêm mới</a>
        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Giới tính</th>
                    <th>Vai trò</th>
                    <th>Cập nhật</th>
                    <th>Xoá</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->gender == 1)
                                Nam
                            @elseif($user->gender == 0)
                                Nữ
                            @else
                                Không xác định
                            @endif
                        </td>
                        <td>{{ $user->role ? $user->role->display_name : 'Không xác định' }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->user_id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <button class="bd-none"
                                onclick="confirmDelete('{{ route('users.destroy', $user->user_id) }}')"><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $users->links() }}
        </div>
    </div>

    @include('admin.layouts.modal')
@endsection
