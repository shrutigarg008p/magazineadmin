@extends('layouts.customer')
@section('title', 'Refer Friends')

@section('content')

    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Refer friends</li>
            </ul>
        </div>
    </section>

    <section>
    <div class="container">
         <div class="heading_arrow_group heading_bg_light">
            <h1 class="common_heading">Refer A Friend</h1>
         </div>
          <div class="row">
            {{-- <div class="col-md-4">
                <img src="">
            </div> --}}
             <div class="col-md-12">
                <div class="main_page_heading">
                        Referral Code
                </div>
        
                <div class="credit_card_input">
                    <input type="text" placeholder="" value="{{$user->refer_code}}" disabled style="background-color:darkgray ">
                    <img src="img/credit-card.png" alt="">
                </div>
                <p class="text-center">Please copy this code and share with your family and friends</p>
                <p class="text-center">
                    <button class="subs_pay_now_btn mb-3" data-toggle="modal" data-target="#socialModal">Refer Now</button>
                </p>
        
        @php 
            $contentURL = route('register',['refer_code'=>$user->refer_code]);
        @endphp
    </div>
 </div>
 </div>
 @include('customer.pages.social')
</section>
@endsection