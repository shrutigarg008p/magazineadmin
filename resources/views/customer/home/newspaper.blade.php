<div class="container">
    @if(count($news)>0)
    <div class="heading_arrow_group">
         <a class="link_list" href="{{url('newspapers/list')}}">
        <h1 class="common_heading link_list">Newspapers</h1>
    </a>
        {{-- <a href="{{url('newspapers/listing')}}"><img src="{{ asset('assets/frontend/img/icon-next.png') }}" alt=""></a> --}}
        <a href="{{url('newspapers/list')}}"><img src="{{ asset('assets/frontend/img/icon-next.png') }}" alt=""></a>

    </div>@endif
    <section class="regular slider newspaper_slider">
           @foreach($news as $newsDatas)
        <div>
            <div class="inner_content">
                @if(Auth::user() )
                <a class="newspaper_image" href="{{url("newspapers/$newsDatas->id/details")}}"><img src="{{ asset('storage/'.$newsDatas->cover_image) }}" data-id="{{$newsDatas->id}}" class="img-fluid lazy  news"></a>
               {{--  <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$newsDatas->id}}" data-type="newspaper" class="news_pdf_icon {{in_array($newsDatas->id,$bnews)?'active':''}}"> --}}
                @elseif($newsDatas->is_free==0 )
                 <a class="newspaper_image" href="{{url("newspapers/$newsDatas->id/details")}}"><img src="{{ asset('storage/'.$newsDatas->cover_image) }}" data-id="{{$newsDatas->id}}" class="img-fluid lazy  news"></a>
                {{-- <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$newsDatas->id}}" data-type="newspaper" class="news_pdf_icon {{in_array($newsDatas->id,$bnews)?'active':''}}"> --}}

                @else
                <a class="newspaper_image" href="{{route("login")}}"><img src="{{ asset('storage/'.$newsDatas->cover_image) }}" data-id="{{$newsDatas->id}}" class="img-fluid lazy  news"></a>
                <a href="{{route("login")}}">
                {{-- <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon"> --}}
               </a>
                @endif
                {{-- <img src="{{ asset('storage/'.$newsDatas->cover_image) }}" class="img-fluid lazy "> --}}
                
                <div class="newspaper_name">{{$newsDatas->title}}</div>
            </div>
        </div>
          @endforeach
    </section>
</div>
