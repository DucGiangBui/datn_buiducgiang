@extends('admin.layouts.app')
@section('title', 'Thẻ')
@section('content')
    <div class="card">
        <h1>
            Danh sách thẻ
        </h1>
        @if (Session::has('message'))
            <div class="alert alert-success text-black">
                {{ Session::get('message') }}
            </div>
        @endif

        <div>
            <a href="{{ route('cards.create') }}" class="btn btn-primary">Thêm mới</a>
        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Liên kết</th>
                    <th>Mẫu thẻ</th>
                    <th>Chỉnh sửa</th>
                    <th>Xoá</th>
                </tr>
                @foreach ($cards as $card)
                    <tr>
                        <td>{{ $card->card_id }}</td>
                        <td>{{ $card->card_url }}</td>
                        <td><img style="width: 100px;" src="{{ asset($card->templateCard->template_url) }}" alt="icon" width="50"></td>
                        <td>
                            <a href="{{ route('cards.edit',$card->card_id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('cards.destroy',$card->card_id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="bd-none" onclick="confirmDelete()"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $cards->links() }}
        </div>
    </div>

    <script>
        function confirmDelete() {
            if (confirm('Bạn có chắc chắn muốn xóa vai trò này không?')) {
                document.getElementById('delete-role-form').submit();
            }
        }
    </script>
@endsection
