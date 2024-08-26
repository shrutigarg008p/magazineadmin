@extends('layouts.customer')
@section('title', 'Topics to Follow')

@section('content')
    <div class="container">
      <div class="tabnews_tabs">
        <div class="main_page_heading">
          {{-- <img src="{{asset('assets/frontend/img/icon-prev.png')}}" alt=""> --}}
          {{$tagName}}
        </div>
        <div class="tab">
          <button class="tabnews_links" onclick="openCity(event, 'appads')" id="defaultOpen">Magazine</button>
          <button class="tabnews_links" onclick="openCity(event, 'webads')">Newspaper</button>
        </div>
        <div id="appads" class="tabcontent">
          <div class="heading_arrow_group">
            <h1 class="common_heading">Magazines</h1>
          </div>
          <div class="heading_arrow_group heading_bg_light">
            {{-- <h1 class="common_heading">NewsPaper</h1> --}}
          </div>
          <div class="tabnews_block">
            <?php $mags = ($tags['magazines']);?>
            @foreach($mags as $magDatas)
            <div class="tabnews_inner">
              <a href="{{url("magazines/$magDatas->id/details")}}">
              <img src="{{ asset('storage/'.$magDatas->cover_image) }}" class="img-fluid lazy ">
              <div class="tabnews_textgroup">
                <div class="tabnews_name">{{$magDatas->title}}</div>
                <div class="tabnews_price">{{$magDatas->price}}</div>
              </div>
            </a>
            </div>
            @endforeach
           
          </div>
        </div>
        <div id="webads" class="tabcontent">
          <div class="heading_arrow_group">
            <h1 class="common_heading">NewsPapers</h1>
          </div>
          <div class="heading_arrow_group heading_bg_light">
            {{-- <h1 class="common_heading">NewsPaper</h1> --}}
          </div>
          <div class="tabnews_block">
          <?php $news = ($tags['newspapers']);?>
            @foreach($news as $newsDatas)
            <div class="tabnews_inner">
              <a href="{{url("newspapers/$newsDatas->id/details")}}">
              <img src="{{ asset('storage/'.$newsDatas->cover_image) }}" class="img-fluid lazy ">
              <div class="tabnews_textgroup">
                <div class="tabnews_name">{{$newsDatas->title}}</div>
                <div class="tabnews_price">{{$newsDatas->price}}</div>
              </div>
            </a>
            </div>
            @endforeach
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
    <script src="js/bootstrap.min.js"></script>
 @endsection