    @extends('layouts.customer')
@section('title', 'Renew Subscriptions')

@section('content')

@php
    $amount = $plan_duration->apply_discount();
@endphp

    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Renew Subscription</li>
            </ul>
        </div>
    </section>

    <div class="container">

        <div class="tabnews_tabs renew_subs_">
            <div class="main_page_heading">
                <img src="img/icon-prev.png" alt="">
                Renew Subscription
            </div>
            <div class="heading_arrow_group heading_bg_light">
                <h1 class="common_heading">Select Epaper Package</h1>
            </div>
            <label class="container_bundle" data-toggle="modal" data-target="#modal_paystack">
                <input class="bundle" type="radio" name="radio" disabled>
                <span class="checkmark_bundle"></span>
                <span class="radio_btn_text">{{ \ucwords($plan->type) }}</span>
            </label>
            <div class="bd_block page_payment_method">
                <label class="container_bundle" data-toggle="modal" data-target="#modal_paystack">
                    <input class="bundle" type="radio" name="radio" checked>
                    <span class="checkmark_bundle"></span>
                    <span class="radio_btn_text">
                        {{$plan->title}}
                        <span> {{$plan->publications->implode('name', ', ')}}</span>
                    </span>
                </label>

            </div>
            <button href="{{route('all_plans')}}" class="all_planspay_btn">Change Plan</button>
        </div>

        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
            @csrf
            <div>
                <div class="plans_checkout">
                    <div class="heading_arrow_group heading_bg_light">
                        <h1 class="common_heading">CheckOut</h1>
                    </div>
                    <div class="plans_custom_input">
                        {{-- <input type="text" class="custom_input" id="apply_coupon" placeholder="Apply Coupon">
                         --}}
                        <div class="plans_custom_input">
                            <div class="input-group mb-3">
                                {{-- <input type="text" class="form-control custom_input radioCheckCoupon" placeholder="Apply Coupon" aria-label="Coupon Listing" aria-describedby="button-addon1" disabled readonly>
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#staticBackdrop" >Check Coupons</button>
                                </div> --}}
                                @include('customer.partials.apply-coupon')
                            </div>
                        </div>
                    </div>
                    
                    <div class="plans_pay_due">
                        Payment Due
                        @if ( $plan_duration->has_discount )
                            <div class="magazine_d_price">
                                <span style="text-decoration:line-through">
                                    {{to_price($plan_duration->price, true)}}
                                </span>
                                <h5>{{to_price($amount, true)}}</h5>
                            </div>
                        @else
                            <div class="magazine_d_price">{{to_price($amount, true)}}</div>
                        @endif
                        <h4 class="magazine_d_price_span"></h4>
                        {{-- <div class="magazine_d_price text-danger">{{Auth::user()->my_currency}} <span class="magazine_d_price_span">{{$payment->amount}}</span></div>
                        <div class="magazine_d_price2" style="display: none">{{Auth::user()->my_currency}}  <span class="magazine_d_price_span2">{{$payment->amount}}</span></div> --}}
                    
                        {{-- <span>{{Auth::user()->my_currency}} {{$payment->amount}}</span> --}}
                    </div>
                    <div class="btn-group col-12" role="group" aria-label="Basic example">
                        <button type="submit" name="pm" value="paystack" class="all_planspay_btn btn btn-primary">Pay With Paystack</button>
                        <button type="submit" name="pm" value="expresspay" class="btn btn-success">Pay With Expresspay</button>
                     </div>
                    {{-- <button type="submit" class="all_planspay_btn">Pay Now</button> --}}
                </div>
            </div>

            <input type="hidden" name="renew" value="1">
            <input type="hidden" name="code" value=""> 
            <input type="hidden" name="email" value="{{Auth::user()->email}}">
            <input type="hidden" name="package_key[]" class="planid" value="{{$plan->id}}">
            <input type="hidden" name="amount" class="price" value="{{$payment->amount}}">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="currency" value="GHS">
            <input type="hidden" name="is_family" class="is_family" value="{{intval($userSubscription->is_family)}}">
            <input type="hidden" name="duration_key" class="subsc_day" value="{{$plan_duration->code}}">
        </form>
    </div>
    <script>

        const _price = parseFloat("{{$amount}}");

        window._apply_coupon = function(type, discount, coupon) {
            const _discount = parseFloat(discount);
                    
            if( type && _discount ) {
                let newpr = 1;

                if( type == 'percentage' ) {
                    newpr = _price - _price * (discount/100); 
                } else if( type == 'amount' ) {
                    newpr = _price - discount;
                }

                if( newpr < 0 ) newpr = 0;

                $(".magazine_d_price").css({'text-decoration':'line-through','font-size':'14px'});
                $(".magazine_d_price_span").html(to_price(newpr.toFixed(2)));
                $(".magazine_d_price_span").show();

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