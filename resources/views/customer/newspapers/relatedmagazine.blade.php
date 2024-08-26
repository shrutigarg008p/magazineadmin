@extends('layouts.customer')
@section('title', 'Related Newspapers')

@section('content')
    <div class="container">
      <div class="tabnews_tabs">
        <!-- <div class="main_page_heading">
          <img src="img/icon-prev.png" alt="">
         
        </div> -->
        <!-- <div class="tab">
          <button class="tabnews_links" onclick="openCity(event, 'appads')" id="defaultOpen">Magazine</button>
          <button class="tabnews_links" onclick="openCity(event, 'webads')">Newspaper</button>
        </div>
        <div id="appads" class="tabcontent">
          <div class="heading_arrow_group">
            <h1 class="common_heading">Magazines</h1>
          </div> -->
          <div class="heading_arrow_group heading_bg_light">
            <h1 class="common_heading">Related Newspapers</h1> 
          </div>
          <div class="tabnews_block">
            
            @foreach($related as $relnewsDatas)
            <div class="tabnews_inner">
                <a class="newspaper_image" href="{{url("newspapers/$relnewsDatas->id/details")}}">
                  <img src="{{ asset('storage/'.$relnewsDatas->cover_image) }}" class="img-fluid lazy ">
                </a>
              <div class="tabnews_textgroup">
                <div class="tabnews_name">{{$relnewsDatas->title}}</div>
                <div class="tabnews_price">{{$relnewsDatas->price}}</div>
              </div>
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
      <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
@endsection