@extends('admin.layouts.app')
@section('title', 'Icon')
@section('content')
    <div class="card">
        <h1>
            Danh sách thẻ mẫu
        </h1>
        @if (Session::has('message'))
            <div class="alert alert-success text-black">
                {{ Session::get('message') }}
            </div>
        @endif

        <div>
            <a href="{{ route('templateCards.create') }}" class="btn btn-primary">Thêm mới</a>
        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Mẫu thẻ</th>
                    <th>Mô tả</th>
                    <th>Đơn giá</th>
                    <th>Chỉnh sửa</th>
                    <th>Xoá</th>
                </tr>
                @foreach ($templates as $template)
                    <tr>
                        <td>{{ $template->template_id }}</td>
                        <td><img style="width: 100px;" src="{{ asset($template->template_url) }}" alt="icon" width="50"></td>
                        <td>{{ $template->description }}</td>
                        <td>{{ $template->cost }}</td>
                        <td>
                            <a href="{{ route('templateCards.edit', $template->template_id) }}"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('templateCards.destroy', $template->template_id) }}" method="POST">
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
            if (confirm('Bạn có chắc chắn muốn xóa thẻ này không?')) {
                document.getElementById('delete-role-form').submit();
            }
        }
    </script>
@endsection
