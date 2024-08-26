<div class="container">
    <div class="heading_arrow_group">
        <a href="{{url('podcasts/listing')}}">
        <h1 class="common_heading link_list">Podcasts</h1>
    </a>
        <a href="{{url('podcasts/listing')}}"><img src="{{ asset('assets/frontend/img/icon-next') }}.png" alt=""></a>
    </div>
    <section class="regular slider podcast_slider mb-4">
       {{--  @foreach($podcasts as $podcastsDatas)
        <div>
            <div class="podcast_box">
                <div style="display:none">{{asset('storage/'.$podcastsDatas->podcast_file)}}</div> --}}
                {{-- <div class="podcast_left"> --}}
                {{-- comment on 2dec for play morr than one video --}}
               {{--  <div class="song">
                  <div class="sound">
                    <i class="icon fas fa-volume-mute pause-btn" aria-hidden="true"></i>
                  </div>
                  <div>
                    <div class="play-btn">Play</div>
                  </div>
                  <audio class="audio" src="{{asset('storage/'.$podcastsDatas->podcast_file)}}" preload="auto"></audio>
                </div> --}}
                {{-- end --}}
                    {{-- <div class="play-btn"><img src="http://127.0.0.1:8000/assets/frontend/img/icon-play.png"></div>
                    <div class="pause-btn">Pause</div>
                    <audio  id="audio"  src="{{asset('storage/'.$podcastsDatas->podcast_file)}}" autoplay="false" ></audio> --}}

                    {{-- <img src="{{ asset('storage/'.$podcastsDatas->thumbnail_image) }}" class="img-fluid lazy ">
                </div>
                <div class="podcast_content"> --}}
                    {{-- <div class="podcast_heading">{{$podcastsDatas->title}}</div> --}}
                    {{-- <div class="prog_bg">
                        <div class="prog_main"></div>
                    </div> --}}
             {{--    </div>
            </div>
        </div>
        @endforeach --}}
        @foreach($podcasts as $podcastsDatas)
         <div>
            <div class="podcast_box">
                <div style="display:none">{{asset('storage/'.$podcastsDatas->podcast_file)}}</div>
                @if(Auth::user())
                <div class="podcast_left">
                    <div class="play-btn"><img src="{{ asset('assets/frontend/img/pause.png/')}}" width="45" height="45"></div>
                    <div class="pause-btn" style="display:none"><img src="{{ asset('assets/frontend/img/play.png/')}}"width="45" height="45"></div>
                    <img src="{{ asset('storage/'.$podcastsDatas->thumbnail_image) }}" class="img-fluid lazy ">
                </div>
                @else
                <a href="{{route('login')}}">
                <div class="podcast_left closepodcast">
                    <div class="play-btn"><img src="{{ asset('assets/frontend/img/pause.png/')}}" width="45" height="45"></div>
                    {{-- <div class="pause-btn" style="display:none"><img src="http://127.0.0.1:8000/assets/frontend/img/play.png"width="45" height="45"></div> --}}
                    <img src="{{ asset('storage/'.$podcastsDatas->thumbnail_image) }}" class="img-fluid lazy ">
                </div>
                </a>
                @endif

                <div class="podcast_content">
                    <div class="podcast_heading">
                        <div style="display:none">{{$podcastsDatas->id}}</div>

                        {{-- {{$podcastsDatas->title}}  --}}
                         <img src="{{ asset('assets/frontend/img/icon-share.png') }}" class="share_pod_url pod_share" data-toggle="modal" data-target="#socialPodcastModal" >
                    </div>
                    
                    {{-- <div class="prog_bg">
                        <div class="prog_main"></div>
                    </div> --}}
                </div>
            </div>
              <div class="tabnews_textgroup podcasts">
                <div class="tabnews_name">{{$podcastsDatas->title}}</div>
               
              </div>
        </div>
        @endforeach
        
    </section>
</div>
<audio class="audiotag" id="audiotag" src="http://127.0.0.1:8000/storage/podcasts/HDjT2gHlBRhIyDKcmuA0E4PLQNGteVvsyY6LLYPz.mp3" preload="auto"></audio>
 @include('customer.pages.socialpodcast')

