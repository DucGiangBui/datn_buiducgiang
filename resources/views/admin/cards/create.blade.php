@extends('admin.layouts.app')

@section('title', 'Thêm thẻ')

@section('content')
    <div class="card">
        <h1>Thêm mới thẻ</h1>
        <div>
            <form action="{{ route('cards.store') }}" method="post">
                @csrf
                <div class="input-group input-group-static mb-4">
                    <label for="">Liên kết</label>
                    <input name="card_url" type="text" class="form-control">
                    @error('card_url')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group input-group-static mb-4">
                    <label for="template_id">Mẫu thẻ</label>
                    <select name="template_id" class="form-control" id="template_id">
                        <option value="">Chọn mẫu thẻ</option>
                        @foreach($templateCards as $templateCard)
                            <option value="{{ $templateCard->template_id }}" data-image="{{ asset($templateCard->front) }}">
                                {{ $templateCard->description }}
                            </option>
                        @endforeach
                    </select>
                    @error('template_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-submit btn-success">Thêm thẻ</button>
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
