@extends('admin.layouts.app')

@section('title', 'Thông tin tài khoản')

@section('content')
<div class="card">
    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('{{ $user->userInfo->avatar_url ?? 'default_image_url' }}');">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ $user->userInfo->avatar_url ?? 'default_profile_image_url' }}" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">{{ $user->name }}</h5>
                        <p class="mb-0 font-weight-normal text-sm">{{ $user->userInfo->position }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Profile"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                    <strong class="text-dark">Họ tên:</strong> {{ $user->name }}
                                </li>
                                <li class="list-group-item border-0 ps-0 text-sm">
                                    <strong class="text-dark">Điện thoại:</strong> {{ $user->userInfo->phone ?? 'N/A' }}
                                </li>
                                <li class="list-group-item border-0 ps-0 text-sm">
                                    <strong class="text-dark">Email:</strong> {{ $user->email }}
                                </li>
                                <li class="list-group-item border-0 ps-0 text-sm">
                                    <strong class="text-dark">Địa chỉ:</strong> {{ $user->userInfo->address ?? 'N/A' }}
                                </li>
                                <li class="list-group-item border-0 ps-0 pb-0">
                                    <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                    @foreach($user->socialInfos as $socialInfo)
                                        <a class="btn btn-simple mb-0 ps-1 pe-2 py-0" href="{{ $socialInfo->social_url }}">
                                            <i class="fab fa-{{ strtolower($socialInfo->platform) }} fa-lg"></i>
                                        </a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
