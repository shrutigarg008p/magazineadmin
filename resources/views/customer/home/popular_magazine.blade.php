<div class="container">
    @if(count($mags)>0)
    <div class="heading_arrow_group">
        <a href="{{route('magazines')}}">
        <h1 class="common_heading link_list">Magazines</h1>
    </a>
        {{-- <a href="{{url('magazines/listing')}}"><img src="{{ asset('assets/frontend/img/icon-next.png') }}" alt=""></a> --}}
        <a href="{{route('magazines')}}"><img src="{{ asset('assets/frontend/img/icon-next.png') }}" alt=""></a>

    </div>@endif
    <section class="regular slider newspaper_slider magazine_slider">
        @foreach($mags as $magsDatas)
        <div>
            <div class="inner_content">
                @if(Auth::user())
                <a class="magazine_image" href="{{url("magazine/$magsDatas->id/details")}}"><img src="{{ asset('storage/'.$magsDatas->cover_image) }}" data-id="{{$magsDatas->id}}" class="img-fluid lazy  mag"></a>
               {{--  <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$magsDatas->id}}" data-type="magazine" class="news_pdf_icon {{in_array($magsDatas->id,$bmags)?'active':''}}"> --}}
                @elseif($magsDatas->is_free==0)
                <a class="magazine_image" href="{{url("magazine/$magsDatas->id/details")}}"><img src="{{ asset('storage/'.$magsDatas->cover_image) }}" data-id="{{$magsDatas->id}}" class="img-fluid lazy  mag"></a>
                {{-- <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$magsDatas->id}}" data-type="magazine" class="news_pdf_icon {{in_array($magsDatas->id,$bmags)?'active':''}}"> --}}
                @else
                <a class="magazine_image" href="{{route("login")}}"><img src="{{ asset('storage/'.$magsDatas->cover_image) }}" data-id="{{$magsDatas->id}}" class="img-fluid lazy  mag"></a>
                <a class="magazine_image" href="{{route("login")}}">
                {{-- <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon"> --}}
                </a>
                @endif
                
                <div class="newspaper_name">{{$magsDatas->title}}</div>
            </div>
        </div>
        @endforeach
        
    </section>
</div>
