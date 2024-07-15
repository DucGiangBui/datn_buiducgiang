@extends('guest.layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <section class="view-info w-1440px view-card-info">
        <div class="info-item-card">
            <h1 class="view-card-title">CARD VISIT</h1>
            @if (($template->front == 'null') || ($template->behind == 'null'))
                <p style="text-align: center">Không có thẻ</p>
            @else
            <div class="card-info-card">
                @if ($template->front || $template->behind)
                    <div class="card-info-item">
                        <h4 class="card-info-tittle">MẶT TRƯỚC</h4>
                        @if ($template->front)
                            <img src="{{ asset($template->front) }}" alt="Mặt trước" class="card-info-img">
                        @else
                            <p>Không có thông tin mặt trước.</p>
                        @endif
                    </div>
                    <div class="card-info-item">
                        <h4 class="card-info-tittle">MẶT SAU</h4>
                        @if ($template->behind)
                            <img src="{{ asset($template->behind) }}" alt="Mặt sau" class="card-info-img">
                        @else
                            <p>Không có thông tin mặt sau.</p>
                        @endif
                    </div>
                @else
                    <p>Không có thông tin về thẻ.</p>
                @endif
            </div>
            @endif
            <form action="{{ route('profile.updateUrl') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group input-card-info">
                    <input value="{{ old('link_url', $user->link_url) }}" type="text" name="link_url" id="input-name1"
                        class="input-group__input input-txt-5" required />
                    <label for="input-name1" class="input-group__label input-label-5">Nhập tên miền</label>
                </div>
                <div class="social-link btn-social-link">
                    <button class="buy-home" type="submit">Cập nhật</button>
                </div>
            </form>
        </div>
    </section>
@endsection
