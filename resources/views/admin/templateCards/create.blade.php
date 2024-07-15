@extends('admin.layouts.app')
@section('title', 'Thêm Icon')
@section('content')
    <div class="card">
        <h1>
            Thêm mới Icon & MXH
        </h1>
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
                <div class="input-group input-group-static mb-4">
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
