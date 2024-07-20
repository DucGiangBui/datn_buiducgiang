@extends('admin.layouts.app')
@section('title', 'Thêm Icon')
@section('content')
    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h4 class="text-white text-capitalize ps-3 ">THÊM MỚI ICON MẠNG XÃ HỘI</h4>
            </div>
        </div>
        <div class="mt-3">
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
