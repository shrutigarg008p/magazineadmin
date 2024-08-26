@extends('layouts.customer')
@section('title', 'Videos')

@section('content')
    <div class="container">
        <div class="tabnews_tabs">
            <div class="main_page_heading">
                <img src="img/icon-prev.png" alt="">

            </div>
            <div class="tab">
                <!-- <button class="tabnews_links" onclick="openCity(event, 'appads')" id="defaultOpen">Magazine</button>
                  <button class="tabnews_links" onclick="openCity(event, 'webads')">Newspaper</button> -->
            </div>
            <div id="appads" class="tabcontent">
                <div class="heading_arrow_group">
                    <h1 class="common_heading">Videos</h1>
                </div>
                <div class="heading_arrow_group heading_bg_light">
                    {{-- <h1 class="common_heading">NewsPaper</h1> --}}
                </div>
                <div class="tabnews_block">

                    @foreach ($all_videos as $video)
                        @php
                            $video_url = '';
                            
                            preg_match('/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i', $video->video_link, $matches);
                            
                            if (!empty($matches) && isset($matches[2])) {
                                $video_url = '//www.youtube.com/embed/' . $matches[2];
                            }
                        @endphp

                        <div class="tabnews_inner">
                            <div style="display:none">{{ $video_url }}</div>
                            <div class="video_box">
                                <img src="{{ asset('storage/' . $video->thumbnail_image) }}" class="img-fluid lazy ">
                            </div>
                            <div style="display:none">{{ $video->id }}</div>


                            <div class="tabnews_textgroup">
                                <div class="tabnews_name">{{ $video->title }}</div>
                                {{-- <div class="tabnews_names">{{ $video->created_at->format('Y-m-d') }}</div> --}}
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
                    <h5 class="modal-title">YouTube Video</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="share_icon_right share_vid" style="margin-left: 421px;">

                        <img src="{{ asset('assets/frontend/img/icon-share.png') }}" class="share_url" data-toggle="modal"
                            data-target="#socialModal">

                    </div>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe id="cartoonVideo" class="embed-responsive-item" width="160" height="115" src=""
                            allowfullscreen allow="autoplay"></iframe>
                        <span style="display: none;" id="vid_id"></span>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
         $(document).on('click','.video_box',function(){
             video_url = $(this).prev().html();
             
             let newURL = video_url.replace("watch?v=", "embed/");
         
             $('#cartoonVideo').attr('src',newURL+'?autoplay=1');
             $('#vidModal').modal('show');
         
         
         });
         
         $(document).on('click','.close',function(){
             $('#vidModal').hide();
              $("#cartoonVideo").attr('src', '');
         });
         $(document).on('click','.closevideo',function(){
             $('#vidModal').hide();
              window.location="{{route('login')}}";
         });
      </script>
  </body>
</html> --}}
    @include('customer.pages.socialurl')

@endsection
