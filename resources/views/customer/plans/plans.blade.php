@extends('layouts.customer')
@section('title', 'All Plans')
@section('content')
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{ url('') }}">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">All Plans</li>
            </ul>
        </div>
    </section>
    <div class="container">
        @if (count($errors))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pay') }}" method="post">
            @csrf

            <div class="tabnews_tabs">
                <div class="main_page_heading">
                    <img src="img/icon-prev.png" alt="">
                    All Plans
                </div>
                <div class="heading_arrow_group heading_bg_light">
                    <h1 class="common_heading">Select Epaper Package</h1>
                </div>
                <div class="tab nav flex-nowrap" role="tab">

                    {{-- package type buttons: custom, bundle, premium, etc. --}}
                    @foreach ($plans as $plan)
                        <button class="tabnews_links {{ $loop->first ? 'active' : '' }} main-tab-{{ $plan['key'] }}" data-toggle="tab"
                            href="#package_{{ $plan['key'] }}" role="tab"
                            aria-controls="tabs-package_{{ $plan['key'] }}"
                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                            {{ $plan['value'] }}
                        </button>
                    @endforeach

                </div>

                <div class="tabcontent tab-content">

                    @foreach ($plans as $plan)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                            id="package_{{ $plan['key'] }}" role="tabpanel"
                            aria-labelledby="tabs-package_{{ $plan['key'] }}-tab">
                            <p class="referal_text">{{ $plan['description'] }}</p>
                            <div class="bundle_block">
                                <div class="table-responsive">

                                    {{-- duration navbar (Weekly, monthly, etc) --}}
                                    <div class="tab nav flex-nowrap" role="tab">

                                        @foreach ($plan['packages'] as $period)
                                            <label for="{{ $plan['key'] }}_{{ $period['key'] }}"
                                                class="mb-0 d-flex align-items-center duration_key_btn tabbundle_links {{ $loop->first ? 'active' : '' }}"
                                                data-toggle="tab"
                                                href="#period_{{ $plan['key'] }}_{{ $period['key'] }}" role="tab"
                                                aria-controls="tabs-period_{{ $plan['key'] }}_{{ $period['key'] }}"
                                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">

                                                {{ $period['value'] }}

                                                <input id="{{ $plan['key'] }}_{{ $period['key'] }}" type="radio" name="duration_key" class="tab-duration-button invisible" value="{{ $period['key'] }}" {{($loop->parent->first && $loop->first) ? 'checked':''}} />
                                            </label>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="bundlecontent tab-content">
                                    {{-- duration packages --}}
                                    @foreach ($plan['packages'] as $period)

                                        <div class="bd_block_full tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="period_{{ $plan['key'] }}_{{ $period['key'] }}" role="tabpanel"
                                            aria-labelledby="tabs-period_{{ $plan['key'] }}_{{ $period['key'] }}-tab">

                                            @foreach ($period['list'] as $package)

                                                <div class="bd_block">
                                                    <label class="container_bundle">
                                                        <input class="bundle" type="{{ $plan['key'] == 'CU' ? 'checkbox':'radio' }}"
                                                            name="package_key[]" data-price="{{ $package['price'] }}"
                                                            value="{{ $package['key'] }}">
                                                        <span class="checkmark_bundle {{ $plan['key'] == 'CU' ? 'checkbox':'' }}"></span>
                                                    </label>
                                                    <div class="bd_heading">
                                                        <span>{{ $package['value'] }}</span>
                                                        <span>{{ $package['description'] }}</span>
                                                    </div>
                                                    <div class="bd_heading">
                                                        <span>{{ $package['currency'] }}</span>
                                                        <span>{{ $package['price'] }}</span>
                                                        <span>Save {{ $package['discount'] }}</span>
                                                    </div>
                                                </div>

                                            @endforeach

                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="block_total_memb">
                    <div class="heading_arrow_group heading_bg_light">
                        <h1 class="common_heading">Total Members</h1>
                    </div>
                    <div class="btm_radio row">
                        <div class="col-6 col-sm-4">
                            <label class="container_bundle">
                                <input class="bundle member_select" name="member_select" type="radio" value="only_me"
                                    selected>
                                <span class="checkmark_bundle"></span> <span class="radio_btn_text">Only Me</span>
                            </label>
                        </div>
                        <div class="col-6 col-sm-4">
                            <label class="container_bundle">
                                <input class="bundle member_select" name="member_select" type="radio" value="family">
                                <span class="checkmark_bundle"></span> <span class="radio_btn_text">With Family &amp;
                                    Friends (6
                                    Members)</span>
                            </label>
                        </div>
                        <div class="col-4">
                            <div class="btn-group btn-group-toggle bundle-friend" data-toggle="buttons"
                                style="display:none;">

                                @for ($i = 1; $i < 7; $i++)
                                    <label class="btn btn-info {{ $i == 1 ? 'active' : '' }}">
                                        <input type="radio" name="is_family" id="option{{ $i }}"
                                            value="{{ $i }}">
                                        {{ $i }}
                                    </label>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                <div class="plans_checkout">
                    <div class="heading_arrow_group heading_bg_light">
                        <h1 class="common_heading">CheckOut</h1>
                    </div>

                    <div class="plans_custom_input">
                        <div class="input-group mb-3 coupon-container el-disabled">
                            @include('customer.partials.apply-coupon')
                        </div>
                    </div>
                    <div class="plans_pay_due">
                        Payment Due
                        <span class="currency">{{ Auth::user()->my_currency }}
                            <span class="actual_price1_strike">0.00</span>
                        </span>
                    </div>

                    <div class="row" style="margin-bottom:40px;">
                        <div class="col-md-12">
                            <div class="btn-group col-12 m-btn" role="group" aria-label="Basic example">
                                <button type="submit" name="pm" value="paystack"
                                    class="all_planspay_btn btn btn-primary">Pay
                                    With Paystack</button>
                                <button type="submit" name="pm" value="expresspay" class="btn btn-success">Pay With
                                    Expresspay</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Coupon Codes</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @forelse ($coupons as $coupon)
                                <div class="form-group text-center">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-warning active">
                                            <input type="radio" name="code" data-discount_code="{{ $coupon->code }}" data-discount_type="{{ $coupon->type }}"
                                                data-discount="{{ $coupon->discount }}" value="{{ $coupon->code }}" class="coupon_select"
                                                >
                                            {{ $coupon->code }}
                                        </label>
                                    </div>
                                </div>

                            @empty
                                <div class="card text-center">
                                    <div class="card-header">Ooops...</div>
                                    <div class="card-body">
                                        <h5 class="card-title">No Coupons Are Available Now!</h5>
                                        <a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div> --}}

            <input type="hidden" name="code" value="" />

        </form>

    </div>

    <style>
        .checkmark_bundle.checkbox {
            border-radius:unset!important;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded",
            function() {
                var $ = $ || jQuery;

                var discount,
                    discount_type;

                var family_members;

                var original_amount = 0.00;

                var $bundle_friend = $(".bundle-friend");
                var $amount = $(".actual_price1_strike");
                var $member_select = $("input.member_select");
                var $is_family = $("input[name='is_family']");
                var $coupon_code = $("input[name='code']");
                var $package_key = $("input[name='package_key[]']");

                function _render_amount() {
                    if( original_amount <= 0 ) {
                        return;
                    }

                    var amount = _get_final_amount();
                    $amount.text((Number(amount)).toFixed(2));
                    // $amount.text(Number(amount.toFixed(2)));
                }

                function _get_final_amount() {
                    if( original_amount <= 0 ) {
                        return 0;
                    }

                    var amount = original_amount;

                    if( discount ) {
                        amount = _apply_discount(amount, discount_type, discount);
                    }

                    if( family_members > 0 ) {
                        amount = _apply_family(amount, family_members);
                    }

                    return amount;
                }

                function _apply_discount(amount, type, discount) {
                    if (type == '1' || type == 'percentage') {
                        amount -= amount * (discount / 100);
                    } else {
                        amount -= discount;
                    }

                    if( amount <= 0 ) {
                        return 0;
                    }

                    return amount;
                }

                // function _apply_family(amount, members) {
                //     amount += amount * (members - 1);
                //     return amount;
                // }
                
                function _apply_family(amount, members) {
                    let selected_package = $("input[name='package_key[]']:checked").val();
                    let duration_key = $("input[name='duration_key']").val();
                    let formData = new FormData();
                    formData.append('package_id',selected_package);
                    formData.append('members',members);
                    formData.append('duration_key',duration_key);
                    var resp = $.ajax({
                        url: "{{ route('customer.membersPrice') }}",
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        async: false,
                        success: function(response) {
                            return response;
                        }
                    });
                    return resp.responseText;
                }

                function _set_discount_data(type = null, _discount = null) {
                    discount_type = type; discount = _discount;
                }

                function _set_members(members = 0) {
                    family_members = members;
                }

                $member_select.change(
                    function() {
                        var is_family = $(this).val() == 'family';

                        if (!is_family) {
                            $is_family.prop("checked", false);
                            $bundle_friend.find(".btn").removeClass("active");

                            _set_members();
                            _render_amount();
                        }

                        $bundle_friend.toggle(is_family);
                    }
                );

                $is_family.change(
                    function() {
                        var member = parseInt($(this).val());
                        if( member > 0 ) {
                            _set_members(member);
                            _render_amount();
                        }
                    }
                );

                window._validate_coupon = function() {
                    if( ! $package_key.is(":checked") ) {
                        return 'Please select a package first';
                    }

                    return true;
                };

                window._apply_coupon = function(type, discount, coupon) {
                    var _discount = parseFloat(discount);
                    
                    if( type && _discount ) {
                        _set_discount_data(type,_discount);
                        _render_amount();

                        var newpr = _get_final_amount();

                        $("input[name='code']").val(coupon);

                        let title = 'Coupon applied';

                        if( newpr <= 0 ) {
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

                //apply discount
                $coupon_code.change(
                    function() {
                        var self = $(this);

                        var type = self.attr("data-discount_type");
                        var _discount = parseFloat(self.attr("data-discount"));
                        var code = self.attr("data-discount_code");
                        
                        if( type && _discount ) {
                            _set_discount_data(type,_discount);
                            _render_amount();

                            $("#staticBackdrop").modal("hide");
                            $(".radioCheckCoupon").val(code);
                        }
                    }
                );

                // select new plan
                $package_key.change(
                    function() {
                        var price = 0;

                        // var input_type = $(this).attr("type");

                        // $package_key.filter(function() {
                        //     return $(this).attr("type") != input_type;
                        // })
                        // .prop("checked", false);
                        
                        $package_key.filter(":checked")
                            .each(function() {
                                price += parseFloat($(this).attr("data-price"));
                            });

                        if( price > 0 ) {
                            original_amount = price;
                            _render_amount();
                        }

                        $(".coupon-container").toggleClass("el-disabled", price <= 0);
                    }
                );

                $(".tabnews_links").add(".duration_key_btn")
                    .on("click", function() {
                        $package_key.prop("checked", false);
                        $(this).find("input").prop("checked", true);
                        $(".actual_price1_strike").text('0.00');
                    });

                var tab = "{{Request::query('tab')}}";

                if( !tab || tab !== '' ) {
                    $(".main-tab-"+tab).click();
                }
            });
    </script>

@endsection
