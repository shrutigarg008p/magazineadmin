@extends('layouts.customer')
@section('title', 'Podcasts')

@section('content')
<section class="breadcrumb_group">

<div class="container">
    <ul class="breadcrumb">
        <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
        <li class="breadcrumb_list">></li>
        <li class="breadcrumb_list">Podcasts</li>
        {{-- <li class="breadcrumb_list">></li> --}}
        <li class="breadcrumb_list">{{$category_details->name ?? null}}</li>
    </ul>
</div>
</section>
    <div class="container">
      <div class="tabnews_tabs">
       {{--  <div class="main_page_heading">
          <img src="img/icon-prev.png" alt="">
        
        </div> --}}
        <div class="tab">
          <!-- <button class="tabnews_links" onclick="openCity(event, 'appads')" id="defaultOpen">Magazine</button>
          <button class="tabnews_links" onclick="openCity(event, 'webads')">Newspaper</button> -->
        </div>
        <div id="appads" class="tabcontent">
          <div class="heading_arrow_group">
            <h1 class="common_heading">Podcasts</h1>
          </div>
          <div class="heading_arrow_group heading_bg_light">
            {{-- <h1 class="common_heading">NewsPaper</h1> --}}
          </div>
          <div class="tabnews_block">
            
            @foreach($pod_datas as $podDatas)
            <div class="tabnews_inner">
           <div class="podcast_box">
                <div style="display:none">{{asset('storage/'.$podDatas->podcast_file)}}</div>
           
                @if(Auth::user())
                <div class="podcast_left">
                    <div class="play-btn"><img src="{{ asset('assets/frontend/img/pause.png/')}}" width="45" height="45"></div>
                    <div class="pause-btn" style="display:none"><img src="{{ asset('assets/frontend/img/play.png/')}}"width="45" height="45"></div>
                    <img src="{{ asset('storage/'.$podDatas->thumbnail_image) }}" class="img-fluid lazy ">
                </div>
                @else
                <a href="{{route('login')}}">
                <div class="podcast_left closepodcast">
                    <div class="play-btn"><img src="{{ asset('assets/frontend/img/pause.png/')}}" width="45" height="45"></div>
                    {{-- <div class="pause-btn" style="display:none"><img src="http://127.0.0.1:8000/assets/frontend/img/play.png"width="45" height="45"></div> --}}
                    <img src="{{ asset('storage/'.$podDatas->thumbnail_image) }}" class="img-fluid lazy ">
                </div>
                </a>
                @endif
              

                <div class="podcast_content">
                    {{-- <div class="podcast_heading" style="display:none">{{$podDatas->id}}</div> --}}

                    <div class="podcast_heading">
                        <div style="display:none">{{$podDatas->id}}</div>

                        {{-- {{$podDatas->title}}  --}}
                         <img src="{{ asset('assets/frontend/img/icon-share.png') }}" class="share_pod_url pod_share" data-toggle="modal" data-target="#socialPodcastModal" >
                    </div>
                    
                    {{--  <img src="{{ asset('assets/frontend/img/icon-share.png') }}" class="share_pod_url" data-toggle="modal" data-target="#socialPodcastModal" style=" width: 27px; margin: -28px -10px 18px 16px;"> --}}
                 
                </div>
            </div>
                 
              <div class="tabnews_textgroup">
                <div class="tabnews_name">{{$podDatas->title}}</div>
               
              </div>
            </div>
            @endforeach
           
          </div>
        </div>
        
      </div>
    </div>
    <!-- Modal HTML -->
    <div id="vidModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title">YouTube Video</h5> -->
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="cartoonVideo" class="embed-responsive-item" width="160" height="115" src="" allowfullscreen allow="autoplay"></iframe>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <audio class="audiotag" id="audiotag" src="http://127.0.0.1:8000/storage/podcasts/HDjT2gHlBRhIyDKcmuA0E4PLQNGteVvsyY6LLYPz.mp3" preload="auto"></audio>
  {{--    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        
         $(document).on('click','.podcast_left',function(){
         var audioval = $(this).prev().html();
         var audio = document.getElementById('audiotag');
         audio.pause();
       
          if($(this).children().first().next().is(':visible') == true ){
             audio.pause();
             $('.play-btn').css('display','block');
              $('.pause-btn').css('display','none');
          }
         else{
             // alert('if');
             // alert(audio.played);
             $('#audiotag').attr('src',audioval);
             audio.play();
             $('.play-btn').css('display','block');
             $('.pause-btn').css('display','none');
             $(this).children().first().css('display','none');
             $(this).children().first().next().css('display','block'); 
         
         }
        
         
         });
            $(document).on('click','.closepodcast',function(){
                // alert();
                window.location="{{route('login')}}";
            });
      </script>
  </body>
</html> --}}
 @include('customer.pages.socialpodcast')

@endsection