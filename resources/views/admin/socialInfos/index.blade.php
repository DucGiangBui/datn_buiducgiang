@extends('admin.layouts.app')
@section('title', 'Icon')
@section('content')
    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h4 class="text-white text-capitalize ps-3 ">DANH SÁCH ICON MẠNG XÃ HỘI</h4>
            </div>
        </div>
        @include('admin.layouts.noti')
        <div>
            <div>
                <a href="{{ route('socialInfos.create') }}" class="btn btn-primary mt-3">Thêm mới</a>
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
                            <td><img style="width: 30px;" src="{{ asset($socialInfo->social_icon) }}" alt="icon"
                                    width="50"></td>

                            <td>
                                <a href="{{ route('socialInfos.edit', $socialInfo->social_id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <button class="bd-none"
                                    onclick="confirmDelete('{{ route('socialInfos.destroy', $socialInfo->social_id) }}')"><i
                                        class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                    @endforeach
                </table>
                {{ $socialInfos->links() }}
            </div>
        </div>

        @include('admin.layouts.modal')
    @endsection
