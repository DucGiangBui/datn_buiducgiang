@extends('admin.layouts.app')
@section('title', 'Cập nhật Icon ')
@section('content')
    <div class="card">
        <h1>Cập nhật Icon $ MXH</h1>

        @if (Session::has('message'))
            <div class="alert alert-success text-black">
                {{ Session::get('message') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('templateCards.update', $templates->template_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="front" class="form-label">Mặt trước</label>
                <input type="file" name="front" id="front" class="form-control form-control-sm">
                <img src="{{ asset($templates->front) }}" alt="icon" width="50" class="mt-2">
            </div>
            <div class="form-group">
                <label for="behind" class="form-label">Mặt sau</label>
                <input type="file" name="behind" id="behind" class="form-control form-control-sm">
                <img src="{{ asset($templates->behind) }}" alt="icon" width="50" class="mt-2">
            </div>
            <div class="input-group input-group-static mb-4">
                <label for="platform">Mô tả</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ $templates->description }}">
            </div>
            <div class="input-group input-group-static mb-4">
                <label for="cost">Đơn giá</label>
                <input type="text" name="cost" id="cost" class="form-control" value="{{ $templates->cost }}">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>

    </div>

@endsection
