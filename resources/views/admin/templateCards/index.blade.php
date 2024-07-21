@extends('admin.layouts.app')
@section('title', 'Icon')
@section('content')
    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h4 class="text-white text-capitalize ps-3">DANH SÁCH THẺ MẪU</h4>
            </div>
        </div>
        @include('admin.layouts.noti')
        <div>
            <a href="{{ route('templateCards.create') }}" class="btn btn-primary mt-3">Thêm mới</a>
        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Mặt trước</th>
                    <th>Mặt sau</th>
                    <th>Mô tả</th>
                    <th>Đơn giá</th>
                    <th>Chỉnh sửa</th>
                    <th>Xoá</th>
                </tr>
                @foreach ($templates as $template)
                    <tr>
                        <td>{{ $template->template_id }}</td>
                        <td><img style="width: 100px;" src="{{ asset($template->front) }}" alt="icon" width="50">
                        </td>
                        <td><img style="width: 100px;" src="{{ asset($template->behind) }}" alt="icon" width="50">
                        </td>
                        <td>{{ $template->description }}</td>
                        <td>{{ number_format($template->cost, 0, ',', '.') }} VNĐ</td>
                        <td>
                            <a href="{{ route('templateCards.edit', $template->template_id) }}"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <button class="bd-none"
                                onclick="confirmDelete('{{ route('templateCards.destroy', $template->template_id) }}')"><i
                                    class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                @endforeach
            </table>
            {{ $templates->links() }}
        </div>

        @include('admin.layouts.modal')
    @endsection
