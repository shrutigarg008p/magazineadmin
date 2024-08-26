    @extends('layouts.customer')
    @section('title', 'Single Purchase')

    @section('content')

        <!-- breadcrumb -->
        <section class="breadcrumb_group">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb_list"><a href="{{ url('customer') }}">Home</a></li>
                    <li class="breadcrumb_list">></li>
                    <li class="breadcrumb_list">Single Purchase</li>
                </ul>
            </div>
        </section>

        <div class="container">

            <div class="tabnews_tabs one_time_purchase">
                <div class="all_magazines">

                    <a href="{{ url("magazines/$datas->id/details") }}">
                        <img src="{{ asset('storage/' . $datas->cover_image) }}" class="img-fluid lazy ">
                    </a>

                    <div class="magazine_name">{{ $datas->title }}</div>
                    <div class="magazine_price">{{ $datas->publication->name }}</div>
                    <div class="magazine_with_price_btns">

                    </div>

                </div>

                <div class="plans_checkout">
                    <div class="heading_arrow_group heading_bg_light">
                        <h1 class="common_heading">CheckOut</h1>
                    </div>
                    <div class="plans_custom_input">
                        <div class="input-group mb-3">
                            @include('customer.partials.apply-coupon')
                        </div>
                    </div>
                    <div class="plans_pay_due">
                        Payment Due
                        <div class="magazine_d_price">{{ to_price($datas->price, true) }}</div>
                        <div class="magazine_d_price_span h5"></div>
                    </div>
                    <form method="POST" action="{{ route('buy_magazine') }}" accept-charset="UTF-8"
                        class="form-horizontal" role="form">
                        <div class="row" style="margin-bottom:40px;">
                            <div class="col-md-12">
                                <p>
                                </p>
                                <input type="hidden" name="email" value="otemuyiwa@gmail.com"> {{-- required --}}
                                {{-- <input type="hidden" name="planID" class="planid" value=""> --}}
                                <input type="hidden" name="key" class="" value="{{ $datas->id }}">
                                <input type="hidden" name="code" value="">
                                <input type="hidden" name="amount" class="price" value="{{ $datas->price }}">
                                {{-- required in kobo --}}
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="currency" value="NGN">
                                <input type="hidden" name="is_family" class="is_family" value="0">
                                @if ($getTable == 'magazines')
                                    <input type="hidden" name="type" class="subsc_day" value="magazine">
                                @else
                                @endif
                                <input type="hidden" name="metadata"
                                    value="{{ json_encode($array = ['key_name' => 'value']) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="btn-group col-12" role="group" aria-label="Basic example">
                                    <button type="submit" name="pm" value="paystack"
                                        class="all_planspay_btn btn btn-primary">Pay With Paystack</button>
                                    <button type="submit" name="pm" value="expresspay" class="btn btn-success">Pay With
                                        Expresspay</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <script>
            const _price = parseFloat("{{ $datas->price }}");

            window._apply_coupon = function(type, discount, coupon) {
                const _discount = parseFloat(discount);

                if (type && _discount) {
                    let newpr = 1;

                    if (type == 'percentage') {
                        newpr = _price - _price * (discount / 100);
                    } else if (type == 'amount') {
                        newpr = _price - discount;
                    }

                    if (newpr < 1) newpr = 0;

                    $(".magazine_d_price_span").html(to_price(newpr));
                    $(".magazine_d_price").css({
                        'text-decoration': 'line-through',
                        'font-size': '14px'
                    });

                    $("input[name='code']").val(coupon);

                    let title = 'Coupon applied';

                    if( newpr == 0 ) {
                        title = "100% Coupon applied. Click ok to continue.";
                    }

                    if( swal ) {
                        swal({
                            title: title,
                            icon: 'success'
                        })
                        .then(function() {
                            if( newpr == 0 ) {
                                $("button[name='pm']").first().off().click();
                            }
                        });
                    } else {
                        alert('Coupon applied');
                    }
                }
            };
        </script>
    @endsection
