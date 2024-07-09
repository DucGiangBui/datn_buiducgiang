@foreach ($templateCards as $card)
    <li class="select-items" data-src="{{ asset($card->template_url) }}">
        <div class="sub-items">
            <div class="checkbox-wrapper">
                <input id="_checkbox-{{ $card->template_id }}" type="checkbox" />
                <label for="_checkbox-{{ $card->template_id }}">
                    <div class="tick_mark"></div>
                </label>
            </div>
            <img src="{{ asset($card->template_url) }}" alt="" class="img-item mg-10" />
        </div>
    </li>
@endforeach
