@foreach (Helper::plan_durations() as $plan_duration)
    @php
        $_fp_upto = 6;
        $price_ghs = null; $price_usd = null; $discount = null; $apple_product_id= null; $apple_family_product_id= null;
        $price_family_ghs = []; $price_family_usd = [];

        // upon editing the form
        if( isset($durations) ) {
            $_key = $plan_duration['key'];
            $_plan_duration = $durations->where('code',$plan_duration['key']);

            $price_ghs = $_plan_duration->where('currency','GHS')->first();
            $price_usd = $_plan_duration->where('currency','USD')->first();

            $price_family_ghs = (array) @json_decode($price_ghs->family_price, true);
            $price_family_ghs = \array_filter($price_family_ghs);

            $price_family_usd = (array) @json_decode($price_usd->family_price, true);
            $price_family_usd = \array_filter($price_family_usd);

            if( $price_ghs ) {
                $discount = $price_ghs->discount;
            }
            elseif( $price_usd ) {
                $discount = $price_usd->discount;
            }

            $apple_product_id = $price_ghs ? $price_ghs->apple_product_id : null;
            $apple_family_product_id = $price_ghs ? $price_ghs->apple_family_product_id : null;

            $price_ghs = $price_ghs ? $price_ghs->price : null;
            $price_usd = $price_usd ? $price_usd->price : null;

            $old_apple_product_id = old('apple_product_id');
            $old_apple_family_product_id = old('apple_family_product_id');

            if( empty($apple_product_id) && !empty($old_apple_product_id) ) {
                $apple_product_id = $old_apple_product_id[$_key] ?? null;
            }

            if( empty($apple_family_product_id) && !empty($old_apple_family_product_id) ) {
                $apple_family_product_id = $old_apple_family_product_id[$_key] ?? null;
            }
        }

        $last_key = \array_key_last($price_family_usd);
    @endphp

    <div class="row align-items-center">
        <div class="col-1">
            <span>{{ $plan_duration['name'] }} [key: {{$plan_duration['key']}}]:</span>
        </div>
        <div class="col-11">
            <div style="overflow-x:auto;" id="plan_duration{{ $plan_duration['key'] }}" class="plan_duration_item d-flex my-2">
                <div class="form-group">
                    <div>
                        <label for="">Price in GHS</label>
                        <input type="number" step="any" name="plan_duration_price_GHS[{{ $plan_duration['key'] }}]"
                            class="_price_ghs form-control plan-price" placeholder="Price GHS (in decimal: 12.00)" id="priceGHS" title="Price in GHS" value="{{$price_ghs}}">
                    </div>
                    <div class="pt-4">
                        <label for="" class="text-nowrap">Apple product id</label>
                        <input type="text" name="apple_product_id[{{ $plan_duration['key'] }}]"
                            class="form-control" placeholder="Unique apple product id" title="Unique apple product id" value="{{$apple_product_id}}">
                    </div>
                </div>
                <div class="form-group ml-2">
                    <div>
                        <label for="">Price in USD</label>
                        {{-- <input type="number" step="any" name="plan_duration_price_USD[{{ $plan_duration['key'] }}]"
                            class="_price_usd form-control plan-price" placeholder="Price USD (in decimal: 12.00)" id="priceUSD" title="Price in USD" value="{{$price_usd}}"> --}}
                        @include('admin.partials.iap-prices', ['select_name' => "plan_duration_price_USD[{$plan_duration['key']}]", 'select_price' => $price_usd ?? null,'subscription_apple_price'=>$subscription_apple_price])
                    </div>
                    <div class="pt-4">
                        <label for="" class="text-nowrap">Apple family product id</label>
                        <input type="text" name="apple_family_product_id[{{ $plan_duration['key'] }}]"
                            class="form-control" placeholder="Unique apple product id" title="Unique apple product id" value="{{$apple_family_product_id}}">
                        <div class="text-xs mt-1">Family price of "6 members" in USD</div>
                    </div>
                </div>
                <div class="form-group ml-2">
                    <label for="">Family Price in GHS</label>
                    @for ($i = 1; $i <= $_fp_upto; $i++)
                        <div class="row align-items-center">
                            <div class="col small">{{$i}} member(s)</div>
                            <div class="col">
                                <input type="number" data-member="{{$i}}" step="any" name="plan_duration_family_price_GHS[{{ $plan_duration['key'] }}][{{$i}}]" class="_price_family_ghs form-control" placeholder="Family Price {{$i}} person" value="{{$price_family_ghs[$i]??null}}">
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="form-group ml-2">
                    <label for="">Family Price in USD</label>
                    @for ($i = 1; $i <= $_fp_upto; $i++)
                        <div class="row align-items-center">
                            <div class="col small">{{$i}} member(s)</div>
                            <div class="col">
                                @if ( $i == 6 )
                                    @include('admin.partials.iap-prices', ['select_name' => "plan_duration_family_price_USD[{$plan_duration['key']}][{$i}]", 'select_price' => $price_family_usd[$i] ?? null])
                                @else
                                    <input type="number" data-member="{{$i}}" step="any" name="plan_duration_family_price_USD[{{ $plan_duration['key'] }}][{{$i}}]" class="_price_family_usd form-control" placeholder="Family Price {{$i}} person" value="{{$price_family_usd[$i]??null}}">
                                @endif
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="form-group ml-2">
                    <label for="">Discount</label>
                    <input type="number" step="any" name="plan_duration_discount[{{ $plan_duration['key'] }}]"
                        class="form-control" placeholder="Discount (in percentage: 10.5) %" value="{{$discount}}">
                </div>
            </div>  
        </div>
    </div>
    <hr />
@endforeach

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var $ = $ || jQuery;

        var forEdit = @json(isset($durations));

        ['ghs','usd'].forEach(function(curr) {
            var key1 = $("._price_"+curr);
            var key2 = $("._price_family_"+curr);

            $(key1).change(function() {
                var self = $(this);
                var price = parseFloat(self.val());
                if( price > 0 ) {
                    self.parents(".plan_duration_item")
                        .find(key2)
                        .each(function() {
                            var s = $(this);
                            var member = parseInt(s.attr("data-member"));
                            console.log(member,price,s.val);
                            var am = parseFloat(price * (member>0 ? member : 1)).toFixed(2);
                            s.val(am);
                        });
                }
            });
        });
    });
</script>
