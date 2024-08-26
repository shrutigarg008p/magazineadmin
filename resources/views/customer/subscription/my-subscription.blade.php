@extends('layouts.customer')
@section('title', 'My Subscriptions')

@section('content')

<!-- breadcrumb -->
<section class="breadcrumb_group">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
            <li class="breadcrumb_list">></li>
            <li class="breadcrumb_list">My Subscription</li>
        </ul>
    </div>
</section>
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
<form action="{{url('referral_new_plan')}}" method="post">
    @csrf
<section class="join_free">
    <div class="container">
        <div class="plans_checkout">
         <div class="heading_arrow_group heading_bg_light">
            <h1 class="common_heading">Join for Free</h1>
         </div>
         <div class="row">
             <div class="col-md-8">
                 <div class="plans_custom_input">
                    <input type="text" name="referral_code" class="custom_input" placeholder="Referal Code">
                 </div>
             </div>
             <div class="col-md-4">
                <button  class="renew_subs_btn">Apply</button>
            </div>
         </div>
         <p>Enter the code shared by your family or friends here </p>
      </div>
    </div>
</section>
</form>

<!-- my account -->
<section class="my_profile">
    <div class="container">
        <div class="my_pro_group">
            <div class="my_pro_heading">{{ __('My Magazines & News Subscriptions') }}</div>
            <div class="all_plans_subs_btn">
                <a href="{{url('all_plans')}}" class="renew_subs_btn">All Plans</a>
            </div>
            @foreach($subscription as $subsData)
                <?php //dd($subsData['subscribed_at']->format('m/d/Y')); ?>
                @php
                    #count number of days hours
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $subsData['subscribed_at']);
                    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', now());
                    $diff_in_hours = $to->diffInHours($from);
                    // echo($diff_in_hours);
                    #end
                    #days difference between now() and expires date
                    // $nowdate = date('Y-m-d H:i:s');
                    // $expdate = $subsData['expires_at'];
                    // $datetime1 = new DateTime($nowdate);
                    // $datetime2 = new DateTime($expdate);
                    // $interval = $datetime1->diff($datetime2);
                    // $days = $interval->format('%a');//now do whatever you like with $days
                    // // dd(date('Y-m-d H:i:s'));
                    // // dd($days);
                    // if($nowdate>$expdate){
                    //     $days = "Expired";
                    // }
                    $nowdate=date_create(date('Y-m-d'));
                    $expdate=date_create($subsData['expires_at']->format('Y-m-d'));
                    $diff=date_diff($nowdate,$expdate);
                    $days = $diff->format("%a");
                     if($nowdate>$expdate){
                        $days = "Expired";
                    }
                    $expires_date = date('d/m/Y', strtotime('-1 day', strtotime($subsData['expires_at']) ) );
                    // echo $diff->format("%R%a days");
                    $plan = $subsData['plan'];
                    $publications = $plan ? $plan->publications->implode('name', ',') : '';
                @endphp
                <div class="my_subs_inner">
                    <div class="ms_img_text_group">
                        <div class="ms_text_g">
                            <h3 class="ms_heading">{{$subsData['plan']['title']}}</h3>
                            @if ($publications !== '')
                            <p>Publications: <b>{{$publications}}</b></p>
                            @endif
                            <p class="ms_sub_date">Subscription Date: {{$subsData['subscribed_at']->format('d/m/Y')}}</p>
                            <p class="exp_date">Expiry Date:{{$expires_date}}</p>
                            <p class="exp_date">Days Left: <strong>{{$days}}</strong></p>
                            @if($subsData['payment']['refund'] !="")
                            <p class="exp_date">Refund: <strong style="color:#ca0a0a">{{ucwords($subsData['payment']['refund']['status_str'])}}</strong></p>
                            @endif
                             @if($subsData['is_family'] !="" && $subsData['referral_code']!="")
                               <p class="exp_date">Referral Code: <strong style="color:#ca0a0a">{{($subsData['referral_code'])}}</strong></p>
                               <p class="exp_date">Members: <strong style="color:#ca0a0a">{{($subsData['total_members'])}}</strong></p>
                               <p class="exp_date">Members Email: 
                               @foreach($subsData['member_subscriptions'] as $membersEmail)
                               @if($membersEmail['user'] !="")
                               {{-- <p class="exp_date">Members Email: <strong style="color:#ca0a0a">{{
                                $membersEmail['user']['email']}}</strong></p> --}}
                                {{ $loop->first ? '' : ', ' }}
                                <strong style="color:#ca0a0a">{{
                                $membersEmail['user']['email']}}</strong></p>
                                @endif
                               @endforeach
    
                            
                            @endif   
    
                            @if (!empty($subsData['via_referral']))
                                <p class="exp_date">Via Referral: <strong style="color:#ca0a0a">{{$subsData['via_referral']}}</strong></p>
                            @endif
                        </div>
                    </div>
                    <span class="ms_heading" style="display:none">{{$subsData['id']}}</span>
                    <span class="ms_heading" style="display:none">{{$subsData['plan']['id']}}</span>
                    {{-- <span class="ms_heading" >{{$subsData['plan_duration']['code']}}</span> --}}
                    @if( !empty($subsData['via_referral']))
                    
                    @else
                    @php $free_plan_id = env('FREE_PLAN_ID')??null; @endphp
                    @if($days <="2" || $nowdate>$expdate && ($free_plan_id != $subsData['plan']['id'] ) && $subsData['payment']['status'] == "SUCCESS")
                    <a href="{{route('renew_plan', ['userSubscription' => $subsData['id']])}}" class="renew_subs_btn">Renew subscription</a>
                    @endif
                    @endif
                   
                    {{-- <a href="{{route('renew_plan', ['userSubscription' => $subsData['id']])}}" class="renew_subs_btn">Renew subscription</a> --}}
                    @if($subsData['plan_duration']['code'] == "M" && $diff_in_hours <="48")
                        @if(empty($subsData['payment']['refund']) &&  empty($subsData['via_referral']))
                        <button class="renew_subs_btn cancel_subs">Cancel subscription</button>
                        @endif
                    @elseif($subsData['plan_duration']['code'] == "Q"&& $diff_in_hours <="48")
                        @if(empty($subsData['payment']['refund']) &&  empty($subsData['via_referral']) )
                        <button class="renew_subs_btn cancel_subs">Cancel subscription</button>
                        @endif
                    @elseif( $subsData['plan_duration']['code'] == "H"&& $diff_in_hours <="48")
                        @if(empty($subsData['payment']['refund']) &&  empty($subsData['via_referral']) )
                        <button class="renew_subs_btn cancel_subs">Cancel subscription</button>
                        @endif
                    @elseif($subsData['plan_duration']['code'] == "Y"&& $diff_in_hours <="48" )
                        @if(empty($subsData['payment']['refund']) &&  empty($subsData['via_referral']) )
                        <button class="renew_subs_btn cancel_subs">Cancel subscription</button>
                        @endif
                   
                    @endif
                   {{--   <a href="#" class="renew_subs_btn" data-toggle="modal" data-target="#cancel_subs_modal">Cancel subscription</a> --}}
    
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- my account -->
{{-- refund modal --}}
<form action="{{url('subscription_refund')}}" method="post">
@csrf
<div class="modal fade" id="cancel_subs_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content pm_modal_content">
            <div class="fashion_modal">
                <div class="pm_modal_header">
                    <div class="heading_arrow_group">
                        <h1 class="common_heading">Are you sure want to cancel Lifestyle subscription?</h1>
                    </div>
                </div>
                <div class="pm_modal_body">
                    <div class="fashion_modal_body">
                        <div class="btm_radio">
                           <input type="hidden" name="reference_id" class="package_key_subs" value=""> 
                          <textarea class="form-control" rows="4" cols="38" name="reason">Cancellation request</textarea>
                        </div>
                    </div>
                </div>

                 <div class="pm_modal_footer">
                    <div class="subs_pcbtn_group">
                        <button type="reset" class="subs_cancel_btn cancelBTN">No</button>
                        <button class="subs_pay_now_btn nextpurchase">Yes</button>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</div>
  </form>
{{-- end --}}
<!-- user-dropdown-menu -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript">
   $(".cancel_subs").click(function(){
      // alert($(this).parent().children().eq(1).html());
      pack_key = $(this).parent().children().eq(1).html();
      $('.package_key_subs').val(pack_key);
      $('#cancel_subs_modal').modal('show');
    });
     $(document).ready(function () {
     $('.cancelBTN').click(function (){
        // window.setTimeout(function () {
          $('#cancel_subs_modal').modal('hide');
        // }, 1000);
    });
    });
</script>
@endsection




