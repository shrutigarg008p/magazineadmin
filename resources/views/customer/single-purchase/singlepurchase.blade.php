    @extends('layouts.customer')
@section('title', 'Single Purchase')

@section('content')

    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Single Purchase</li>
            </ul>
        </div>
    </section>

     <div class="container">

       {{--  <section>
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
        </section> --}}
        
            <div class="tabnews_tabs one_time_purchase">
               <div class="all_magazines">
                            
                            
                                 <a href="http://127.0.0.1:8000/magazines/162/details">
                                <img src="http://127.0.0.1:8000/storage/magazines/P9HJMpuHoW39eO3dEFZ0RLLno8fAa4S3A4DilGaj.png" class="img-fluid lazy ">
                                </a>
                                
                            
                            <div class="magazine_name">jhvjhhjg</div>
                            <div class="magazine_price">12.00</div>
                            <div class="magazine_with_price_btns">
                              
                            </div>
                           
                        </div>
             
                <div class="plans_checkout">
                    <div class="heading_arrow_group heading_bg_light">
                        <h1 class="common_heading">CheckOut</h1>
                    </div>
                    <div class="plans_custom_input">
                        <input type="text" name="" class="custom_input" placeholder="Apply Coupon">
                    </div>
                    <div class="plans_pay_due">
                        Payment Due
                        <span>GHS 20.00</span>
                    </div>
                    <button class="all_planspay_btn">Pay Now</button>
            </div>
    </div>
</div>
@endsection