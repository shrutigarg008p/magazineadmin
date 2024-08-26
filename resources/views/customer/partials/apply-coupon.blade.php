<div class="input-group align-items-center mt-3">
    <input type="text" class="form-control custom_input coupon_code_input text-uppercase" placeholder="Enter coupon value" aria-label="Coupon Listing" aria-describedby="button-addon1" value="{{Request::query('coupon')}}">
    <button class="btn btn-outline-secondary rounded-0 checkCouponValueAjx" type="button">
        Apply
    </button>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var $ = $ || jQuery;

        var inProcess = false;

        // disable enter on input field
        $(".coupon_code_input").on('keyup', function (e) {
            if (e.key === 'Enter' || e.keyCode === 13) {
                e.preventDefault();
                $(".checkCouponValueAjx").trigger("click");
                return false;
            }
        });

        $(".checkCouponValueAjx").click(function(e) {
            e.preventDefault();

            if( typeof window._validate_coupon === 'function' ) {
                var validate_coupon = window._validate_coupon();

                if( validate_coupon !== true ) {

                    alert(validate_coupon);
                    return;
                }
            }

            if( inProcess ) return;

            var coupon = $(this).parent().find(".custom_input").val().trim();

            if( !coupon ) return;

            $.ajax({
                type: 'POST',
                url: "{{ url('api/check_coupon') }}",
                data: {
                    coupon: coupon,
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function() {
                    inProcess = true;  
                },
                success: function(response) {
                    if( response && response.STATUS ) {
                        if( ! response.DATA.valid ) {
                            if( swal ) {
                                swal({
                                    title: 'Invalid coupon code',
                                    icon: 'error'
                                });
                            } else {
                                alert('Invalid coupon code');
                            }
                        }

                        var data = response.DATA.coupon;

                        // whatever using this component must expose apply_coupon fn on window object
                        if( window._apply_coupon ) {
                            window._apply_coupon(data.type, data.discount, coupon);
                        }
                    }
                },
                complete: function() {
                    inProcess = false;
                }
            });
        });
    });
</script>