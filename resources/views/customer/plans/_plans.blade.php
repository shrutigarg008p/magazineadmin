@extends('layouts.customer')
@section('title', 'All Plans')
@section('content')
   <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">All Plans</li>
            </ul>
        </div>
    </section>
<div class="">
@if(count($errors))
   <div class="alert alert-danger">
      {{-- <strong>Whoops!</strong> There were some problems with your input. --}}
      <br/>
      <ul>
         @foreach($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif
@if ($message = Session::get('success'))
   <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
   </div>
@endif 
@if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
   </div>
@endif
<div class="container">
   <div class="tabnews_tabs">
      <div class="main_page_heading">
         <img src="img/icon-prev.png" alt="">
         All Plans
      </div>
      <div class="heading_arrow_group heading_bg_light">
         <h1 class="common_heading">Select Epaper Package</h1>
      </div>
      <div class="tab">
         <button class="tabnews_links" onclick="openCity(event, 'bundle')" id="defaultOpen">Bundle</button>
         <button class="tabnews_links" onclick="openCity(event, 'custom')" id="defaultOpen">Custom</button>
         <button class="tabnews_links" onclick="openCity(event, 'premium')" id="defaultOpen">Premium</button>
      </div>
      <div id="bundle" class="tabcontent">
         @php
            $bundleKey = $plans->pluck('value')->search('Bundle');
            $bundledata = $plans->get($bundleKey);
            // dd($bundleKey,$bundledata);
         @endphp
         <p class="referal_text">{{$bundledata['description']}}</p>
         <div class="bundle_block">
         <div class="table-responsive">
            <div class="tab">
               @forelse($bundledata['period'] as $bdkey =>$data)
                  <button name="package_key" value="{{$data['key']}}" class="tabbundle_links @if($bdkey==0) active @endif" onclick="openBundle(event, '{{($data['key']=='Q')?'three-month':strtolower($data['name'])}}')" @if($bdkey==0) id="defaultOpenbundle" @endif>{{$data['name']}}</button>
               @empty

               @endforelse
                  {{-- 
                     <button class="tabbundle_links active" onclick="openBundle(event, 'weekly')" id="defaultOpenbundle">Weekly</button>
                     <button class="tabbundle_links" onclick="openBundle(event, 'monthly')">Monthly</button>
                     <button class="tabbundle_links" onclick="openBundle(event, 'three-month')">3 Months</button>
                     <button class="tabbundle_links" onclick="openBundle(event, 'half-yearly')">Half-Yearly</button>
                     <button class="tabbundle_links" onclick="openBundle(event, 'yearly')">Yearly</button> 
                  --}}
            </div>
         </div>
            @forelse($bundledata['period'] as $data)
               @php
                  $packages = Collect($bundledata['packages'])->groupBy('value');
                  // dd($packages);
               @endphp
               <div id="{{($data['key']=='Q')?'three-month':strtolower($data['name'])}}" class="bundlecontent">
                  <div class="bd_block_full">
                     @forelse($packages as $pkey=>$pack)
                        @php
                           $packdata = $pack->first();
                           $arr =collect($packdata['duration'])->pluck('key')->search($data['key']);
                           // $arr = ($arr==0)
                           // dump($arr);
                        @endphp
                        @if($arr || $arr==0)
                           <div class="bd_block">
                              <label class="container_bundle">
                              <input class="bundle" type="radio" checked="checked" name="radioCheck" name="radio">
                              <span class="checkmark_bundle"></span>
                              </label>
                              <div class="bd_heading"  name="duration_key">
                                 <span style="display:none">{{$packdata['key']}}</span>
                                 <span>{{ucwords($pkey)}}</span> <span>{{$packdata['description']}}</span>
                              </div>
                              <div class="bd_heading">
                                 <span>{{$packdata['duration'][$arr]['currency']}}</span> <span>{{$packdata['duration'][$arr]['price']}} </span><span>Save {{$packdata['duration'][$arr]['discount']}}</span>
                              </div>
                           </div>
                        @endif
                     @empty

                     @endforelse
                  </div>
               </div>
            @empty

            @endforelse
         </div>
         <div class="block_total_memb">
            <div class="heading_arrow_group heading_bg_light">
               <h1 class="common_heading">Total Members</h1>
            </div>
            <div class="btm_radio row">
               <div class="col-6 col-sm-4">
                  <label class="container_bundle">
                     <input class="bundle" type="radio" value="onlyme" name="family">
                     <span class="checkmark_bundle"></span> <span class="radio_btn_text">Only Me</span>
                  </label>
               </div>
               <div class="col-6 col-sm-4">
                  <label class="container_bundle">
                     <input class="bundle" type="radio" value="family"  name="family">
                     <span class="checkmark_bundle"></span> <span class="radio_btn_text">With Family & Friends (6 Members)</span>
                  </label>
               </div>
               <div class="col-4">
                  <div class="btn-group btn-group-toggle bundle-friend" data-toggle="buttons" style="display:none">
                     @for ($i=1;$i<=6;$i++)
                     
                        @if ($i==6)
                           <label class="btn btn-info ">
                              <input type="radio" name="options" id="option{{$i}}" value="{{$i}}" checked> {{$i}}
                           </label>
                        @else
                           <label class="btn btn-info">
                              <input type="radio" name="options" id="option{{$i}}" value="{{$i}}"> {{$i}}
                           </label>
                        @endif
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
               <div class="input-group mb-3">
                  
                  <input type="text" class="form-control custom_input radioCheckCoupon" placeholder="Apply Coupon" aria-label="Coupon Listing" aria-describedby="button-addon1" disabled readonly>
                  <div class="input-group-prepend">
                     <button class="btn btn-outline-secondary radioCheckCoupon" type="button" id="button-addon1"  data-toggle="modal" data-target="#staticBackdrop" disabled>Check Coupons</button>
                  </div>
               </div>
               {{-- <input type="text" name="" class="custom_input" placeholder="Apply Coupon"> --}}
            </div>
            <div class="plans_pay_due">
               Payment Due
               @if(Auth::user()->country == "GH")
                  <span class="currency">GHS <span class="actual_price1_strike"> 0.0</span></span>
                  <span class="currency2" style="display: none">GHS <span class="actual_price1"> 0.0</span></span>
                  {{-- <span class="currency">GHS <span class="actual_price1"> 0.0</span></span> --}}
               @else
                  {{-- <span class="currency">USD <span class="actual_price1"> 0.0</span></span> --}}
                  {{-- <span class="currency">GHS <span class="actual_price1_strike"> 0.0</span></span> --}}
                  <span class="currency">USD <span class="actual_price1_strike"> 0.0</span></span>
                  <span class="currency2" style="display: none">USD <span class="actual_price1"> 0.0</span></span>
               @endif
               
            </div>
            {{-- <button class="all_planspay_btn">Pay Now</button> --}}
            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
               <div class="row" style="margin-bottom:40px;">
                  <div class="col-md-12">
                     <p></p>
                     <input type="hidden" name="email" value="otemuyiwa@gmail.com"> {{-- required --}}
                     {{-- <input type="hidden" name="planID" class="planid" value=""> --}}
                     <input type="hidden" name="package_key" class="planid" value=""> 
                     <input type="hidden" name="code" value=""> 
                     <input type="hidden" name="code_discount" value=""> 
                     <input type="hidden" name="amount" class="price" value=""> {{-- required in kobo --}}
                     <input type="hidden" name="quantity" value="1">
                     <input type="hidden" name="currency" value="NGN">
                     <input type="hidden" name="is_family" class="is_family" value="0">
                     <input type="hidden" name="is_family_members" class="is_family_members" value="1">
                     <input type="hidden" name="duration_key" class="subsc_day" value="">
                     <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > 
                     {{-- For other necessary things you want to add to your payload. it is optional though --}}
                     {{-- <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">  --}}
                     {{-- required --}}
                     <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
                     {{-- <p> --}}
                        {{--  <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                        </button> --}}
                        {{-- <button class="all_planspay_btn">Pay Now</button> --}}
                        
                     <div class="btn-group col-12 m-btn" role="group" aria-label="Basic example">
                        <button type="submit" name="pm" value="paystack" class="all_planspay_btn btn btn-primary">Pay With Paystack</button>
                        <button type="submit" name="pm" value="expresspay" class="btn btn-success">Pay With Expresspay</button>
                     </div>
                     {{-- </p> --}}
                  </div>
               </div>
            </form>
         </div>
         <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Coupon Codes</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     @forelse ($coupons as $coupon)
                        {{-- 
                           <div class="input-group mt-3">
                              <div class="input-group-prepend">
                                 <div class="input-group-text">
                                    <input type="radio" name="code" aria-label="Radio button for following text input">
                                 </div>
                              </div>
                              <input type="text" class="form-control" aria-label="Text input with radio button">
                              <button class="form-control btn btn-warning">{{$coupon->code}}</button>
                           </div> 
                        --}}
                        <div class="form-group text-center">
                           <div class="btn-group btn-group-toggle" data-toggle="buttons">
                              <label class="btn btn-warning active">
                                 <input type="radio" name="code" data-dismiss="modal" onclick="$('input.radioCheckCoupon').val('{{$coupon->code}}').attr('readonly',true),$('input[name=code_discount]').val('{{$coupon->discount}}'),$('input[name=code]').val('{{$coupon->code}}'),setbundlePrice();"> {{$coupon->code}}
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
         </div>
      </div>
      <div id="custom" class="tabcontent" >
         @php
            $bundleKey = $plans->pluck('value')->search('Custom');
            $bundledata = $plans->get($bundleKey);
            // dd($bundleKey,$bundledata);
         @endphp
         <p class="referal_text">{{$bundledata['description']}}</p>
         <div class="bundle_block">
            <div class="table-responsive ">
            <div class="tab">
               @forelse($bundledata['period'] as $bdkey =>$data)
                  <button name="package_key2" value="{{$data['key']}}" class="tabbundle_links @if($bdkey==0) active @endif" onclick="openBundle(event, 'c{{($data['key']=='Q')?'three-month':strtolower($data['name'])}}')" @if($bdkey==0) id="defaultOpfenbundle" @endif>{{$data['name']}}</button>
               @empty

               @endforelse
            </div>
            </div>
            @forelse($bundledata['period'] as $data)
               @php
                  $packages = Collect($bundledata['packages'])->groupBy('value');
               // dd($packages);
               @endphp
               <div id="c{{($data['key']=='Q')?'three-month':strtolower($data['name'])}}" class="bundlecontent">
                  <div class="bd_block_full">
                     @forelse($packages as $pkey=>$pack)
                        @php
                           $packdata = $pack->first();
                           $arr =collect($packdata['duration'])->pluck('key')->search($data['key']);
                           // $arr = ($arr==0)
                           // dump($arr);
                        @endphp
                        @if($arr || $arr==0)
                           <div class="bd_block">
                              <label class="container_bundle">
                                 <input class="bundle" type="radio" checked="checked" name="radioCheck2" name="radio">
                                 <span class="checkmark_bundle"></span>
                              </label>
                              <div class="bd_heading" name="duration_key2">
                                 <span style="display:none">{{$packdata['key']}}</span>
                                 <span>{{ucwords($pkey)}}</span> <span>{{$packdata['description']}}</span>
                              </div>
                              <div class="bd_heading">
                                 <span>{{$packdata['duration'][$arr]['currency']}}</span> <span>{{$packdata['duration'][$arr]['price']}}</span> <span>Save {{$packdata['duration'][$arr]['discount']}}</span>
                              </div>
                           </div>
                        @endif
                     @empty

                     @endforelse
                  </div>
               </div>
            @empty
            @endforelse
         </div>
         <div class="block_total_memb">
            <div class="heading_arrow_group heading_bg_light">
               <h1 class="common_heading">Total Members</h1>
            </div>
            <div class="btm_radio row">
               <div class="col-6 col-sm-4">
                  <label class="container_bundle">
                     <input class="bundle" type="radio" name="family_custom" value="onlyme" >
                     <span class="checkmark_bundle"></span> <span class="radio_btn_text" >Only Me</span>
                  </label>
               </div>
               <div class="col-6 col-sm-4">
                  <label class="container_bundle">
                     <input class="bundle" type="radio" name="family_custom" value="family" >
                     <span class="checkmark_bundle"></span> <span class="radio_btn_text" >With Family & Friends (6 Members)</span>
                  </label>
               </div>
               <div class="col-4">
                  <div class="btn-group btn-group-toggle custom-friend" data-toggle="buttons" style="display:none">
                     @for ($i=1;$i<=6;$i++)
                     
                        @if ($i==6)
                           <label class="btn btn-info ">
                              <input type="radio" name="coptions" id="option{{$i}}" value="{{$i}}" checked> {{$i}}
                           </label>
                        @else
                           <label class="btn btn-info">
                              <input type="radio" name="coptions" id="option{{$i}}" value="{{$i}}"> {{$i}}
                           </label>
                        @endif
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
               <div class="input-group mb-3">
                  
                  <input type="text" class="form-control custom_input radioCheckCoupon2" placeholder="Apply Coupon" aria-label="Coupon Listing" aria-describedby="button-addon1" disabled readonly>
                  <div class="input-group-prepend">
                     <button class="btn btn-outline-secondary radioCheckCoupon2" type="button" id="button-addon1"  data-toggle="modal" data-target="#staticBackdrop2" disabled>Check Coupons</button>
                  </div>
               </div>
               {{-- <input type="text" name="" class="custom_input" placeholder="Apply Coupon"> --}}
            </div>
            <div class="plans_pay_due">
               Payment Due
               @if(Auth::user()->country == "GH")
                  <span class="currency cghs">GHS <span class="actual_price_strike"> 0.0</span></span>
                  <span class="currency2 cghs2" style="display: none">GHS <span class="actual_price"> 0.0</span></span>
                  {{-- <span class="currency cghs">GHS <span class="actual_price_strike"> 0.0</span></span> --}}
               @else
                  <span class="currency cghs">USD <span class="actual_price_strike"> 0.0</span></span>
                  <span class="currency2 cghs2" style="display: none">USD <span class="actual_price"> 0.0</span></span>
                  {{-- <span class="currency cusd">USD <span class="actual_price"> 0.0</span></span> --}}
               @endif
               {{-- <span class="currency">GHS <span class="actual_price"> 0.0</span></span> --}}
            </div>
            {{-- <button class="all_planspay_btn">Pay Now</button> --}}
            <form method="POST" action="{{ route('custom_pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
               <div class="row" style="margin-bottom:40px;">
                  <div class="col-md-12">
                     <p>
                     </p>
                     <input type="hidden" name="email" value="otemuyiwa@gmail.com"> {{-- required --}}
                     {{-- <input type="hidden" name="planID" class="planid" value=""> --}}
                     <input type="hidden" name="package_key2" class="planid2" value=""> 
                     <input type="hidden" name="code" value="" id="code2"> 
                     <input type="hidden" name="code_discount" value="" id="code_discount2"> 
                     <input type="hidden" name="amount" class="price2" value=""> {{-- required in kobo --}}
                     <input type="hidden" name="quantity" value="1">
                     <input type="hidden" name="currency" value="NGN">
                     <input type="hidden" name="is_family_custom" class="is_family_custom" value="0">
                     <input type="hidden" name="is_family_members_custom" class="is_family_members_custom" value="1">
                     <input type="hidden" name="duration_key2" class="subsc_day2" value="">
                     <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                     {{-- <input type="hidden" name="reference2" value="{{ Paystack::genTranxRef() }}">  --}}
                     {{-- required --}}
                     <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                     {{-- employ this in place of csrf_field only in laravel 5.0 --}}
                     {{-- <p> --}}
                        {{--  <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                        </button> --}}
                        
                        <div class="btn-group col-12 m-btn" role="group" aria-label="Basic example">
                           <button type="submit" name="pm" value="paystack" class="all_planspay_btn btn btn-primary">Pay With Paystack</button>
                           <button type="submit" name="pm" value="expresspay" class="btn btn-success">Pay With Expresspay</button>
                        </div>
                        
                     {{-- </p> --}}
                  </div>
               </div>
            </form>
         </div>
         <div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalCenteredScrollableTitle2">Coupon Codes</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     @forelse ($coupons as $coupon)
                        {{-- <div class="input-group mt-3">
                           <div class="input-group-prepend">
                           <div class="input-group-text">
                              <input type="radio" name="code" aria-label="Radio button for following text input">
                           </div>
                           </div>
                           <input type="text" class="form-control" aria-label="Text input with radio button">
                           <button class="form-control btn btn-warning">{{$coupon->code}}</button>
                        </div> --}}
                        <div class="form-group text-center">
                           <div class="btn-group btn-group-toggle" data-toggle="buttons">
                              <label class="btn btn-warning active">
                                 <input type="radio" name="code" data-dismiss="modal" onclick="$('input.radioCheckCoupon2').val('{{$coupon->code}}').attr('readonly',true),$('#code_discount2').val('{{$coupon->discount}}'),$('#code2').val('{{$coupon->code}}'),setcustomPrice();"> {{$coupon->code}}
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
         </div>
      </div>


      <div id="premium" class="tabcontent" >
         @php
            $bundleKey = $plans->pluck('value')->search('Premium');
            $bundledata = $plans->get($bundleKey);
            // dd($bundleKey,$bundledata);
         @endphp
         <p class="referal_text">{{$bundledata['description']}}</p>
         <div class="bundle_block">
            <div class="table-responsive ">
            <div class="tab">
               @forelse($bundledata['period'] as $bdkey =>$data)
                  <button name="package_key3" value="{{$data['key']}}" class="tabbundle_links @if($bdkey==0) active @endif" onclick="openBundle(event, 'c{{($data['key']=='Q')?'three-month':strtolower($data['name'])}}')" @if($bdkey==0) id="defaultOpfenbundle" @endif>{{$data['name']}}</button>
               @empty

               @endforelse
            </div>
            </div>
            @forelse($bundledata['period'] as $data)
               @php
                  $packages = Collect($bundledata['packages'])->groupBy('value');
               // dd($packages);
               @endphp
               <div id="c{{($data['key']=='Q')?'three-month':strtolower($data['name'])}}" class="bundlecontent">
                  <div class="bd_block_full">
                     @forelse($packages as $pkey=>$pack)
                        @php
                           $packdata = $pack->first();
                           $arr =collect($packdata['duration'])->pluck('key')->search($data['key']);
                           // $arr = ($arr==0)
                           // dump($arr);
                        @endphp
                        @if($arr || $arr==0)
                           <div class="bd_block">
                              <label class="container_bundle">
                                 <input class="bundle" type="radio" checked="checked" name="radioCheck3" name="radio">
                                 <span class="checkmark_bundle"></span>
                              </label>
                              <div class="bd_heading" name="duration_key3">
                                 <span style="display:none">{{$packdata['key']}}</span>
                                 <span>{{ucwords($pkey)}}</span> <span>{{$packdata['description']}}</span>
                              </div>
                              <div class="bd_heading">
                                 <span>{{$packdata['duration'][$arr]['currency']}}</span> <span>{{$packdata['duration'][$arr]['price']}}</span> <span>Save {{$packdata['duration'][$arr]['discount']}}</span>
                              </div>
                           </div>
                        @endif
                     @empty

                     @endforelse
                  </div>
               </div>
            @empty
            @endforelse
         </div>
         <div class="block_total_memb">
            <div class="heading_arrow_group heading_bg_light">
               <h1 class="common_heading">Total Members</h1>
            </div>
            <div class="btm_radio row">
               <div class="col-6 col-sm-4">
                  <label class="container_bundle">
                     <input class="bundle" type="radio" name="family_custom" value="onlyme" >
                     <span class="checkmark_bundle"></span> <span class="radio_btn_text" >Only Me</span>
                  </label>
               </div>
               <div class="col-6 col-sm-4">
                  <label class="container_bundle">
                     <input class="bundle" type="radio" name="family_custom" value="family" >
                     <span class="checkmark_bundle"></span> <span class="radio_btn_text" >With Family & Friends (6 Members)</span>
                  </label>
               </div>
               <div class="col-4">
                  <div class="btn-group btn-group-toggle custom-friend" data-toggle="buttons" style="display:none">
                     @for ($i=1;$i<=6;$i++)
                     
                        @if ($i==6)
                           <label class="btn btn-info ">
                              <input type="radio" name="coptions" id="option{{$i}}" value="{{$i}}" checked> {{$i}}
                           </label>
                        @else
                           <label class="btn btn-info">
                              <input type="radio" name="coptions" id="option{{$i}}" value="{{$i}}"> {{$i}}
                           </label>
                        @endif
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
               <div class="input-group mb-3">
                  
                  <input type="text" class="form-control custom_input radioCheckCoupon2" placeholder="Apply Coupon" aria-label="Coupon Listing" aria-describedby="button-addon1" disabled readonly>
                  <div class="input-group-prepend">
                     <button class="btn btn-outline-secondary radioCheckCoupon2" type="button" id="button-addon1"  data-toggle="modal" data-target="#staticBackdrop2" disabled>Check Coupons</button>
                  </div>
               </div>
               {{-- <input type="text" name="" class="custom_input" placeholder="Apply Coupon"> --}}
            </div>
            <div class="plans_pay_due">
               Payment Due
               @if(Auth::user()->country == "GH")
                  <span class="currency cghs">GHS <span class="actual_price_strike"> 0.0</span></span>
                  <span class="currency2 cghs2" style="display: none">GHS <span class="actual_price"> 0.0</span></span>
                  {{-- <span class="currency cghs">GHS <span class="actual_price_strike"> 0.0</span></span> --}}
               @else
                  <span class="currency cghs">USD <span class="actual_price_strike"> 0.0</span></span>
                  <span class="currency2 cghs2" style="display: none">USD <span class="actual_price"> 0.0</span></span>
                  {{-- <span class="currency cusd">USD <span class="actual_price"> 0.0</span></span> --}}
               @endif
               {{-- <span class="currency">GHS <span class="actual_price"> 0.0</span></span> --}}
            </div>
            {{-- <button class="all_planspay_btn">Pay Now</button> --}}
            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
               <div class="row" style="margin-bottom:40px;">
                  <div class="col-md-12">
                     <input type="hidden" name="email" value="otemuyiwa@gmail.com"> {{-- required --}}
                     {{-- <input type="hidden" name="planID" class="planid" value=""> --}}
                     <input type="hidden" name="package_key3" class="planid3" value=""> 
                     <input type="hidden" name="code" value="" id="code3"> 
                     <input type="hidden" name="code_discount" value="" id="code_discount3"> 
                     <input type="hidden" name="amount" class="price2" value=""> {{-- required in kobo --}}
                     <input type="hidden" name="quantity" value="1">
                     <input type="hidden" name="currency" value="NGN">
                     <input type="hidden" name="is_family_custom" class="is_family_custom" value="0">
                     <input type="hidden" name="is_family_members_custom" class="is_family_members_custom" value="1">
                     <input type="hidden" name="duration_key3" class="subsc_day3" value="">
                     <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                     {{-- <input type="hidden" name="reference2" value="{{ Paystack::genTranxRef() }}">  --}}
                     {{-- required --}}
                     <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                     {{-- employ this in place of csrf_field only in laravel 5.0 --}}
                     {{-- <p> --}}
                        {{--  <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                        </button> --}}
                        
                        <div class="btn-group col-12 m-btn" role="group" aria-label="Basic example">
                           <button type="submit" name="pm" value="paystack" class="all_planspay_btn btn btn-primary">Pay With Paystack</button>
                           <button type="submit" name="pm" value="expresspay" class="btn btn-success">Pay With Expresspay</button>
                        </div>
                        
                     {{-- </p> --}}
                  </div>
               </div>
            </form>
         </div>
         <div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalCenteredScrollableTitle2">Coupon Codes</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     @forelse ($coupons as $coupon)
                        {{-- <div class="input-group mt-3">
                           <div class="input-group-prepend">
                           <div class="input-group-text">
                              <input type="radio" name="code" aria-label="Radio button for following text input">
                           </div>
                           </div>
                           <input type="text" class="form-control" aria-label="Text input with radio button">
                           <button class="form-control btn btn-warning">{{$coupon->code}}</button>
                        </div> --}}
                        <div class="form-group text-center">
                           <div class="btn-group btn-group-toggle" data-toggle="buttons">
                              <label class="btn btn-warning active">
                                 <input type="radio" name="code" data-dismiss="modal" onclick="$('input.radioCheckCoupon2').val('{{$coupon->code}}').attr('readonly',true),$('#code_discount2').val('{{$coupon->discount}}'),$('#code2').val('{{$coupon->code}}'),setcustomPrice();"> {{$coupon->code}}
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
         </div>
      </div>      
   </div>
</div>

 
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript">
   let pr = 0;prcd = 0;
   $("input[name='radioCheck']").click(function(){
      
      // alert();
      // $palnId=$(this).parent().next().children().html();
      // alert($(this).parent().next().children().html());
      // alert($(this).parent().next().next().children().eq(1).html());
      // alert($('.tabbundle_links.active').val());
      prb1= $(this).parent().next().next().children().eq(1).html();
      if($('.is_family').val()==1){
         // console.log('tetss'+$('input[name=options]').val());
         prcd = prb1 * $("input[name='options']:checked").val() ;
         $('.actual_price1_strike').html(prcd.toFixed(2));
      }else{
         $('.actual_price1_strike').html(prb1);
      }
      pr = prb1;
      $('input[name=code], input[name=code_discount], input.radioCheckCoupon').val('');
      // $('.radioCheckCoupon').attr('disabled',false);
      
      $('.price').val($(this).parent().next().next().children().eq(1).html());
      $('.subsc_day').val($('.tabbundle_links.active').val());
      $('.planid').val($(this).parent().next().children().html());
      $('.currency2').hide();
   });
   $("input[name='family']").click(function(){
      if($(this).val() == "onlyme" ){
         if($('.is_family').val()==1 && prcd != 0){
            pr = prcd/$("input[name='options']:checked").val();
            $('.actual_price1_strike').html(pr.toFixed(2));
         }
         $('.is_family').val('0');
         $('.bundle-friend').hide();
      }else{
         $('.bundle-friend').show();
         // console.log('tetss222-------'+$("input[name='options']:checked").val());
         prcd = pr * $("input[name='options']:checked").val();
         $('.actual_price1_strike').html(prcd.toFixed(2));
         $('.is_family').val('1');
         
         $('.is_family_members').val($("input[name='options']:checked").val());
         var btn = $(this);
         // btn.prop('disabled', true);
      }
      $('.radioCheckCoupon').attr('disabled',false);
   });
   $('input[name=options]').click(function(e){
      prcd = pr * $(this).val();
      // console.log($(this).val());
      // console.log(prcd);
      
      $('.is_family_members').val($(this).val());
      $('.actual_price1_strike').html(prcd.toFixed(2));
   });
   function setbundlePrice(){
      let dis = $('input[name=code_discount]').val();
      let newpr = pr - pr*(dis/100);
      $('.actual_price1_strike').html(newpr.toFixed(2));
      $('.actual_price1').html(pr.toFixed(2));
      $('.currency2').css({'text-decoration':'line-through'}).show();
   }
</script>
<script type="text/javascript">
   let prc = 0;prcc = 0;
   $("input[name='radioCheck2']").click(function(){
   
      // alert();
      // $palnId=$(this).parent().next().children().html();
      // alert($(this).parent().next().children().html());
      // alert($(this).parent().next().next().children().eq(1).html());
      // alert($('.tabbundle_links.active').val());
      $('input[name=code], input[name=code_discount], input.radioCheckCoupon2').val('');
      prc1= $(this).parent().next().next().children().eq(1).html();

      if($('.is_family_custom').val()==1){
         prcc = prc1 * $("input[name='coptions']:checked").val() ;
         $('.actual_price_strike').html(prcc.toFixed(2));
      }else{
         $('.actual_price_strike').html(prc1);
      }
      prc = prc1;

      // $('.actual_price_strike').html(prc);
      
      $('.price2').val($(this).parent().next().next().children().eq(1).html());
      $('.subsc_day2').val($('.tabbundle_links.active').val());
      $('.planid2').val($(this).parent().next().children().html());
      $('.cghs2').hide();
   });
   $(document).on('click','.tabbundle_links ',function(){
      $('.actual_price').html('0.00');
      $('.actual_price1').html('0.00');
      
   })    
   
   $("input[name='family_custom']").click(function(){
      // alert($(this).val());
      // if($(this).val() == "onlyme" ){
      //       $('.is_family_custom').val('0')
      // }else{
      //       $('.is_family_custom').val('1')
      // }

      if($(this).val() == "onlyme" ){
         if($('.is_family_custom').val()==1 && prcc!=0){
            prc = prcc/$("input[name='coptions']:checked").val();
            $('.actual_price_strike').html(prc.toFixed(2));
         }
         $('.is_family_custom').val('0');
         $('.is_family_member_custom').val('1');
         $('.custom-friend').hide();
      }else{
         $('.custom-friend').show();
         prcc = prc * $("input[name='coptions']:checked").val();
         $('.is_family_member_custom').val($("input[name='coptions']:checked").val());
         $('.actual_price_strike').html(prcc.toFixed(2));
         $('.is_family_custom').val('1')
      }
      $('.radioCheckCoupon2').attr('disabled',false);
   });
   $('input[name=coptions]').click(function(e){
      prcc = prc * $(this).val();
      // console.log($(this).val());
      // console.log(prcd);
      
      $('.is_family_members_custom').val($(this).val());
      $('.actual_price_strike').html(prcc.toFixed(2));
   })
   function setcustomPrice(){
      let disc = $('#code_discount2').val();
      let newprc = prc - prc*(disc/100);
      $('.actual_price_strike').html(newprc.toFixed(2));
      $('.actual_price').html(prc);
      $('.cghs2').css({'text-decoration':'line-through'}).show();
      
   }
</script>
<script type="text/javascript">
   let prc = 0;prcc = 0;
   $("input[name='radioCheck3']").click(function(){
   
      // alert();
      // $palnId=$(this).parent().next().children().html();
      // alert($(this).parent().next().children().html());
      // alert($(this).parent().next().next().children().eq(1).html());
      // alert($('.tabbundle_links.active').val());
      $('input[name=code], input[name=code_discount], input.radioCheckCoupon3').val('');
      prc1= $(this).parent().next().next().children().eq(1).html();

      if($('.is_family_custom').val()==1){
         prcc = prc1 * $("input[name='coptions']:checked").val() ;
         $('.actual_price_strike').html(prcc.toFixed(2));
      }else{
         $('.actual_price_strike').html(prc1);
      }
      prc = prc1;

      // $('.actual_price_strike').html(prc);
      
      $('.price3').val($(this).parent().next().next().children().eq(1).html());
      $('.subsc_day3').val($('.tabbundle_links.active').val());
      $('.planid3').val($(this).parent().next().children().html());
      $('.cghs3').hide();
   });
   $(document).on('click','.tabbundle_links ',function(){
      $('.actual_price').html('0.00');
      $('.actual_price1').html('0.00');
      
   })    
   
   $("input[name='family_premium']").click(function(){
      // alert($(this).val());
      // if($(this).val() == "onlyme" ){
      //       $('.is_family_custom').val('0')
      // }else{
      //       $('.is_family_custom').val('1')
      // }

      if($(this).val() == "onlyme" ){
         if($('.is_family_custom').val()==1 && prcc!=0){
            prc = prcc/$("input[name='coptions']:checked").val();
            $('.actual_price_strike').html(prc.toFixed(2));
         }
         $('.is_family_custom').val('0');
         $('.is_family_member_custom').val('1');
         $('.custom-friend').hide();
      }else{
         $('.custom-friend').show();
         prcc = prc * $("input[name='coptions']:checked").val();
         $('.is_family_member_custom').val($("input[name='coptions']:checked").val());
         $('.actual_price_strike').html(prcc.toFixed(2));
         $('.is_family_custom').val('1')
      }
      $('.radioCheckCoupon2').attr('disabled',false);
   });
   $('input[name=coptions]').click(function(e){
      prcc = prc * $(this).val();
      // console.log($(this).val());
      // console.log(prcd);
      
      $('.is_family_members_custom').val($(this).val());
      $('.actual_price_strike').html(prcc.toFixed(2));
   })
   function setcustomPrice(){
      let disc = $('#code_discount2').val();
      let newprc = prc - prc*(disc/100);
      $('.actual_price_strike').html(newprc.toFixed(2));
      $('.actual_price').html(prc);
      $('.cghs2').css({'text-decoration':'line-through'}).show();
      
   }
</script>
<script>
   function openCity(evt, cityName) {
       var i, tabcontent, tablinks;
       tabcontent = document.getElementsByClassName("tabcontent");
       for (i = 0; i < tabcontent.length; i++) {
           tabcontent[i].style.display = "none";
       }
       tablinks = document.getElementsByClassName("tabnews_links");
       for (i = 0; i < tablinks.length; i++) {
           tablinks[i].className = tablinks[i].className.replace(" active", "");
       }
       document.getElementById(cityName).style.display = "block";
       evt.currentTarget.className += " active";
       if(cityName=='bundle'){
         document.getElementById("defaultOpenbundle").click();
       }else if(cityName=='custom'){
         document.getElementById("defaultOpfenbundle").click();
       }
   }
   // Get the element with id="defaultOpen" and click on it
   document.getElementById("defaultOpenbundle").click();
</script>
<script>
   function openBundle(evt, BundleName) {
       var i, tabcontent, tablinks;
       tabcontent = document.getElementsByClassName("bundlecontent");
       for (i = 0; i < tabcontent.length; i++) {
           tabcontent[i].style.display = "none";
       }
       tablinks = document.getElementsByClassName("tabbundle_links");
       for (i = 0; i < tablinks.length; i++) {
           tablinks[i].className = tablinks[i].className.replace(" active", "");
       }
       document.getElementById(BundleName).style.display = "block";
       evt.currentTarget.className += " active";
   }
   // Get the element with id="defaultOpen" and click on it
   document.getElementById("defaultOpen").click();
</script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
@endsection
{{-- </body>
</html>
--}}