@extends('layouts.customer')
@section('title', 'Slider')
@section('content')
<section class="breadcrumb_group">
   <div class="container">
      <ul class="breadcrumb">
         <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
         <li class="breadcrumb_list">></li>
         <li class="breadcrumb_list">Slider</li>
         {{-- 
         <li class="breadcrumb_list">></li>
         --}}
         {{-- 
         <li class="breadcrumb_list">{{$category_details->name ?? null}}</li>
         --}}
      </ul>
   </div>
</section>
<div class="container">
   <div class="row">
      @if($slider->top_story == 1 && $slider->promoted!=1)
      @php  $url_type = "topstory"; @endphp
      @elseif($slider->promoted == 1 && $slider->top_story!=1)
      @php  $url_type = "promoted"; @endphp
      @elseif($slider->top_story ==1 && $slider->promoted==1)
      @php  $url_type = "promoted"; @endphp
      @else
      @endif
      @if($slider->id ==$pro_ids['0'])    
      {{-- @if (isset($next)) --}}
      <?php
         $pro_index = $pro_ids['1'];
         $next =  "$url_type/$pro_index/details";
         ?>
      <div class="col-6 text-right">
         {{-- @if(session()->has('last_next') && session()->get('last_next') != $top_story->id ) --}}
         <a href="{{ url($next) }}">
            <div style="color:red;">Next</div>
         </a>
      </div>
      {{-- @endif --}}
      @elseif($slider->id == $pro_ids[count($pro_ids)-1])
      <?php 
         $cout=count($pro_ids)-2;
         $pre_index =$pro_ids[$cout];
          $prev = "$url_type/$pre_index/details"; 
         ?>
      <div class="col-6">
         {{-- @if(session()->has('first_prev') && session()->get('first_prev') != $top_story->id ) --}}
         <a href="{{ url($prev) }}">
            <div style="color: red;"> Previous</div>
         </a>
         {{-- @endif --}}
      </div>
      @else
      <?php
         for($i=0; $i<count($pro_ids); $i++){
             if($pro_ids[$i] == $slider->id){
                 $pre_index_val =$pro_ids[$i+1];
                 $next = "$url_type/$pre_index_val/details";   
                  $prev_val =$pro_ids[$i-1];
                 $prev_u = "$url_type/$prev_val/details";     
             ?>
      <div class="col-6">
         <a href="{{ url($prev_u) }}"  class="prev_current">
            <div style="color:red;">Previous</div>
         </a>
      </div>
      <div class="col-6 text-right">
         <a href="{{ url($next) }}" class="next_cur">
            <div style="color:red;">Next</div>
         </a>
      </div>
      <?php    
         }
         }
         
         ?>       
      @endif
   </div>
</div>
<!-- detail page main section -->
<section class="md_hg">
   <div class="container">
      <div class="row">
         <div class="col-md-5">
            <div class="md_left">
               <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$slider->id}}" data-type="top_story" class="news_pdf_icons {{in_array($slider->id,$btopstory)?'active':''}}" style="right:10px">
               <?php 
                  if(strpos("$slider->content_image","https")!==false)
                  {
                  
                  ?>  
               <img src="{{ !empty($slider->content_image) ? asset($slider->content_image) :  asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy ">  
               <?php }else{ ?>
               <img src="{{ !empty($slider->content_image) ? asset('storage/'.$slider->content_image) :  asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy ">
               <?php } ?>
            </div>
         </div>
         <div class="col-md-7">
            <div class="heading_share_icon">
               <h1 class="md_hg_heading">{{$slider->title}}</h1>
               <div class="sv_icons_right">
                  <div class="video_icon_right">
                     {{-- <img src="{{ asset('assets/frontend/img/playy.png') }}"> --}}
                     <img id="pause-text" src="{{ asset('assets/frontend/img/playy.png') }}">
                     <img id="play-text" src="{{ asset('assets/frontend/img/play-text.png') }}" style="display: none;" width="40" height="40">
                     <input type="hidden" id="text" value="{{$slider->short_description}}."></input>
                  </div>
                  <div class="share_icon_right">
                     <img src="{{ asset('assets/frontend/img/icon-share.png') }}" data-toggle="modal" data-target="#socialModal">
                     @php 
                     $contentURL = asset('blog/'.$slider->id.'/details');
                     @endphp
                  </div>
               </div>
            </div>
            <ul class="source_date mt-4">
               <li class="sd_list">{{$slider->blog_category->name}}</li>
               <li class="sd_list">|</li>
               <li class="sd_list">{{date('d-m-Y', strtotime($slider->created_at))}}</li>
            </ul>
            <div class="md_text_start">
               <!-- <h2 class="mdtext_heading">Information</h2> -->
               <p class="md_text_detail">{{$slider->short_description}}</p>
               <!--  <p class="md_text_detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupitat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
            </div>
            <div class="magazine_d_price">{{to_price($slider->price, true)}}</div>
            <!--  <div class="buttons_group">
               <button class="md_readthis">Read This Now</button>
               <button class="md_download">Read Now</button>
               </div>
               <div class="premium_icon"><img src="img/icon-premium.png" alt=""> Premium Edition</div> -->
         </div>
      </div>
   </div>
