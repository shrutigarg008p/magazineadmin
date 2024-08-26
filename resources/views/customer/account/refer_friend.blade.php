@extends('layouts.customer')
@section('title', 'Refer a friend')

@section('content')
    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Refer A Friend</li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb -->

    <!-- refer friend -->
    <section class="my_profile">
        <div class="container">
            <div class="my_pro_group">
                <div class="my_pro_heading">Refer A Friend</div>
                <div class="my_pro_inner">
                    <div class="input_group">
                        <label for="" class="input_heading">Frind Name: </label>
                        <input type="text" class="custom_input" placeholder="John David">
                    </div>
                    <div class="input_group">
                        <label for="" class="input_heading">Email: </label>
                        <input type="text" class="custom_input" placeholder="johndavid@demo.com">
                    </div>
                    <div class="input_group">
                        <label for="" class="input_heading">Phone: </label>
                        <input type="number" step="any" class="custom_input" placeholder="9876543210">
                    </div>
                </div>
            </div>
            <div class="subs_pcbtn_group">
                <button class="subs_pay_now_btn refer_frnd_btn">Submit</button>
            </div>
            <div class="rf_sm_invite">
                <p class="rf_sm_inviteheading">Social Media Invite</p>
                <ul class="login_social_icon rf_sm_invite_icons">
                    <li><a href=""><img src="{{ asset('assets/frontend/img/icon-l-facebook.png') }}" alt=""> Facebook</a>
                    </li>
                    <li><a href=""><img src="{{ asset('assets/frontend/img/icon-l-instagram.png') }}" alt="">
                            Instagram</a></li>
                    <li><a href=""><img src="{{ asset('assets/frontend/img/icon-l-twitter.png') }}" alt=""> Twitter</a>
                    </li>
                    <li><a href=""><img src="{{ asset('assets/frontend/img/icon-l-whatsapp.png') }}" alt=""> Whatsapp</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    @include('customer.account.partials.footer')
@endsection
