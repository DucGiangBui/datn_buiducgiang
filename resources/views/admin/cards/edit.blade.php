@extends('admin.layouts.app')

@section('title', 'Cập nhật card visit')

@section('content')
    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h4 class="text-white text-capitalize ps-3">CHỈNH SỬA CARD VISIT</h4>
            </div>
          </div>
        <div>
        <div class="mt-3">
            <form action="{{ route('cards.update', $cards->card_id) }}" method="post">
                @csrf
                @method('PUT') <!-- Thêm dòng này để sử dụng phương thức PUT -->
                <div class="input-group input-group-static mb-4">
                    <label for="card_url">Tên miền</label>
                    <input name="card_url" type="text" class="form-control" value="{{ old('card_url', $cards->card_url) }}">
                    @error('card_url')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="template">Mẫu thẻ</label>
                    <select name="template_id" id="template" class="form-control">
                        @foreach ($templateCards as $template)
                            <option value="{{ $template->template_id }}" data-image="{{ asset($template->front) }}"
                                {{ $template->template_id == $cards->template_id ? 'selected' : '' }}>
                                {{ $template->description }}
                            </option>
                        @endforeach
                    </select>
                    @if ($cards->templateCard)
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Mặt trước</label>
                                <div class="input-group input-group-static mb-4">
                                    <img src="{{ asset($cards->templateCard->front) }}" alt="Front Template"
                                        style="width: 70%; height: auto;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Mặt sau</label>
                                <div class="input-group input-group-static mb-4">
                                    <img src="{{ asset($cards->templateCard->behind) }}" alt="Back Template"
                                        style="width: 70%; height: auto;">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-submit btn-success">Cập nhật thẻ</button>
            </form>
        </div>
    </div>

    <!-- Include jQuery and Select2 library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#template_id').select2({
                templateResult: formatState,
                templateSelection: formatState
            });

            function formatState(state) {
                if (!state.id) {
                    return state.text;
                }
                var $state = $(
                    '<span><img src="' + $(state.element).data('image') + '" class="img-flag" style="width: 50px; height: auto;" /> ' + state.text + '</span>'
                );
                return $state;
            }
        });
    </script>
@endsection
