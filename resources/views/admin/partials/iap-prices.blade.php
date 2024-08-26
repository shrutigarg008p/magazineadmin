@php
    $select_name = isset($select_name) ? $select_name : '';
    $select_price = isset($select_price) ? $select_price : 0.00;

    $type = isset($type) && in_array($type, ['non-renewing', 'consumable']) ? $type : 'non-renewing';
@endphp
<select name="{{ $select_name }}" id="{{ $select_name }}" class="form-control @error('{{$select_name}}') is-invalid @enderror _price_usd" style="font-size:0.65rem;">
    <option value="">USD $0</option>
    @foreach ($subscription_apple_price as $price)
        <option value="{{$price->price}}" {{ $select_price == $price->price ? 'selected':'' }}>USD ${{$price->price}}</option>
    @endforeach
</select>