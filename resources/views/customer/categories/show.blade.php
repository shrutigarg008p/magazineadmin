@extends('layouts.customer')
@section('title', 'Popular Categories')
@section('content')
<section class="breadcrumb_group">
   <div class="container">
      <ul class="breadcrumb">
         <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
         <li class="breadcrumb_list">></li>
         <li class="breadcrumb_list">Categories</li>
         
         <li class="breadcrumb_list">></li>
        
         <li class="breadcrumb_list">{{$catName ?? null}}</li>
      </ul>
   </div>
</section>
<div class="container">
   <div class="row">
      <div class="col-md-12 col-lg-3">
         <div class="sidebar_border">
            <h2 class="sedebar_heading">Categories</h2>
            <ul class="sidebar_order">
               <li class="sidebar_list">
                  <a href="{{url('categories/listing')}}" class="{{(strpos(url()->current(),'details')===false) ? 'active':'' }}">All</a>
               </li>
               @if($categories !="")
               @foreach($categories as $categoriesData)
               <li class="sidebar_list">
                  {{-- <a href="{{url("categories/listing/$categoriesData->id")}}" value="{{$categoriesData->id}}" id="cat">{{$categoriesData->name}}</a> --}}
                  <a href="{{url("categories/$categoriesData->id/details")}}" value="{{$categoriesData->id}}" id="cat{{$categoriesData->id}}"  class="{{($category->id==$categoriesData->id)?'cat-active':''}}">{{$categoriesData->name}}</a>
               </li>
               @endforeach
               @else
               <h3>Data Not Found</h3>
               @endif
               {{-- 
               <li class="sidebar_list">
                  <a href="">Business</a>
               </li>
               --}}
            </ul>
         </div>
      </div>
      <div class="col-md-12 col-lg-9">
         <div class="tabnews_tabs category-tab">
            <div class="main_page_heading">
               {{-- <img src="{{asset('assets/frontend/img/icon-prev.png')}}" alt=""> --}}
               <!-- {{$catName}} -->
            </div>
            <div class="tab">
               <button class="tabnews_links" onclick="openCity(event, 'appads')" id="defaultOpen">Magazine</button>
               <button class="tabnews_links" onclick="openCity(event, 'stories')">Stories</button>
               <button class="tabnews_links" onclick="openCity(event, 'webads')">Newspaper</button>
            </div>
            {{-- magazine --}}
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
                  <?php $mags = ($category_magazines['magazines']);?>
                  @if(count($mags)>0)
                  @foreach($mags as $magDatas)
                  <div class="all_magazines">
                     <a href="{{url("magazines/$magDatas->
                        id/details")}}">
                        <img src="{{ asset('storage/'.$magDatas->cover_image) }}" class="img-fluid lazy ">
                        <div class="tabnews_textgroup">
                           <div class="tabnews_name">{{$magDatas->title}}</div>
                           <div class="magazine_d_price">{{to_price($magDatas->price, true)}}</div>
                           {{-- 
                           <div class="tabnews_price">{{$magDatas->price}}</div>
                           --}}
                        </div>
                     </a>
                    {{--  <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$magDatas->id}}" data-type="magazine" class="news_pdf_icon {{in_array($magDatas->id,$bmags)?'active':''}}"> --}}
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
                  <?php $stories = ($category_magazines['stories']);?>
                  @if(count($stories)>0)
                  @foreach($stories as $storiesDatas)
                  <div class="all_magazines">
                   {{--   <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$storiesDatas->id}}" data-type="top_story" class="news_pdf_icons {{in_array($storiesDatas->id,$btopstory)?'active':''}}"> --}}
                     <a href="{{url("topstory/$storiesDatas->
                        id/details")}}">
                        {{-- <img src="{{ asset('storage/'.$storiesDatas->content_image) }}" class="img-fluid lazy "> --}}
                        @if(strpos("$storiesDatas->content_image","https")!==false)
                        <img src="{{ !empty($storiesDatas->content_image) ?  asset($storiesDatas->content_image) : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
                        @else
                        <img src="{{ !empty($storiesDatas->content_image) ? asset("storage/".$storiesDatas->content_image) : asset('assets/frontend/img/ts1.jpg')  }}" class="img-fluid lazy " referrerpolicy="no-referrer">
                        @endif
                        {{--  
                        <div class="tabnews_textgroup">
                           <div class="tabnews_name">{{$storiesDatas->title}}</div>
                           <div class="tabnews_price">{{$storiesDatas->price}}</div>
                        </div>
                        --}}
                        <div class="tabnews_textgroup">
                           <div class="p_gamename" style="color:#ca0a0a">{{$storiesDatas->blog_category->name}}</div>
                           <p class="p_gameheading">{{$storiesDatas->title}}</p>
                           <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                              {{$storiesDatas->created_at->format('d-m-Y')}}
                           </div>
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
            {{-- news --}}
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
                  <?php $news = ($category_magazines['newspapers']);?>
                  @if(count($news)>0)
                  @foreach($news as $newsDatas)
                  <div class="all_magazines">
                     <a href="{{url("newspapers/$newsDatas->
                        id/details")}}">
                        <img src="{{ asset('storage/'.$newsDatas->cover_image) }}" class="img-fluid lazy ">
                        <div class="tabnews_textgroup">
                           <div class="tabnews_name">{{$newsDatas->title}}</div>
                           <div class="magazine_d_price">{{to_price($newsDatas->price, true)}}</div>
                        </div>
                     </a>
                    {{--  <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{$newsDatas->id}}" data-type="newspaper" class="news_pdf_icon {{in_array($newsDatas->id,$bnews)?'active':''}}"> --}}
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