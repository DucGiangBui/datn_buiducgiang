@extends('admin.layouts.app')
@section('title', 'Thêm Icon')
@section('content')
    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h4 class="text-white text-capitalize ps-3">THÊM THẺ MẪU</h4>
            </div>
        </div>
        <div class="mt-3">
            <div>
                <form action="{{ route('templateCards.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="front" class="form-label">Mặt trước</label>
                        <input type="file" name="front" id="front" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label for="behind" class="form-label">Mặt sau</label>
                        <input type="file" name="behind" id="behind" class="form-control form-control-sm">
                    </div>
                    <div class="input-group input-group-static mb-4 mt-3">
                        <label for="description">Mô tả</label>
                        <input type="text" name="description" id="description" class="form-control" value="">
                    </div>
                    <div class="input-group input-group-static mb-4">
                        <label for="cost">Đơn giá</label>
                        <input type="text" name="cost" id="cost" class="form-control" value="">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Thêm mới</button>
                </form>
            </div>
        </div>
    @endsection
