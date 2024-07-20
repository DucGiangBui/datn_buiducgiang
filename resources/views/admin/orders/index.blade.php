@extends('admin.layouts.app')
@section('title', 'QL Đơn hàng')
@section('content')
    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h4 class="text-white text-capitalize ps-3">DANH SÁCH ĐƠN HÀNG</h4>
            </div>
        </div>
        <div>
            @if (Session::has('message'))
                <div class="alert alert-success text-black mt-3">
                    {{ Session::get('message') }}
                </div>
            @endif

            <div>
                <a href="{{ route('ordersMaster.create') }}" class="btn btn-primary mt-3">Thêm mới</a>
            </div>
            <div>
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ nhận hàng</th>
                        <th>Tình trạng đơn hàng</th>
                        <th>Xem và cập nhật</th>
                        <th>Xoá</th>
                    </tr>
                    @foreach ($orders as $order)
                        @php
                            $statusMap = [
                                1 => 'Chờ xác nhận',
                                2 => 'Đang xử lý',
                                3 => 'Đang vận chuyển',
                                4 => 'Hoàn thành',
                            ];
                        @endphp
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->orderInfo->name }}</td>
                            <td>{{ $order->orderInfo->phone }}</td>
                            <td>{{ $order->orderInfo->address }}</td>
                            <td class="status-{{ $order->status }}">{{ $statusMap[$order->status] ?? 'Không xác định' }}</td>
                            <td>
                                <a href="{{ route('ordersMaster.edit', $order->order_id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('ordersMaster.destroy', $order->order_id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="bd-none" onclick="confirmDelete()"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $orders->links() }}
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            if (confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?')) {
                document.getElementById('delete-role-form').submit();
            }
        }
    </script>
@endsection