</section>
<!-- Related  -->
@if($slider->promoted == 1)
@if(count($relatedPromoted) >0)
<div class="container">
   <div class="heading_arrow_group">
      <h1 class="common_heading">Related Promoted Content</h1>
      {{--     <a href="{{url("related/magazines/$magDetails->id/listing")}}"><img src="{{ asset('assets/frontend/img/icon-next.png') }}" alt=""></a> --}}
   </div>
   <section class="regular slider promoted_slider">
      @foreach($relatedPromoted as $promoted)
      <div>
         <div class="inner_content">
            <a class="promoted_image" href="{{url("promoted/$promoted->id/details")}}">
            <?php 
               if(strpos("$promoted->content_image","https")!==false)
               {
               
               ?>  
            <img src="{{ !empty($promoted->content_image) ? asset($promoted->content_image) :  asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy " referrerpolicy="no-referrer">
            <?php }else{ ?>
            <img src="{{ !empty($promoted->content_image) ? asset("storage/".$promoted->content_image) :  asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy " referrerpolicy="no-referrer">
            <?php } ?>
            {{--  <img src="{{ asset($storyDatas->content_image) }}" class="img-fluid lazy "> --}}
            </a>
            <div class="box_content">
               <p class="p_gamename">{{$promoted->blog_category->name}}</p>
               <p class="p_gameheading">{{$promoted->title}}</p>
               <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                  {{$promoted->created_at->format('d-m-Y')}}
               </div>
            </div>
         </div>
      </div>
      @endforeach
   </section>
</div>
@endif
@else
@if(count($relatedTop)>0)
<div class="container">
   <div class="heading_arrow_group">
      <h1 class="common_heading">Related Top Stories</h1>
      {{--     <a href="{{url("related/magazines/$magDetails->id/listing")}}"><img src="{{ asset('assets/frontend/img/icon-next.png') }}" alt=""></a> --}}
   </div>
   <section class="regular slider promoted_slider">
      @foreach($relatedTop as $top_story)
      <div>
         <div class="inner_content">
            <a  class="promoted_image" href="{{url("topstory/$top_story->id/details")}}">
            <?php 
               if(strpos("$top_story->content_image","https")!==false)
               {
               
               ?>  
            <img src="{{ !empty($top_story->content_image) ? asset($top_story->content_image) :  asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy " referrerpolicy="no-referrer">
            <?php }else{ ?>
            <img src="{{ !empty($top_story->content_image) ? asset("storage/".$top_story->content_image) :  asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy " referrerpolicy="no-referrer">
            <?php } ?>
            {{--  <img src="{{ asset($top_story->content_image) }}" class="img-fluid lazy "> --}}
            </a>
            {{-- <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon"> --}}
            {{-- 
            <div class="newspaper_name">{{$top_story->title}}</div>
            --}}
            <div class="box_content">
               <p class="p_gamename">{{$top_story->blog_category->name}}</p>
               <p class="p_gameheading">{{$top_story->title}}</p>
               <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                  {{$top_story->created_at->format('d-m-Y')}}
               </div>
            </div>
         </div>
      </div>
      @endforeach
   </section>
</div>
@endif
@endif
@include('customer.pages.social')
@endsection