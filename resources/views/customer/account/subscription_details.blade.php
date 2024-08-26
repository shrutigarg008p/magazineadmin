@extends('layouts.customer')
@section('title', 'Subscription')

@section('content')
    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list"><a href="">My Subscription</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Subscription</li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb -->

    <!-- Subscription -->
    <section class="my_profile">
        <div class="container">
            <div class="my_pro_group">
                <div class="my_pro_heading">Subscription</div>
                <div class="my_pro_inner">
                    <div class="input_group">
                        <label for="" class="input_heading">Your Plan: </label>
                        <select name="" id="" class="custom_input">
                            <option value="">Your Plan:</option>
                            <option value="">1 Day</option>
                            <option value="">30 Day</option>
                            <option value="">1 Year</option>
                        </select>
                    </div>
                    <div class="input_group">
                        <label for="" class="input_heading">Select Epaper Package: </label>
                        <div class="radio_group">
                            <label class="radio_custom">Bundle
                                <input type="radio" name="radio">
                                <span class="radio_checkmark"></span>
                            </label>
                            <label class="radio_custom">Custom
                                <input type="radio" name="radio">
                                <span class="radio_checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="input_group">
                        <label for="" class="input_heading"> </label>
                        <p class="renew_sub_detail">Graphic NewsPlus now offers FREE family sharing. Graphic NewsPlus
                            subscription with up to 4 members of
                            your family!</p>
                    </div>
                    <div class="input_group">
                        <label for="" class="input_heading">Referal Code: </label>
                        <div class="referal_code_group">
                            <input type="text" class="custom_input" placeholder="Enter Code">
                            <button class="referal_apply_btn">Apply</button>
                        </div>
                    </div>
                    <div class="payment_due_group">
                        <p class="pay_due_text">Payment Due <span class="pay_due_price">USD 15.00</span></p>
                    </div>
                </div>
            </div>
            <div class="subs_pcbtn_group">
                <button class="subs_pay_now_btn">Pay Now</button>
                <button class="subs_cancel_btn">Cancel</button>
            </div>
        </div>
    </section>
    <!-- ./Subscription -->
    @include('customer.account.partials.footer')
@endsection
