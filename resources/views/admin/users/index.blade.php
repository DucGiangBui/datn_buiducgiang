@extends('admin.layouts.app')
@section('title', 'Người dùng')
@section('content')
    <div class="card">
        <h1>Danh sách người dùng</h1>
        @if (Session::has('message'))
            <div class="alert alert-success text-black">
                {{ Session::get('message') }}
            </div>
        @endif

        <div>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Thêm mới</a>
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
                            <form action="{{ route('users.destroy', $user->user_id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="bd-none" onclick="confirmDelete()"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $users->links() }}
        </div>
    </div>

    <script>
        function confirmDelete() {
            if (confirm('Bạn có chắc chắn muốn xóa người dùng này không?')) {
                document.getElementById('delete-role-form').submit();
            }
        }
    </script>
@endsection
