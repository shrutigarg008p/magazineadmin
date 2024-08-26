<div class="container" style="display:none">
    <div class="heading_arrow_group">
        <h1 class="common_heading">Topics to Follow</h1>
        <a href="{{url('tags/listing')}}"><img src="{{ asset('assets/frontend/img/icon-next.png') }}" alt=""></a>
    </div>
    <section class="topics_follow follow_slider"> 
        @foreach($tags as $tagDatas)
        @if(Auth::user())
        <a class= "follow_image" href="{{url("tags/$tagDatas->id/details")}}" class="topics_tf_btn">
            {{$tagDatas->name}}
        </a>
        @else
        <a class= "follow_image" href="{{route('login')}}" class="topics_tf_btn">
            {{$tagDatas->name}}
        </a>
        @endif
        @endforeach
       {{--  <a href="" class="topics_tf_btn">
            Nemo enim ipsam volm
        </a>
        <a href="" class="topics_tf_btn">
            Quis autem vel
        </a>
        <a href="" class="topics_tf_btn">
            Quis aum vel eum iure
        </a>
        <a href="" class="topics_tf_btn">
            Ut enim minma veniam
        </a>
        <a href="" class="topics_tf_btn">
            Excepteur
        </a>
        <a href="" class="topics_tf_btn">
            Quis autem vel
        </a>
        <a href="" class="topics_tf_btn">
            Quis aum vel eum iure
        </a>
        <a href="" class="topics_tf_btn">
            Nemo enim ipsam volm
        </a>
        <a href="" class="topics_tf_btn">
            Excepteur
        </a>
        <a href="" class="topics_tf_btn">
            Sed ut perspiciatis
        </a>
        <a href="" class="topics_tf_btn">
            Ut enim minma veniam
        </a> --}}
    </section>
</div>
