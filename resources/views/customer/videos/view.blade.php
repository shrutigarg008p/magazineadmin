@extends('layouts.customer')
@section('title', 'Video - #'.$video->id)
@section('meta_description', $video->title)
@if ($video->thumbnail_image)
    @section('meta_image', asset("storage/{$video->thumbnail_image}"))
@endif

@section('content')
    <div class="container">
        <div class="tabnews_tabs">
            <div class="main_page_heading">
                <img src="img/icon-prev.png" alt="">
            </div>
            <div id="appads" class="tabcontent">
                <div class="heading_arrow_group">
                    <h1 class="common_heading">{{$video->title}}</h1>
                </div>
                
                <div class="d-flex align-items-center justify-content-center w-100 mb-4" style="height:480px;">
                    <iframe id="video_url" class="w-100 h-100" style="max-width:640px;" src="{{$video->video_link}}" frameborder="0"></iframe>
                </div>
            </div>

        </div>
    </div>

      <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

<script type="text/javascript">
    
    $(document).ready(function(){
     video_url = "{{$video->video_link}}";
     // alert(video_url);
     
     let newURL = video_url.replace("watch?v=", "embed/");
     $('#video_url').attr('src',newURL+'?autoplay=1');
 
 });

</script>
@endsection


