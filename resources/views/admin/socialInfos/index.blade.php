@extends('admin.layouts.app')
@section('title', 'Icon')
@section('content')
    <div class="card">
        <h1>
            Danh sách Icon & mạng xã hội
        </h1>
        @if (Session::has('message'))
            <div class="alert alert-success text-black">
                {{ Session::get('message') }}
            </div>
        @endif

        <div>
            <a href="{{ route('socialInfos.create') }}" class="btn btn-primary">Thêm mới</a>
        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Nền tảng</th>
                    <th>Icon</th>
                    <th>Chỉnh sửa</th>
                    <th>Xoá</th>
                </tr>
                @foreach ($socialInfos as $socialInfo)
                    <tr>
                        <td>{{ $socialInfo->social_id }}</td>
                        <td>{{ $socialInfo->platform }}</td>
                        <td><img style="width: 30px;" src="{{ asset($socialInfo->social_icon) }}" alt="icon" width="50"></td>

                        <td>
                            <a href="{{ route('socialInfos.edit', $socialInfo->social_id) }}"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('socialInfos.destroy', $socialInfo->social_id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="bd-none" onclick="confirmDelete()"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                @endforeach
            </table>
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
