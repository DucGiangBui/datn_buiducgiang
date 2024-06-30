@extends('admin.layouts.app')
@section('title', 'Thêm Icon')
@section('content')
    <div class="card">
        <h1>
            Thêm mới Icon & MXH
        </h1>
        <div>
            <form action="{{ route('socialInfos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group input-group-static mb-4">
                    <label for="platform">Nền tảng</label>
                    <input type="text" name="platform" id="platform" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="social_icon" class="form-label">Icon</label>
                    <input type="file" name="social_icon" id="social_icon" class="form-control form-control-sm">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Thêm mới</button>
            </form>
        </div>
    </div>
@endsection
