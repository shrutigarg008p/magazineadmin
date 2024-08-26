@extends('layouts.customer')
@section('title', $blog->title)

@section('meta_description', $blog->short_description)
@if ($blog->thumbnail_image)
    @section('meta_image', asset("storage/{$blog->thumbnail_image}"))
@endif

@section('content')
<section class="breadcrumb_group">

<div class="container">
    <ul class="breadcrumb">
        <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
        <li class="breadcrumb_list">></li>
        <li class="breadcrumb_list">Promoted Content</li>
        @if ($promoted->title)
            <li class="breadcrumb_list">></li>
            <li class="breadcrumb_list">{{$promoted->title}}</li>
        @endif
    </ul>
</div>
</section>

 <div class="container">
    <div class="row mb-3">
        @php
            [$prev, $next] = $prev_next;
        @endphp
        <div class="col-6 text-right">

            @if ($prev)
            <a href="{{ route('promoted.detail',['blog' =>$prev]) }}">
                <div class="text-danger">Previous</div>
            </a>
            @endif
        </div>
        <div class="col-6 text-right">

            @if ($next)
            <a href="{{ route('promoted.detail',['blog' =>$next]) }}">
                <div class="text-danger">Next</div>
            </a>
            @endif
        </div>
    </div>

    <!-- detail page main section -->
    <section class="md_hg">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="md_left">
                            <img src="{{ asset('assets/frontend/img/pdf.png') }}" style="right: 9px;" data-id="{{$promoted->id}}" data-type="popular_content" class="news_pdf_icons {{in_array($promoted->id,$bpromoted)?'active':''}}">
                         <?php 
                        if(strpos("$promoted->content_image","https")!==false)
                        {

                        ?>  

                        <img src="{{ !empty($promoted->content_image) ? asset($promoted->content_image) :  asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy ">  
                           
                       <?php }else{ ?>
                        
                        <img src="{{ !empty($promoted->content_image) ? asset('storage/'.$promoted->content_image) :  asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy ">
                            
                        <?php } ?>
                        <!-- <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon"> -->
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="heading_share_icon">
                        <h1 class="md_hg_heading">{{$promoted->title}}</h1>
                        <div class="sv_icons_right">
                            <div class="video_icon_right">
                                  <img id="pause-text" src="{{ asset('assets/frontend/img/playy.png') }}">
                                  <img id="play-text" src="{{ asset('assets/frontend/img/play-text.png') }}" style="display: none;" width="40" height="40">
                                  <input type="hidden" id="text" value="{{$promoted->short_description}}."></input>
                            </div>
                        <div class="share_icon_right">
                         
                            <img src="{{ asset('assets/frontend/img/icon-share.png') }}" data-toggle="modal" data-target="#socialModal">
                            @php 
                                $contentURL = asset('promoted/'.$promoted->id.'/details');
                            @endphp
                        </div>
                    </div>
                    </div>
                    <ul class="source_date mt-4">
                        <li class="sd_list">{{$promoted->blog_category->name}}</li>
                        <li class="sd_list">|</li>
                        <li class="sd_list">{{date('d M,Y', strtotime($promoted->created_at))}}</li>
                        @if (isset($promoted->author) && $promoted->author)
                        <li class="sd_list">|</li>
                        <li class="sd_list d-block">By <span class="font-weight-bold">{{$promoted->author}}</span></li>
                        @endif
                    </ul>
                    @include('customer.topstory._content', ['resource' => $promoted])
                </div>
            </div>
        </div>
    </section>

     <!-- Related  -->
    @if(count($related)>0)
    <div class="container">
        <div class="heading_arrow_group">
            <h1 class="common_heading">Related Promoted Content</h1>
        {{--     <a href="{{url("related/magazines/$magDetails->id/listing")}}"><img src="{{ asset('assets/frontend/img/icon-next.png') }}" alt=""></a> --}}
        </div>
        <section class="regular slider promoted_slider">
            @foreach($related as $promoted)
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
                        {{$promoted->created_at->format('d-m-Y')}}</div>
                </div>
                </div>
            </div>
            @endforeach
        </section>
    </div>
    @endif
 @include('customer.pages.social')
@endsection






