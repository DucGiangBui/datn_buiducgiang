@extends('admin.layouts.app')
@section('title', 'Cập nhật Icon ')
@section('content')
    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h4 class="text-white text-capitalize ps-3 ">CHỈNH SỬA ICON MẠNG XÃ HỘI</h4>
            </div>
        </div>
        <div class="mt-3">
            <form action="{{ route('socialInfos.update', $socialInfo->social_id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group input-group-static mb-4">
                    <label for="social_id">Social ID</label>
                    <input type="text" name="social_id" id="social_id" class="form-control"
                        value="{{ $socialInfo->social_id }}">
                </div>
                <div class="input-group input-group-static mb-4">
                    <label for="platform">Platform</label>
                    <input type="text" name="platform" id="platform" class="form-control"
                        value="{{ $socialInfo->platform }}">
                </div>
                <div class="form-group input-group-static mb-4">
                    <label for="social_icon">Icon</label>
                    <input type="file" name="social_icon" id="social_icon" class="form-control form-control-sm">
                    <img src="{{ asset($socialInfo->social_icon) }}" alt="icon" width="50" class="mt-2">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>

    @endsection
