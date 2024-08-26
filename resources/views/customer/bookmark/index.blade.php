@extends('layouts.customer')
@section('title', 'Bookmark')
@section('content')
<div class="container">
   @if(count($bookDatas)>0)  
   @foreach($bookDatas as $bookmarks)
   @if(($bookmarks['key'] == "magazine"))
   <div class="heading_arrow_group mt-5">
      <a href="{{route('magazines')}}">
         <h1 class="common_heading link_list">Magazines</h1>
      </a>
   </div>
   @endif
   @if(($bookmarks['key'] == "newspaper"))
   <div class="heading_arrow_group mt-5">
      <a href="{{url('newspapers/list')}}">
         <h1 class="common_heading">NewsPapers</h1>
      </a>
   </div>
   @endif
   @if(($bookmarks['key'] == "top_story"))
   <div class="heading_arrow_group mt-5">
      <a href="{{url('topstory')}}">
         <h1 class="common_heading">Top Stories</h1>
      </a>
   </div>
   @endif   
   @if(($bookmarks['key'] == "popular_content"))
   <div class="heading_arrow_group mt-5">
      <a href="{{url('promoted')}}">
         <h1 class="common_heading">Popular Content</h1>
      </a>
   </div>
   @endif 
   <section class="regular slider newspaper_slider bookmark_slider mb-4">
      @foreach($bookmarks['data'] as $book)
      <?php 
         $id = $book['id']  ; 
         $type = $book['bookmark_type'].'s';
         ?>
      <div>
         <div class="inner_content border">
            @if($book['bookmark_type'] == "magazine" || $book['bookmark_type'] == "newspaper")
            <a class="magazine_image bg-light border border-bottom-0 d-flex align-items-center justify-content-center" href="{{url("$type/$id/details")}}"><img src="{{ asset($book['cover_image']) }}" data-id="{{$id}}" class="img-fluid lazy  mag"></a>
            @if($book['bookmark_type'] == "newspaper")
            <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$id}}" data-type="{{$book['bookmark_type'] }}" class="news_pdf_icon {{in_array($id,$bnews)?'active':''}}">
            @else
            <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$id}}" data-type="magazine" class="news_pdf_icon {{in_array($id,$bmags)?'active':''}}">
            @endif
            <div class="newspaper_name">{{$book['title']}}</div>
            @if(Auth::user() ? Auth::user()->country == "GH" : null)
            <div class="newspaper_name ">GHS {{$book['price']}}</div>
            @else
            <div class="newspaper_name ">USD {{$book['price']}}</div>
            @endif
            @endif
            @if($book['bookmark_type'] == "top_story" || $book['bookmark_type'] == "popular_content" )
            <?php 
               $id = $book['id']  ; 
               $type = $book['bookmark_type'].'s';
               $content = $book['content_image'];
               ?>
            @if($book['bookmark_type'] == "top_story")
            <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$id}}" data-type="top_story" class="news_pdf_icons {{in_array($id,$btopstory)?'active':''}}">
            <a  class="book_stories_image border" href="{{url("topstory/$id/details")}}" >
            @if(strpos("$content","https")!==false)
            <img src="{{ !empty($content) ?  asset($content)  : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
            @else       
            <img src="{{  !empty($content) ? asset("storage/".$content)  : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
            @endif
            </a>
            <div class="box_content">
               <p class="p_gamename"style="color:#ca0a0a">{{$book['blog_category'][0]['name']}}</p>
               <p class="p_gameheading">{{$book['title']}}</p>
               <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                  {{$book['date']}}
               </div>
            </div>
            @else
            <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$id}}" data-type="popular_content" class="news_pdf_icons {{in_array($id,$bpromoted)?'active':''}}">
            <a  class="book_stories_image border" href="{{url("promoted/$id/details")}}" >
            @if(strpos("$content","https")!==false)
            <img src="{{ !empty($content) ?  asset($content)  : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
            @else       
            <img src="{{  !empty($content) ? asset("storage/".$content)  : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
            @endif
            </a>
            <div class="box_content">
               <p class="p_gamename"style="color:#ca0a0a">{{$book['blog_category'][0]['name']}}</p>
               <p class="p_gameheading">{{$book['title']}}</p>
               <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                  {{$book['date']}}
               </div>
            </div>
            @endif
            @endif
         </div>
      </div>
      @endforeach
   </section>
   @endforeach
   @else
   <h3 class="book_msg" style="text-align:center;">Data not found</h3>
   @endif
</div>
@endsection