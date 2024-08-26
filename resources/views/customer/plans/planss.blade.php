<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazine</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
     <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <style type="text/css">



.tabnews_block {    display: flex;     flex-wrap: wrap;   }
.tabnews_inner {margin-right: 20px;margin-bottom: 20px;background: #ebebeb;border-radius: 5px;}
.tabnews_inner:nth-child(5n+5) {margin-right: 0;}
.tabnews_name {font-size: 16px;font-weight: 500;color: #000;}
.tabnews_price {font-size: 14px;color: #797979;}
.tabnews_textgroup {padding: 10px;}
.tabnews_links {height: 50px;background: #d3d3d3;border: 0;color: #000;font-size: 16px;font-weight: 500;padding: 0 30px;width: 50%;}
.tabnews_links.active {background: #ca0a0a;color: #fff;}
.tabnews_tabs {margin-top: 40px;}
.tabnews_tabs .tab {margin-bottom: 20px;display: flex;}
.heading_bg_light {background: #ebebeb;padding: 10px;}
.main_page_heading {font-size: 20px;color: #000;font-weight: 500;margin-bottom: 20px;}
.main_page_heading img {margin-right: 20px;}




/* 28-11-2021 */
.bundle_block {border: 1px solid #ccc;border-radius: 3px;padding: 20px;margin-bottom: 30px;}
.bundle_block .tab {background: #e0e0e0;width: max-content;margin: 0 auto;border-radius: 50px;}
.bundle_block .tab .tabbundle_links {background: transparent;border: 0;height: 45px;padding: 0 20px;border-radius: 50px;}
.bundle_block .tab .tabbundle_links.active {background: #ca0a0a;color: #fff;}

.container_bundle {display: block;position: relative;padding-left: 35px;margin-bottom: 12px;cursor: pointer;font-size: 22px;-webkit-user-select: none;-moz-user-select: none;
-ms-user-select: none;user-select: none;}
.container_bundle input.bundle {position: absolute;opacity: 0;cursor: pointer;}
.checkmark_bundle {position: absolute;top: 0;left: 0;height: 26px;width: 26px;background-color: #eee;border-radius: 50%;}
.container_bundle:hover input.bundle ~ .checkmark_bundle {background-color: #ccc;}
.container_bundle input.bundle:checked ~ .checkmark_bundle {background-color: #fff; border: 4px solid #ca0a0a;}
.checkmark_bundle:after {content: "";position: absolute;display: none;}
.container_bundle input.bundle:checked ~ .checkmark_bundle:after {display: block;}
.container_bundle .checkmark_bundle:after {top: 4px;left: 4px;width: 10px;height: 10px;border-radius: 50%;background: #ca0a0a;}
.container_bundle { width: 26px; height: 26px; padding: 0;margin: 0;}
.bd_block {border: 1px solid #ccc;border-radius: 3px;padding: 10px 20px;display: flex;justify-content: space-between;align-items: center;margin-top: 20px;}
.bd_heading {font-size: 14px;color: #000;font-weight: 500;}
.bd_heading span {display: block;color: #898989;}

.btm_radio .container_bundle {width: auto;height: auto;}
.btm_radio .radio_btn_text {padding-left: 40px;font-size: 14px;color: #000;}
.btm_radio .checkmark_bundle {top: 5px;}
.btm_radio {display: flex;align-items: flex-start;margin-bottom: 30px;}
.btm_radio .container_bundle:last-child {margin-left: 100px;}
.plans_pay_due {font-size: 16px;font-weight: 500;text-align: center;margin-bottom: 20px;}
.plans_pay_due span {font-size: 32px;color: #ca0a0a;display: block;font-weight: 600;}
.all_planspay_btn {width: 100%;max-width: 500px;height: 50px;background: #ca0a0a;border: 0;color: #fff;font-size: 16px;font-weight: 600;text-transform: uppercase;
border-radius: 5px;margin: 0 auto;display: block;}
.plans_checkout {margin-bottom: 30px;}
/* 28-11-2021 */



    </style>
</head>
<body>



   


    
    <div class="container">
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
            <div class="tabnews_tabs">
                <div class="main_page_heading">
                    <img src="img/icon-prev.png" alt="">
                    All Plans
                </div>
                <div class="heading_arrow_group heading_bg_light">
                    <h1 class="common_heading">Select Epaper Package</h1>
                   
                </div>
                <div class="tab">
                    <button class="tabnews_links" onclick="openCity(event, 'bundle')" id="defaaultOpen">Bundle</button>
                    <button class="tabnews_links" onclick="openCity(event, 'custom')" id="defaultOpen">custom</button>
                </div>
               
                <div id="bundle" class="tabcontent">
                    @php
                        $bundleKey = $plans->pluck('value')->search('Bundle');
                        $bundledata = $plans->get($bundleKey);
                        // dd($bundleKey,$bundledata);
                    @endphp
                     <p class="referal_text">{{$bundledata['description']}}</p>
                    <div class="bundle_block">
                        <div class="tab">
                            @forelse($bundledata['period'] as $bdkey =>$data)
                                <button name="package_key" value="{{$data['key']}}" class="tabbundle_links @if($bdkey==0) active @endif" onclick="openBundle(event, '{{($data['key']=='Q')?'three-month':strtolower($data['name'])}}')" @if($bdkey==0) id="defaultOpenbundle" @endif>{{$data['name']}}</button>
                            @empty

                            @endforelse
                            {{-- <button class="tabbundle_links active" onclick="openBundle(event, 'weekly')" id="defaultOpenbundle">Weekly</button>
                            <button class="tabbundle_links" onclick="openBundle(event, 'monthly')">Monthly</button>
                            <button class="tabbundle_links" onclick="openBundle(event, 'three-month')">3 Months</button>
                            <button class="tabbundle_links" onclick="openBundle(event, 'half-yearly')">Half-Yearly</button>
                            <button class="tabbundle_links" onclick="openBundle(event, 'yearly')">Yearly</button> --}}
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
                    <div class="btm_radio">
                        <label class="container_bundle">
                            <input class="bundle" type="radio" value="onlyme" name="family">
                            <span class="checkmark_bundle"></span> <span class="radio_btn_text">Only Me</span>
                        </label>
                        <label class="container_bundle">
                            <input class="bundle" type="radio" value="family"  name="family">
                            <span class="checkmark_bundle"></span> <span class="radio_btn_text">With Family & Friends</span>
                        </label>
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
                         <span>GHS <span class="actual_price1"> 0.0</span></span>
                    </div>
                    {{-- <button class="all_planspay_btn">Pay Now</button> --}}
                      <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                        <div class="row" style="margin-bottom:40px;">
                            <div class="col-md-8 col-md-offset-2">
                                <p>
                                    
                                </p>
                                <input type="hidden" name="email" value="otemuyiwa@gmail.com"> {{-- required --}}
                                {{-- <input type="hidden" name="planID" class="planid" value=""> --}}
                                <input type="hidden" name="package_key" class="planid" value=""> 
                                <input type="hidden" name="amount" class="price" value=""> {{-- required in kobo --}}
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="currency" value="NGN">
                                <input type="hidden" name="is_family" class="is_family" value="0">

                                <input type="hidden" name="duration_key" class="subsc_day" value="">
                                <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                
                               

                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                <p>
                                   {{--  <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                    </button> --}}
                                    <button class="all_planspay_btn">Pay Now</button>
                                </p>
                            </div>
                        </div>
                    </form>
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
                        <div class="tab">
                            @forelse($bundledata['period'] as $bdkey =>$data)
                                
                                <button name="package_key2" value="{{$data['key']}}" class="tabbundle_links @if($bdkey==0) active @endif" onclick="openBundle(event, 'c{{($data['key']=='Q')?'three-month':strtolower($data['name'])}}')" @if($bdkey==0) id="defaultOpfenbundle" @endif>{{$data['name']}}</button>
                            @empty

                            @endforelse
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
                    <div class="btm_radio">
                        <label class="container_bundle">
                            <input class="bundle" type="radio" name="family_custom"value="onlyme" >
                            <span class="checkmark_bundle"></span> <span class="radio_btn_text" >Only Me</span>
                        </label>
                        <label class="container_bundle">
                            <input class="bundle" type="radio" name="family_custom" value="family" >
                            <span class="checkmark_bundle"></span> <span class="radio_btn_text" >With Family & Friends</span>
                        </label>
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
                        <span>GHS <span class="actual_price"> 0.0</span></span>
                    </div>
                    {{-- <button class="all_planspay_btn">Pay Now</button> --}}
                      <form method="POST" action="{{ route('custom_pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                        <div class="row" style="margin-bottom:40px;">
                            <div class="col-md-8 col-md-offset-2">
                                <p>
                                    
                                </p>
                                <input type="hidden" name="email" value="otemuyiwa@gmail.com"> {{-- required --}}
                                {{-- <input type="hidden" name="planID" class="planid" value=""> --}}
                                <input type="hidden" name="package_key2" class="planid2" value=""> 
                                <input type="hidden" name="amount" class="price2" value=""> {{-- required in kobo --}}
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="currency" value="NGN">
                                <input type="hidden" name="is_family_custom" class="is_family_custom" value="0">
                                <input type="hidden" name="duration_key2" class="subsc_day2" value="">
                                <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                <input type="hidden" name="reference2" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                
                               

                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                <p>
                                   {{--  <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                    </button> --}}
                                    <button class="all_planspay_btn">Pay Now</button>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
                </div>

               
                
    </div>



<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>


<script type="text/javascript">
    $("input[name='radioCheck']").click(function(){

   // alert();
   // $palnId=$(this).parent().next().children().html();
   // alert($(this).parent().next().children().html());
   // alert($(this).parent().next().next().children().eq(1).html());
   // alert($('.tabbundle_links.active').val());
   $('.actual_price1').html($(this).parent().next().next().children().eq(1).html());
   
   
   $('.price').val($(this).parent().next().next().children().eq(1).html());
   $('.subsc_day').val($('.tabbundle_links.active').val());
   $('.planid').val($(this).parent().next().children().html());
});
  $("input[name='family']").click(function(){
// alert($(this).val());
if($(this).val() == "onlyme" ){
        $('.is_family').val('0')
}else{
        $('.is_family').val('1')
}
});
</script>

<script type="text/javascript">
    $("input[name='radioCheck2']").click(function(){

   // alert();
   // $palnId=$(this).parent().next().children().html();
   // alert($(this).parent().next().children().html());
   // alert($(this).parent().next().next().children().eq(1).html());
   // alert($('.tabbundle_links.active').val());
   

   $('.actual_price').html($(this).parent().next().next().children().eq(1).html());
   
   $('.price2').val($(this).parent().next().next().children().eq(1).html());
   $('.subsc_day2').val($('.tabbundle_links.active').val());
   $('.planid2').val($(this).parent().next().children().html());
});
$(document).on('click','.tabbundle_links ',function(){
   $('.actual_price').html('0.00');
    $('.actual_price1').html('0.00');

})    

  $("input[name='family_custom']").click(function(){
    // alert($(this).val());
    if($(this).val() == "onlyme" ){
            $('.is_family_custom').val('0')
    }else{
            $('.is_family_custom').val('1')
    }
 });
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
</body>
</html>





