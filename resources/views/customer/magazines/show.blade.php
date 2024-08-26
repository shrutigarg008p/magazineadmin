@extends('layouts.customer')
@section('title', $magDetails->title)
@section('meta_description', $magDetails->short_description)
@if ($magDetails->thumbnail_image)
@section('meta_image', asset("storage/{$magDetails->thumbnail_image}"))
@endif
@section('content')
<!-- breadcrumb -->
<section class="breadcrumb_group">
   <div class="container">
      <ul class="breadcrumb">
         <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
         <li class="breadcrumb_list">></li>
         <li class="breadcrumb_list">Magazines</li>
         <li class="breadcrumb_list">></li>
         <li class="breadcrumb_list">{{$magDetails->title}}</li>
         {{--    
         <li class="breadcrumb_list">></li>
         <li class="breadcrumb_list">India Today - Hope and Glory</li>
         --}}
      </ul>
   </div>
</section>
<?php  $check = Auth::user();
   if($check){
   $id=Auth::user()->id;
   $user = App\Models\User::find($id);
   $user =  $user->isCustomer();  
   }else{
      $user = "";
   }
   
   
      ?>
{{-- modal --}}
<div class="modal fade" id="fashion_modal" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content pm_modal_content">
         <div class="fashion_modal">
            <div class="pm_modal_header">
               <div class="heading_arrow_group">
                  <h1 class="common_heading">Select Epaper Package</h1>
               </div>
            </div>
            <div class="pm_modal_body">
               <div class="fashion_modal_body">
                  <p>Please select the plan for subscription</p>
                  <div class="btm_radio">
                     <label class="container_bundle">
                     <input class="bundle" type="radio" name="one-time-purchase" value="single">
                     <span class="checkmark_bundle"></span> <span class="radio_btn_text">Single Purchace</span>
                     </label>
                     <label class="container_bundle">
                     <input class="bundle" type="radio" name="one-time-purchase" value="subscription">
                     <span class="checkmark_bundle"></span> <span class="radio_btn_text">Go with subscription</span>
                     </label>
                  </div>
               </div>
            </div>
            <div class="pm_modal_footer">
               <div class="subs_pcbtn_group">
                  <button type="reset" class="subs_cancel_btn cancelBTN">Cancel</button>
                  <button class="subs_pay_now_btn nextpurchase">Next</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
{{-- end --}}
<!-- detail page main section -->
<section class="md_hg">
   <div class="container">
      <div class="row">
         <div class="col-md-5">
            <div class="md_left ">
               <img src="{{ asset("storage/".$magDetails->cover_image) }}" class="img-fluid lazy ">
               <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$magDetails->id}}" data-type="magazine" class="news_pdf_icon {{in_array($magDetails->id,$bmags)?'active':''}}" style="right: 9px;"> 
            </div>
            {{-- 
            <div class="md_left new-md-left">
               <div class="detail-image-wrap">
                  <div class="bg-img">
                     <img src="{{ asset("storage/".$magDetails->cover_image) }}" class="img-fluid lazy ">
                  </div>
                  <div class="front-bg">
                     <img src="{{ asset("storage/".$magDetails->cover_image) }}" class="img-fluid lazy ">
                     <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$magDetails->id}}" data-type="magazine" class="news_pdf_icon {{in_array($magDetails->id,$bmags)?'active':''}}" style="right: 9px;"> 
                  </div>
               </div>
            </div>
            --}}
         </div>
         <div class="col-md-7">
            <div class="heading_share_icon">
               <h1 class="md_hg_heading">{{$magDetails->title}}</h1>
               <div class="share_icon_right">
                  <img src="{{ asset('assets/frontend/img/icon-share.png') }}" data-toggle="modal" data-target="#socialModal">
                  @php 
                  $contentURL = asset('magazine/'.$magDetails->id.'/details');
                  @endphp
               </div>
            </div>
            <ul class="source_date">
               <li class="sd_list">{{$magDetails->publication->name}}</li>
               <li class="sd_list">|</li>
               <li class="sd_list">{{date('F d, Y', strtotime($magDetails->published_date))}}</li>
            </ul>
            <div class="magazine_d_price">{{to_price($magDetails->price, true)}}</div>
            @if(isset($subscribed) && $subscribed == "1")
               <span style="color:red">Subscribed</span>
            @endif
            <div class="md_text_start">
               <h2 class="mdtext_heading">Information</h2>
               <p class="md_text_detail">{{$magDetails->short_description}}</p>
               {{-- 
               <p class="md_text_detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                  reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                  occaecat cupitat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
               </p>
               --}}
            </div>
            <div class="buttons_group">
               {{-- <button class="md_download">Read Now</button> --}}
               <?php 
                  if(Auth::user() && $user){
                  $check =  DB::table('user_downloads')->where('user_id',auth()->user()->id)->where('file_id',$magDetails->id)->get();
                  
                  if(count($check) <= 0){
                  ?> 
               <a href="{{url("pdf/$magDetails->id/viewer")}}">
               {{-- @if($magDetails->file!="")comment on 19jan --}}
               @if($magDetails->file!=""&& $magDetails->file_type == "pdf")
               <button class="md_readthis">Preview</button>
               {{--   @else
               <button class="md_readthis" disabled>Read This Now</button> --}}
               @endif
               @if($magDetails->file!="" && $magDetails->file_type=="epub")
               @if($magDetails->file_converted!="" && $magDetails->file_preview!="" )
               <button class="md_readthis" >Preview</button>
               @else
               <button class="md_readthis" disabled>Preview</button>
               @endif
               @endif
               </a>
               {{-- comment on 07 --}}
               {{-- 
               <form method="post" action="{{ route('download_mags') }}">
                  @csrf
                  <input type="hidden" name="subscribed" id="subscribed" value="{{$subscribed}}">
                  <input type="hidden" name="magsid" id="magsid" value="{{$magDetails->id}}">   
                  <button class="md_download" >Downloads</button>
               </form>
               --}}
               @if($subscribed == "1")
               <form method="post" action="{{ route('download_mags') }}">
                  @csrf
                  <input type="hidden" name="subscribed" id="subscribed" value="{{$subscribed}}">
                  <input type="hidden" name="magsid" id="magsid" value="{{$magDetails->id}}">   
                  <button class="md_download" >Open</button>
               </form>
               @else
               <a href="{{route('single_magazine', ['id' => $magDetails->id])}}">
               <button class="md_download purchase_button" >Purchase</button>
               </a>
               @endif
               <?php }else{ ?>
               {{-- 
               <a href="{{url("pdf/$magDetails->id/viewer")}}">
               <button class="md_readthis">Read This Now</button>
               </a>
               <form method="post" action="{{ route('download_mags') }}">
                  @csrf
                  <input type="hidden" name="subscribed" id="subscribed" value="{{$subscribed}}">
                  <input type="hidden" name="magsid" id="magsid" value="{{$magDetails->id}}">   
                  <button class="md_download" >Downloads</button>
               </form>
               --}}
               <a href="{{url("pdf/$magDetails->id/viewer")}}">
               <button class="md_readthis">Open</button>
               </a>
               <?php
                  } }else{
                  ?>  
               <a href="{{url("pdf/$magDetails->id/viewer")}}">  
               <button class="md_readthis">Preview</button>
               </a>
               <a href="{{route("login",['redirect_to' => url()->current()])}}">
               <button class="md_download" >Purchase</button>
               </a>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- detail page main section -->
<!-- Related Magazines -->
@if(count($related)>0)
<div class="container">
   <div class="heading_arrow_group">
      <h1 class="common_heading">Related Magazines</h1>
      <a href="{{url("related/magazines/$magDetails->id/listing")}}"><img src="{{ asset('assets/frontend/img/icon-next.png') }}" alt=""></a>
   </div>
   <section class="regular slider newspaper_slider">
      @foreach($related as $relMagazines)
      <div>
         <div class="inner_content">
            <a class="newspaper_image" href="{{url("magazine/$relMagazines->id/details")}}">
            <img src="{{ asset("storage/".$relMagazines->cover_image) }}" class="img-fluid lazy ">
            </a>
            {{-- <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon"> --}}
            <div class="newspaper_name">{{$relMagazines->title}}</div>
         </div>
      </div>
      @endforeach
   </section>
</div>
@endif
<!-- top stories -->
<!--     <div class="container">
   <div class="heading_arrow_group">
       <h1 class="common_heading">Top Stories</h1>
       <a href="{{url('topstory')}}"><img src="{{ asset('assets/frontend/img/icon-next.png') }}" alt=""></a>
   </div>
   <section class="regular slider promoted_slider">
       @foreach($top_stories as $topDatas)
       <div>
           <div class="inner_box">
               <div class="inner_box_img">
               <a href="{{url("topstory/$topDatas->id/details")}}">
               <?php 
              if(strpos("$topDatas->content_image","https")!==false)
              {
              
              ?>  
               <img src="{{ !empty($topDatas->content_image) ? asset($topDatas->content_image) : asset('assets/frontend/img/ts1.jpg')   }}" class="img-fluid lazy " referrerpolicy="no-referrer">
                  
               <?php }else{ ?>
               
               <img src="{{ !empty($topDatas->content_image) ? asset("storage/".$topDatas->content_image) : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
                   
               <?php } ?>
               </a>
   
               </div>
               {{-- <img src="{{ asset($topDatas->content_image) }}" class="img-fluid lazy "> --}}
               <div class="box_content">
                   <p class="p_gamename">{{$topDatas->slug}}</p>
                   <p class="p_gameheading">{{$topDatas->title}}</p>
                   <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                       {{$topDatas->created_at->format('Y-m-d')}}
                   </div>
               </div>
           </div>
       </div>
       @endforeach
       
   </section>
   </div> -->
@include('customer.pages.social')
@endsection
@section('scripts')
<script src="{{ asset('assets/frontend/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
   $(document).on('ready', function() {
       $(".lazy").slick({
           dots: true,
           autoplay: true,
           autoplayTimeout: 1000,
           autoplayHoverPause: true,
       });
   });
   $("input[name='one-time-purchase']").click(function(){
       // alert($(this).val());
       val = $(this).val();
       if(val == "single"){
          $(".nextpurchase").click(function(){
            single();
           });
       }else{
          $(".nextpurchase").click(function(){
            all_plans();
           });
       }
   }); 
   function single(){
       window.location.href="{{url("single/magazine/$magDetails->id")}}";
   } 
   function all_plans(){
      window.location.href="{{url("all_plans")}}";
   }
   $(document).ready(function () {
    $('.cancelBTN').click(function (){
           // window.setTimeout(function () {
             $('#fashion_modal').modal('hide');
           // }, 1000);
       });
   });
</script>
<script type="text/javascript">
   $(document).on('ready', function() {
       $(".newspaper_slider").slick({
           infinite: true,
           slidesToShow: 6,
           slidesToScroll: 4,
           responsive: [{
                   breakpoint: 991,
                    settings: {
                       slidesToShow: 3,
                       slidesToScroll: 3,
                       infinite: true
                    }
               },
               {
                   breakpoint: 767,
                    settings: {
                       slidesToShow: 2,
                       slidesToScroll: 2,
                    } 
               },
               {
                   breakpoint: 480,
                    settings: {
                       slidesToShow: 2,
                       slidesToScroll: 2
                    }
               }
               // You can unslick at a given breakpoint now by adding:
               // settings: "unslick"
               // instead of a settings object
           ]
       });
       $(".promoted_slider").slick({
           infinite: true,
           slidesToShow: 3,
           slidesToScroll: 3,
           responsive: [{
                   breakpoint: 991,
                    settings: {
                       slidesToShow: 2,
                       slidesToScroll: 2,
                       infinite: true
                    }
               },
               {
                   breakpoint: 767,
                    settings: {
                       slidesToShow: 2,
                       slidesToScroll: 2,
                    }
               },
               {
                   breakpoint: 575,
                    settings: {
                       slidesToShow: 1,
                       slidesToScroll: 1
                    }
               }
               // You can unslick at a given breakpoint now by adding:
               // settings: "unslick"
               // instead of a settings object
           ]
       });
       $(".gallaries_slider").slick({
           infinite: true,
           slidesToShow: 4,
           slidesToScroll: 4,
           responsive: [{
                   breakpoint: 991,
                    settings: {
                       slidesToShow: 2,
                       slidesToScroll: 2,
                       infinite: true
                    }
               },
               {
                   breakpoint: 767,
                    settings: {
                       slidesToShow: 1,
                       slidesToScroll: 1,
                    }
               },
               {
                   breakpoint: 480,
                    settings: {
                       slidesToShow: 2,
                       slidesToScroll: 2
                    }
               }
               // You can unslick at a given breakpoint now by adding:
               // settings: "unslick"
               // instead of a settings object
           ]
       });
   });
</script>
<script type="text/javascript">
   // $(document).on('click','#share',function(){
   //     alert();
   //       $.ajax({
   //          url: "<?php echo url('share-social') ?>",
   //          method: 'POST',
   //          data: {  "_token": "{{ csrf_token() }}"},
   //          success: function(data) {   
   //          }
   //      });
   // });
</script>
@endsection