<div class="container mb-2">
@if(!empty($data['magazines']) || !empty($data['newspaper']) || !empty($data['popular_content']) || !empty($data['top_story']))
@if(!empty($data['magazines']))
  <div class="heading_arrow_group">
      @if(!empty($data['magazines']))
      <h1 class="common_heading">Magazines</h1>
      @endif
  </div>
<section class="regular slider search_magazine_slider">
    @foreach ($data['magazines'] as $val) 
    <div>
        <div class="inner_content">
             @if($val['type']=='magazine')
            <a  href="{{asset('magazine/'.$val['id'].'/details')}}"><img src="{{$val['cover_image']}}" data-id="{{$val['id']}}" class="img-fluid lazy  "></a>
             <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$val['id']}}" data-type="magazine" class="news_pdf_icon {{in_array($val['id'],$bmags)?'active':''}}">
            @endif
            <div class="newspaper_name">{{$val['title']}}</div>
        </div>
    </div>
    @endforeach
</section>
@endif
</div>



<div class="container mb-2">
@if(!empty($data['newspaper']) )

  <div class="heading_arrow_group">
        @if(!empty($data['newspaper']))
        <h1 class="common_heading">Newspapers</h1>
        @endif
    </div>
  <section class="regular slider search_newspaper_slider">    
    @foreach ($data['newspaper'] as $val) 
    <div>
        <div class="inner_content">
            @if($val['type']=='newspaper')
            <a  href="{{asset('newspapers/'.$val['id'].'/details')}}"><img src="{{$val['cover_image']}}" data-id="{{$val['id']}}" class="img-fluid lazy  mag"></a>
             <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$val['id']}}" data-type="newspaper" class="news_pdf_icon {{in_array($val['id'],$bnews)?'active':''}}">
         
            @endif
            
            <div class="newspaper_name">{{$val['title']}}</div>
        </div>
    </div>
    @endforeach

  {{--  <div class="heading_arrow_group">
      @if(!empty($data['top_story']))
        <h1 class="common_heading">Top Stories</h1>
      @endif
    </div>

    @foreach ($data['top_story'] as $val) 
    <div>
        <div class="inner_content">
            @if($val['top_story']=='1')
              <a  href="{{asset('topstory/'.$val['id'].'/details')}}">
                @if(strpos("$val->content_image","https")!==false)
                <img src="{{ !empty($val->content_image) ?  asset($val->content_image) : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
                @else       
                  <img src="{{ !empty($val->content_image) ? asset("storage/".$val->content_image) : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
                @endif
              </a>
            @endif
            <div class="newspaper_name">
               @foreach($val['blog_category'] as $blog)
                <p class="p_gamename">{{$blog['name']}}</p>
                @endforeach

            {{$val['title']}}
            <img src="{{ asset('assets/frontend/img/calender.png') }}"> {{$val->created_at->format('d-m-Y')}}
          </div>
        </div>
    </div>
    @endforeach

   <div class="heading_arrow_group">
        @if(!empty($data['popular_content']))
        <h1 class="common_heading">Promoted Content</h1>
        @endif
    </div>

    @foreach ($data['popular_content'] as $val) 
    <div>
        <div class="inner_content">
            @if($val['promoted']=='1')
              <a  href="{{asset('promoted/'.$val['id'].'/details')}}">
               @if(strpos("$val->content_image","https")!==false)
              <img src="{{ !empty($val->content_image) ?  asset($val->content_image) : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
              @else         
                <img src="{{ !empty($val->content_image) ? asset("storage/".$val->content_image) : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
              @endif
              </a>
            @endif  
            <div class="newspaper_name">
               @foreach($val['blog_category'] as $blog)
                <p class="p_gamename">{{$blog['name']}}</p>
                @endforeach
            {{$val['title']}}
            <img src="{{ asset('assets/frontend/img/calender.png') }}"> {{$val->created_at->format('d-m-Y')}}
          </div>
        </div>
    </div>
    @endforeach --}}    
</section>
@endif
</div>


<div class="container mb-2">
@if(!empty($data['top_story']))

   <div class="heading_arrow_group">
      @if(!empty($data['top_story']))
        <h1 class="common_heading">Top Stories</h1>
      @endif
    </div>
<section class="regular slider search_stories_slider">
    @foreach ($data['top_story'] as $val) 
    <div>
        <div class="inner_content">
            @if($val['top_story']=='1')
            <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$val['id']}}" data-type="top_story" class="news_pdf_icons {{in_array($val['id'],$btopstory)?'active':''}}">
              <a  href="{{asset('topstory/'.$val['id'].'/details')}}">
                @if(strpos("$val->content_image","https")!==false)
                <img src="{{ !empty($val->content_image) ?  asset($val->content_image) : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
                @else       
                  <img src="{{ !empty($val->content_image) ? asset("storage/".$val->content_image) : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
                @endif
              </a>
            @endif

              <div class="box_content">
               @foreach($val['blog_category'] as $blog)
                    <p class="p_gamename">{{$blog['name']}}</p>
                      @endforeach
                    <p class="p_gameheading"> {{$val['title']}}</p>
                    <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                        {{$val->created_at->format('d-m-Y')}}</div>
              </div>
           {{--  <div class="newspaper_name">
               @foreach($val['blog_category'] as $blog)
                <p class="p_gamename">{{$blog['name']}}</p>
              @endforeach
            {{$val['title']}}
            <img src="{{ asset('assets/frontend/img/calender.png') }}"> {{$val->created_at->format('d-m-Y')}}
          </div> --}}
        </div>
    </div>
    @endforeach
