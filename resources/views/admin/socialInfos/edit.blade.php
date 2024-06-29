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

        <form action="{{ route('socialInfos.update', $socialInfo->social_id) }}" method="POST" enctype="multipart/form-data">
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
