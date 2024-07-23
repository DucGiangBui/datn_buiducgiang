@extends('admin.layouts.app')
@section('title', 'Thẻ')
@section('content')
    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h4 class="text-white text-capitalize ps-3">DANH SÁCH THẺ</h4>
            </div>
        </div>
        @include('admin.layouts.noti')
        <div>

            <div>
                <a href="{{ route('cards.create') }}" class="btn btn-primary mt-3">Thêm mới</a>
            </div>
            <div>
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Liên kết</th>
                        <th>Mặt trước</th>
                        <th>Mặt sau</th>
                        <th>Chỉnh sửa</th>
                        <th>Xoá</th>
                    </tr>
                    @foreach ($cards as $card)
                        <tr>
                            <td>{{ $card->card_id }}</td>
                            <td>{{ $card->card_url }}</td>
                            <td><img style="width: 100px;" src="{{ asset($card->templateCard->front) }}" alt="icon"
                                    width="50"></td>
                            <td><img style="width: 100px;" src="{{ asset($card->templateCard->behind) }}" alt="icon"
                                    width="50"></td>
                            <td>
                                <a href="{{ route('cards.edit', $card->card_id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <button class="bd-none"
                                    onclick="confirmDelete('{{ route('cards.destroy', $card->card_id) }}')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $cards->links() }}
            </div>
        </div>

        <!-- Modal Xác Nhận -->
        @include('admin.layouts.modal')
    @endsection
