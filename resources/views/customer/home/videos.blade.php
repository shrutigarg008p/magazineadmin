<div class="container">
    <div class="heading_arrow_group">
        <a href="{{ url('videos/listing') }}">
            <h1 class="common_heading link_list">Videos</h1>
        </a>
        <a href="{{ url('videos/listing') }}"><img src="{{ asset('assets/frontend/img/icon-next') }}.png"
                alt=""></a>
    </div>
    <section class="regular slider  videos_slider">
        @foreach ($videos as $video)
            @php
                $video_url = '';
                
                preg_match('/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i', $video->video_link, $matches);
                
                if (!empty($matches) && isset($matches[2])) {
                    $video_url = '//www.youtube.com/embed/' . $matches[2];
                }
            @endphp

            <div>
                <div style="display:none">{{ $video_url }}</div>
                @if (Auth::user())
                    <div class="video_box">
                        <img src="{{ asset('storage/' . $video->thumbnail_image) }}" class="img-fluid lazy ">
                    </div>
                    <div style="display:none">{{ $video->id }}</div>
                @else
                    <a href="{{ route('login') }}">
                        <div class="video_box closevideo">
                            <img src="{{ asset('storage/' . $video->thumbnail_image) }}" class="img-fluid lazy ">
                        </div>
                    </a>
                @endif

                <div class="video_content">
                    <p class="p_gameheading">{{ $video->title }}</p>
                </div>

            </div>
        @endforeach

    </section>
</div>
<!-- Modal HTML -->
<div id="vidModal" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">YouTube Video</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="share_icon_right share_vid">

                    <img src="{{ asset('assets/frontend/img/icon-share.png') }}" class="share_url" data-toggle="modal"
                        data-target="#socialModal">

                </div>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="cartoonVideo" class="embed-responsive-item" width="160" height="115" src=""
                        allowfullscreen allow="autoplay"></iframe>
                    <span id="vid_id" style="display:none"></span>
                </div>
            </div>
        </div>
    </div>
</div>
@include('customer.pages.socialurl')
