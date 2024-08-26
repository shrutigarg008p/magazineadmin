@extends('layouts.customer')
@section('title', $blog->title)
@section('meta_description', $blog->short_description)
@if ($blog->thumbnail_image)
    @section('meta_image', asset("storage/app/public/{$blog->thumbnail_image}"))
@endif
<style>

a {
    color: white;
    text-decoration: none;
}

.social {
    position: relative;
    /* top: 20px; */
    display: none;
}

.social ul {
    padding: 0px;
    /* transform: translate(-100px,0); */
}
.social ul li {
    display: flex;
    margin: 5px;
    background: rgba(200, 158, 172, 0.5);
    width: 100px;
    text-align: right;
    padding: 10px;
    border-radius: 15px;
    transition: all 1.5s;
}
.shareIcon{
    position: absolute;
    top: 80px;
}
.share_icon_right:hover .social{
    display: block;
}
/* .social ul li:hover { */
    .share_icon_right:hover .social ul li{
    transform: translateY(0);
    background: #c44a73;
    transition: all 1.5s;
}

.social ul li:hover a {
    color: white;
}

.social ul li:hover i{
    color: #c44a73;
    background: white;
    /* transform: rotate(360deg); */
    transition: all 1.5s;
}

.social ul li i {
    margin-left: 10px;
    color: #000;
    background: white;
    padding: 10px;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    /* transform: rotate(0deg); */
    text-align: center;
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}


</style>
@section('content')
<section class="breadcrumb_group">
<div class="container">
    <ul class="breadcrumb">
        <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
        <li class="breadcrumb_list">></li>
        <li class="breadcrumb_list">Top Story</li>
        @if ($top_story->title)
            <li class="breadcrumb_list">></li>
            <li class="breadcrumb_list">{{$top_story->title}}</li>
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
                <a href="{{ route('topstory.detail',['blog' =>$prev]) }}">
                    <div class="text-danger">Previous</div>
                </a>
                @endif
            </div>
            <div class="col-6 text-right">

                @if ($next)
                <a href="{{ route('topstory.detail',['blog' =>$next]) }}">
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
                        <img src="{{ asset('assets/frontend/img/pdf.png') }}" style="right: 9px;" data-id="{{$top_story->id}}" data-type="top_story" class="news_pdf_icons {{in_array($top_story->id,$btopstory)?'active':''}}">
                         <?php 
                        if(strpos("$top_story->content_image","https")!==false)
                        {

                        ?>  

                        <img src="{{ !empty($top_story->content_image) ? asset($top_story->content_image) :  asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy ">  
                           
                       <?php }else{ ?>
                        
                        <img src="{{ !empty($top_story->content_image) ? asset('storage/'.$top_story->content_image) :  asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy ">
                            
                        <?php } ?>
                        <!-- <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon"> -->
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="heading_share_icon">
                        <h1 class="md_hg_heading">{{$top_story->title}}</h1>
                        <div class="sv_icons_right">
                            <div class="video_icon_right">
                                <img id="pause-text" src="{{ asset('assets/frontend/img/playy.png') }}">
                                <img id="play-text" src="{{ asset('assets/frontend/img/play-text.png') }}" width="40" height="40" style="display: none">
                                <input type="hidden" id="text" value="{{$top_story->short_description}}." />
                            </div>
                            <div class="share_icon_right text-center">
                                {{-- <button type="button" class="btn btn-primary mx-auto" data-toggle="modal" data-target="#exampleModal"> 
                                    Share on social media 
                                </button>  --}}
                                <img src="{{ asset('assets/frontend/img/icon-share.png') }}" data-toggle="modal" data-target="#socialModal">
                                @php 
                                    $contentURL = asset('topstory/'.$top_story->id.'/details');
                                @endphp
                                {{-- <div class="shareIcon">
                                    <nav class="social">
                                        <ul>
                                            <li>
                                                <a href="" onclick="sharePost('facebook',`{{asset('topstory/'.$top_story->id.'/details')}}`)"><i class="fa fa-facebook"></i>
                                                </a>
                                                <a href="" onclick="sharePost('whatsapp',`{{asset('topstory/'.$top_story->id.'/details')}}`)"><i class="fa fa-whatsapp"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <ul class="source_date mt-4">
                        <li class="sd_list">{{$top_story->blog_category->name}}</li>
                        <li class="sd_list">|</li>
                        <li class="sd_list">{{date('d M,Y', strtotime($top_story->created_at))}}</li>
                        @if (isset($top_story->author) && $top_story->author)
                        <li class="sd_list">|</li>
                        <li class="sd_list d-block">By <span class="font-weight-bold">{{$top_story->author}}</span></li>
                        @endif
                    </ul>
                    {{-- <div class="magazine_d_price">${{$top_story->price}}</div> --}}
                    @include('customer.topstory._content', ['resource' => $top_story])
                </div>
            </div>
        </div>
    </section>
    @if(count($related)>0)
    <div class="container">
        <div class="heading_arrow_group">
            <h1 class="common_heading">Related Top Stories</h1>
        {{--     <a href="{{url("related/magazines/$magDetails->id/listing")}}"><img src="{{ asset('assets/frontend/img/icon-next.png') }}" alt=""></a> --}}
        </div>
        <section class="regular slider promoted_slider">
            @foreach($related as $top_story)
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
                    {{-- <div class="newspaper_name">{{$top_story->title}}</div> --}}
                    <div class="box_content">
                    <p class="p_gamename">{{$top_story->blog_category->name}}</p>
                    <p class="p_gameheading">{{$top_story->title}}</p>
                    <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                        {{$top_story->created_at->format('d-m-Y')}}</div>
                </div>
                </div>
            </div>
            @endforeach
        </section>
    </div>
    @endif
    @include('customer.pages.social')
    
  @endsection






