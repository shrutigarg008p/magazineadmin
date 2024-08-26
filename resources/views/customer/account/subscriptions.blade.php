@extends('layouts.customer')
@section('title', 'My Subscriptions')

@section('content')
    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">My Subscriptions</li>
            </ul>
        </div>
    </section>
    <!-- my Subscription -->
    <section class="my_profile">
        <div class="container">
            <div class="my_pro_group">
                <div class="my_pro_heading">My Subscription</div>
                <div class="my_subs_inner">
                    <div class="ms_img_text_group">
                        <img src="{{ asset('assets/frontend/img/sub1.jpg') }}">
                        <div class="ms_text_g">
                            <h3 class="ms_heading">Daily Graphic</h3>
                            <p class="ms_sub_date">Subscription Date: 27-09-2017</p>
                            <p class="exp_date">Expiry Date: 14-10-2021</p>
                        </div>
                    </div>
                    <a href="{{ route('cp.subscriptions.show') }}" class="renew_subs_btn">Renew subscription</a>
                </div>
                <div class="my_subs_inner">
                    <div class="ms_img_text_group">
                        <img src="{{ asset('assets/frontend/img/sub1.jpg') }}">
                        <div class="ms_text_g">
                            <h3 class="ms_heading">Daily Graphic</h3>
                            <p class="ms_sub_date">Subscription Date: 27-09-2017</p>
                            <p class="exp_date">Expiry Date: 14-10-2021</p>
                        </div>
                    </div>
                    <a href="{{ route('cp.subscriptions.show') }}" class="renew_subs_btn">Renew subscription</a>
                </div>
                <div class="my_subs_inner">
                    <div class="ms_img_text_group">
                        <img src="{{ asset('assets/frontend/img/sub1.jpg') }}">
                        <div class="ms_text_g">
                            <h3 class="ms_heading">Daily Graphic</h3>
                            <p class="ms_sub_date">Subscription Date: 27-09-2017</p>
                            <p class="exp_date">Expiry Date: 14-10-2021</p>
                        </div>
                    </div>
                    <a href="{{ route('cp.subscriptions.show') }}" class="renew_subs_btn">Renew subscription</a>
                </div>
                <div class="my_subs_inner">
                    <div class="ms_img_text_group">
                        <img src="{{ asset('assets/frontend/img/sub1.jpg') }}">
                        <div class="ms_text_g">
                            <h3 class="ms_heading">Daily Graphic</h3>
                            <p class="ms_sub_date">Subscription Date: 27-09-2017</p>
                            <p class="exp_date">Expiry Date: 14-10-2021</p>
                        </div>
                    </div>
                    <a href="{{ route('cp.subscriptions.show') }}" class="renew_subs_btn">Renew subscription</a>
                </div>
                <div class="my_subs_inner">
                    <div class="ms_img_text_group">
                        <img src="{{ asset('assets/frontend/img/sub1.jpg') }}">
                        <div class="ms_text_g">
                            <h3 class="ms_heading">Daily Graphic</h3>
                            <p class="ms_sub_date">Subscription Date: 27-09-2017</p>
                            <p class="exp_date">Expiry Date: 14-10-2021</p>
                        </div>
                    </div>
                    <a href="{{ route('cp.subscriptions.show') }}" class="renew_subs_btn">Renew subscription</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ./my Subscription -->
    @include('customer.account.partials.footer')
@endsection
