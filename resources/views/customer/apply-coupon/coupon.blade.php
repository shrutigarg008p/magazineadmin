    @extends('layouts.customer')
@section('title', 'Single Purchase')

@section('content')

    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Apply Coupon</li>
            </ul>
        </div>
    </section>

     <div class="container">

        <section>
             <div class="plans_checkout">
                    <div class="heading_arrow_group heading_bg_light">
                        <h1 class="common_heading">Apply Coupons</h1>
                    </div>
                    <div class="credit_card_input">
                        <input type="text" placeholder="Coupon Code">
                        <button class="apply_coupen_btn">Apply</button>
                    </div>
            </div>
            <div class="plans_checkout">
                    <div class="heading_arrow_group heading_bg_light">
                        <h1 class="common_heading">Available Coupons</h1>
                    </div>
                    <div class="credit_card_input">
                        <input type="text" placeholder="New Year">
                        <button class="apply_coupen_btn">Apply </button>
                    </div>
            </div>
        </section>
        
    </div>

@endsection