<div class="container">
     @if(count($top_story) > 0)
    <div class="heading_arrow_group">
        <a href="{{url('topstory')}}">
        <h1 class="common_heading link_list">Top Stories</h1></a>
        <a href="{{url('topstory')}}"><img src="{{ asset('assets/frontend/img/icon-next') }}.png" alt=""></a>
    </div>@endif
    <section class="regular slider promoted_slider stories_slider">
        @foreach($top_story as $storyDatas)
        <div>

            <div class="inner_content">

                <a  class="promoted_image" href="{{url("promoted/$storyDatas->id/details")}}">

                    @if ( strpos($storyDatas->content_image,"https") !== false )
                        <img src="{{ $storyDatas->content_image }}" class="img-fluid lazy " referrerpolicy="no-referrer">
                    @else
                        <img src="{{ !empty($storyDatas->content_image) ? asset("storage/".$storyDatas->content_image) : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
                    @endif
                </a>

                <div class="box_content">
                    <a href="{{url("promoted/$storyDatas->id/details")}}">
                        <p class="p_gamename">{{$storyDatas->blog_category ? $storyDatas->blog_category->name : ''}}</p>
                        <p class="p_gameheading">{{$storyDatas->title}}</p>
                    </a>
                </div>
                
            </div>

        </div>
        @endforeach
    </section>
</div>
