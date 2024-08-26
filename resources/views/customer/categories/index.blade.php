@extends('layouts.customer')
@section('title', 'Popular Categories')
@section('content')
<section class="breadcrumb_group">
   <div class="container">
      <ul class="breadcrumb">
         <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
         <li class="breadcrumb_list">></li>
         <li class="breadcrumb_list">Categories</li>
         {{-- 
         <li class="breadcrumb_list">></li>
         --}}
         <li class="breadcrumb_list">{{$category_details->name ?? null}}</li>
      </ul>
   </div>
</section>
<div class="container">
   <div class="row">
      <!-- left side -->
      <div class="col-lg-3">
         <div class="sidebar_border">
            <h2 class="sedebar_heading">Categories</h2>
            <ul class="sidebar_order">
               <li class="sidebar_list">
                  <a href="{{url('categories/listing')}}" class="{{(strpos(url()->current(),'details')===false) ? 'active':'' }}">All</a>
               </li>
               <?php $cats = ($mags_news_datas['categories']);?>
               @if($cats !="")
               @foreach($cats as $categories)
               <li class="sidebar_list">
                  {{--   <a href="{{url("categories/listing/$categories->id")}}" value="{{$categories->id}}" id="shiv">{{$categories->name}}</a> --}}
                  <a href="{{url("categories/$categories->id/details")}}" value="{{$categories->id}}" id="shiv">{{$categories->name}}</a>
               </li>
               @endforeach
               @else
               <h3>Data Not Found</h3>
               @endif
            </ul>
         </div>
      </div>
      <div class="col-lg-9">
         <div class="tabnews_tabs category-tab">
            {{-- 
            <div class="main_page_heading">
               <img src="{{asset('assets/frontend/img/icon-prev.png')}}" alt="">
            </div>
            --}}
            <div class="tab">
               <button class="tabnews_links" onclick="openCity(event, 'appads')" id="defaultOpen">Magazine</button>
               <button class="tabnews_links" onclick="openCity(event, 'stories')">Stories</button>
               <button class="tabnews_links" onclick="openCity(event, 'webads')">Newspaper</button>
            </div>
            <div id="appads" class="tabcontent">
               <div class="heading_arrow_group">
                  <h1 class="common_heading">Magazines</h1>
               </div>
               {{--  
               <div class="heading_arrow_group heading_bg_light">
                  <h1 class="common_heading">NewsPaper</h1>
               </div>
               --}}
               <div class="tabnews_block">
                  <?php $mags = ($mags_news_datas['magazines']);?>
                  @if(count($mags)>0)
                  @foreach($mags as $magDatas)
                  <div class="all_magazines">
                     <a class="" href="{{url("magazines/$magDatas->id/details")}}">
                        <div class="magazines_img_data">
                        <img src="{{ asset('storage/'.$magDatas->cover_image) }}" class="img-fluid lazy  magazines_data">
                     </div>
                        <div class="tabnews_textgroup">
                           <div class="tabnews_name">{{$magDatas->title}}</div>
                           @if(Auth::user() ? Auth::user()->country == "GH" : null)
                           <div class="tabnews_price">GHS {{$magDatas->price}}</div>
                           @else
                           <div class="tabnews_price">USD {{$magDatas->price}}</div>
                           @endif
                        </div>
                     </a>
                     {{--   <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$magDatas->id}}" data-type="magazine" class="news_pdf_icon {{in_array($magDatas->id,$bmags)?'active':''}}"> --}}
                  </div>
                  @endforeach
                  @else
                  <div class="tabnews_inner">
                     <div class="tabnews_textgroup">
                        <div class="tabnews_name">Data Not Found</div>
                     </div>
                  </div>
                  @endif
               </div>
            </div>
            {{-- stories --}}
            <div id="stories" class="tabcontent">
               <div class="heading_arrow_group">
                  <h1 class="common_heading">Stories</h1>
               </div>
               {{--  
               <div class="heading_arrow_group heading_bg_light">
                  <h1 class="common_heading">NewsPaper</h1>
               </div>
               --}}
               <div class="tabnews_block">
                  <?php $stories = ($mags_news_datas['stories']);?>
                  @if(count($stories)>0)
                  @foreach($stories as $storiesDatas)
                  {{-- @dd($storiesDatas) --}}
                  <div class="all_magazines">
                     <?php 
                        $id = $storiesDatas['id']  ; 
                        $content = $storiesDatas['content_image'];
                        ?>
                     {{--    <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$id}}" data-type="top_story" class="news_pdf_icons {{in_array($id,$btopstory)?'active':''}}"> --}}
                     <a  href="{{url("topstory/$id/details")}}">
                     <div class="stor_img_data">
                        {{-- <img src="{{ asset('storage/'.$storiesDatas->content_image) }}" class="img-fluid lazy "> --}}
                        @if(strpos("$content","https")!==false)
                        <img src="{{ !empty($content) ?  asset($content) : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy  stories_data" referrerpolicy="no-referrer">
                        @else
                        <img src="{{ !empty($content) ? asset("storage/".$content) : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
                        @endif
                     </div>
                     {{--  
                     <div class="tabnews_textgroup">
                        <div class="tabnews_name">{{$storiesDatas->title}}</div>
                        <div class="tabnews_price">{{$storiesDatas->price}}</div>
                     </div>
                     --}}
                     <div class="tabnews_textgroup">
                        <p class="p_gamename">{{$storiesDatas['blog_category']['name']}}</p>
                        <div class="tabnews_name">{{ $storiesDatas['title'] }}</div>
                        <div class="tabnews_names"><img
                           src="{{ asset('assets/frontend/img/calender.png') }}">
                           {{ $storiesDatas['date']}}
                        </div>
                        <div class="tabnews_price"></div>
                     </div>
                     </a>
                  </div>
                  @endforeach
                  @else
                  <div class="tabnews_inner">
                     <div class="tabnews_textgroup">
                        <div class="tabnews_name">Data Not Found</div>
                     </div>
                  </div>
                  @endif
               </div>
            </div>
            {{-- end --}}
            <div id="webads" class="tabcontent">
               <div class="heading_arrow_group">
                  <h1 class="common_heading">NewsPapers</h1>
               </div>
               {{--  
               <div class="heading_arrow_group heading_bg_light">
                  <h1 class="common_heading">NewsPaper</h1>
               </div>
               --}}
               <div class="tabnews_block">
                  <?php $news = ($mags_news_datas['newspapers']);?>
                  @if(count($news) > 0)
                  @foreach($news as $newsDatas)
                  <div class="all_magazines">
                     <a   href="{{url("newspapers/$newsDatas->id/details")}}">
                        <div class="news_img_data">
                        <img src="{{ asset('storage/'.$newsDatas->cover_image) }}" class="img-fluid lazy  news_data">
                        </div>
                        <div class="tabnews_textgroup">
                           <div class="tabnews_name">{{$newsDatas->title}}</div>
                           @if(Auth::user() ? Auth::user()->country == "GH" : null)
                           <div class="tabnews_price">GHS {{$newsDatas->price}}</div>
                           @else
                           <div class="tabnews_price">USD {{$newsDatas->price}}</div>
                           @endif
                        </div>
                     </a>
                     {{-- <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$newsDatas->id}}" data-type="newspaper" class="news_pdf_icon {{in_array($newsDatas->id,$bnews)?'active':''}}"> --}}
                  </div>
                  @endforeach
                  @else
                  <div class="tabnews_inner">
                     <div class="tabnews_textgroup">
                        <div class="tabnews_name">Data Not Found</div>
                     </div>
                  </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   function openCity(evt, cityName) {
       var i, tabcontent, tablinks;
       tabcontent = document.getElementsByClassName("tabcontent");
       for (i = 0; i < tabcontent.length; i++) {
           tabcontent[i].style.display = "none";
       }
       tablinks = document.getElementsByClassName("tabnews_links");
       for (i = 0; i < tablinks.length; i++) {
           tablinks[i].className = tablinks[i].className.replace(" active", "");
       }
       document.getElementById(cityName).style.display = "block";
       evt.currentTarget.className += " active";
   }
   // Get the element with id="defaultOpen" and click on it
   document.getElementById("defaultOpen").click();
</script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
@endsection