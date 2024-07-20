@extends('admin.layouts.app')
@section('title', 'Chỉnh sửa đơn hàng')
@section('content')
    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h4 class="text-white text-capitalize ps-3">CHỈNH SỬA ĐƠN HÀNG</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('ordersMaster.update', $order->order_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                            <label for="name">Họ Tên</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $order->orderInfo->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                            <label for="name">Số điện thoại</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $order->orderInfo->phone }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                            <label for="address">Địa chỉ nhận hàng</label>
                            <input type="text" name="address" id="address" class="form-control"
                                value="{{ $order->orderInfo->address }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                            <label for="name">Chức vụ</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $order->orderInfo->position }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                            <label for="name">Thời gian đặt hàng</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $order->order_at }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                            <label for="status">Tình trạng đơn hàng</label>
                            <select name="status" id="status" class="form-control">
                                <option class="status-1" value="1" {{ $order->status == 1 ? 'selected' : '' }}>Chờ xác
                                    nhận</option>
                                <option class="status-2" value="2" {{ $order->status == 2 ? 'selected' : '' }}>Đang xử
                                    lý</option>
                                <option class="status-3" value="3" {{ $order->status == 3 ? 'selected' : '' }}>Đang vận
                                    chuyển</option>
                                <option class="status-4" value="4" {{ $order->status == 4 ? 'selected' : '' }}>Hoàn
                                    thành</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="template">Mẫu thẻ</label>
                    <select name="template_id" id="template" class="form-control">
                        @foreach ($templates as $template)
                            <option value="{{ $template->template_id }}" data-image="{{ asset($template->front) }}"
                                {{ $template->template_id == $order->template_id ? 'selected' : '' }}>
                                {{ $template->description }}
                            </option>
                        @endforeach
                    </select>
                    @if ($order->templateCard)
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Mặt trước</label>
                                <div class="input-group input-group-static mb-4">
                                    <img src="{{ asset($order->templateCard->front) }}" alt="Front Template"
                                        style="width: 70%; height: auto;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Mặt sau</label>
                                <div class="input-group input-group-static mb-4">
                                    <img src="{{ asset($order->templateCard->behind) }}" alt="Back Template"
                                        style="width: 70%; height: auto;">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('status');
            const applyColor = () => {
                statusSelect.className = 'form-control select-status'; // reset class
                const selectedOption = statusSelect.options[statusSelect.selectedIndex];
                statusSelect.classList.add('status-' + selectedOption.value);
            };

            applyColor(); // Apply color on page load
            statusSelect.addEventListener('change', applyColor); // Apply color on change
        });
    </script>
@endsection