</section>
@endif
</div>


<div class="container mb-2">
@if(!empty($data['popular_content']))
 <div class="heading_arrow_group">
        @if(!empty($data['popular_content']))
        <h1 class="common_heading">Promoted Content</h1>
        @endif
    </div>
<section class="regular slider search_promoted_slider">
    @foreach ($data['popular_content'] as $val) 
    <div>
        <div class="inner_content">
            @if($val['promoted']=='1')
            <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$val['id']}}" data-type="popular_content" class="news_pdf_icons {{in_array($val['id'],$bpromoted)?'active':''}}">
              <a  href="{{asset('promoted/'.$val['id'].'/details')}}">
               @if(strpos("$val->content_image","https")!==false)
              <img src="{{ !empty($val->content_image) ?  asset($val->content_image) : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
              @else         
                <img src="{{ !empty($val->content_image) ? asset("storage/".$val->content_image) : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
              @endif
              </a>
            @endif  

            <div class="box_content">
               @foreach($val['blog_category'] as $blog)
                    <p class="p_gamename">{{$blog['name']}}</p>
                      @endforeach
                    <p class="p_gameheading"> {{$val['title']}}</p>
                    <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                        {{$val->created_at->format('d-m-Y')}}</div>
                </div>

            {{-- <div class="newspaper_name">
               @foreach($val['blog_category'] as $blog)
                <p class="p_gamename">{{$blog['name']}}</p>
                @endforeach
            {{$val['title']}}
            <img src="{{ asset('assets/frontend/img/calender.png') }}"> {{$val->created_at->format('d-m-Y')}}
          </div> --}}
        </div>
    </div>
    @endforeach
</section>
@endif
@else
<div class="all_magazines data_not_found"> 
    <h3 class="search_msg" style="text-align:center;margin-left:336px">Data not found for you search</h3>
</div>
@endif
</div>


<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
  

        /*search newspaper slider*/
        
         $(".search_magazine_slider").slick({
             infinite: true,
             slidesToShow: 6,
             slidesToScroll: 4,
             responsive: [
         {
           breakpoint: 991,
           settings: {
             slidesToShow: 3,
             slidesToScroll: 3,
             infinite: true
           }
         },
         {
           breakpoint: 767,
           settings: {
             slidesToShow: 3,
             slidesToScroll: 3,
           }
         },
         {
           breakpoint: 480,
           settings: {
             slidesToShow: 3,
             slidesToScroll: 3
           }
         }
         // You can unslick at a given breakpoint now by adding:
         // settings: "unslick"
         // instead of a settings object
         ]
        }); 


           $(".search_newspaper_slider").slick({
             infinite: true,
             slidesToShow: 6,
             slidesToScroll: 4,
             responsive: [
         {
           breakpoint: 991,
           settings: {
             slidesToShow: 3,
             slidesToScroll: 3,
             infinite: true
           }
         },
         {
           breakpoint: 767,
           settings: {
             slidesToShow: 3,
             slidesToScroll: 3,
           }
         },
         {
           breakpoint: 480,
           settings: {
             slidesToShow: 3,
             slidesToScroll: 3
           }
         }
         // You can unslick at a given breakpoint now by adding:
         // settings: "unslick"
         // instead of a settings object
         ]
        }); 


          $(".search_stories_slider").slick({
             infinite: true,
             slidesToShow: 3,
             slidesToScroll: 3,
             responsive: [
         {
           breakpoint: 991,
           settings: {
             slidesToShow: 2,
             slidesToScroll: 2,
             infinite: true
           }
         },
         {
           breakpoint: 767,
           settings: {
             slidesToShow: 2,
             slidesToScroll: 2,
           }
         },
         {
           breakpoint: 575,
           settings: {
             slidesToShow: 2,
             slidesToScroll: 2
           }
         }
         
         // You can unslick at a given breakpoint now by adding:
         // settings: "unslick"
         // instead of a settings object
         ]
        });


          $(".search_promoted_slider").slick({
             infinite: true,
             slidesToShow: 3,
             slidesToScroll: 3,
             responsive: [
         {
           breakpoint: 991,
           settings: {
             slidesToShow: 2,
             slidesToScroll: 2,
             infinite: true
           }
         },
         {
           breakpoint: 767,
           settings: {
             slidesToShow: 2,
             slidesToScroll: 2,
           }
         },
         {
           breakpoint: 575,
           settings: {
             slidesToShow: 2,
             slidesToScroll: 2
           }
         }
         
         // You can unslick at a given breakpoint now by adding:
         // settings: "unslick"
         // instead of a settings object
         ]
        });



</script>


