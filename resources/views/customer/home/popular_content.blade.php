<div class="container">
    @if(count($promoted_content) > 0)
    <div class="heading_arrow_group">
        <a href="{{url('promoted')}}">
        <h1 class="common_heading link_list">Promoted Content</h1>
        </a>
        <a href="{{url('promoted')}}"><img src="{{ asset('assets/frontend/img/icon-next.png') }}" alt=""></a>
    </div>@endif
    <section class="regular slider promoted_slider">
         @foreach($promoted_content as $blogDatas)
        <div>
            <div class="inner_content">

                <a  class="promoted_image" href="{{url("promoted/$blogDatas->id/details")}}">

                    @if ( strpos($blogDatas->content_image,"https") !== false )
                        <img src="{{ $blogDatas->content_image }}" class="img-fluid lazy " referrerpolicy="no-referrer">
                    @else
                        <img src="{{ !empty($blogDatas->content_image) ? asset("storage/".$blogDatas->content_image) : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
                    @endif
                </a>

                <div class="box_content">
                    <a href="{{url("promoted/$blogDatas->id/details")}}">
                        <p class="p_gamename">{{$blogDatas->blog_category ? $blogDatas->blog_category->name : null}}</p>
                        <p class="p_gameheading">{{$blogDatas->title}}</p>
                    </a>
                </div>
                
            </div>

        </div>   
        @endforeach
    </section>
</div>
