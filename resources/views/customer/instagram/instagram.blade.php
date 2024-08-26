@extends('layouts.customer')
@section('title', 'Galleries')

@section('content')
    <div class="container">
      <div class="tabnews_tabs">
        <div class="main_page_heading">
          <img src="img/icon-prev.png" alt="">
        
        </div>
        <div class="tab">
          <!-- <button class="tabnews_links" onclick="openCity(event, 'appads')" id="defaultOpen">Magazine</button>
          <button class="tabnews_links" onclick="openCity(event, 'webads')">Newspaper</button> -->
        </div>
        <div id="appads" class="tabcontent">
          <div class="heading_arrow_group">
            <h1 class="common_heading">Instagram Feed</h1>
          </div>
          <div class="heading_arrow_group heading_bg_light">
            {{-- <h1 class="common_heading">NewsPaper</h1> --}}
          </div>
          <div class="tabnews_block">
            
            @forelse($datas as $instaDatas)
            <div class="tabnews_inner">
              
              @if($instaDatas->media_type == "VIDEO")
         
              <iframe width="200" height="200" src="{{$instaDatas->media_url.'/embed'}}" frameborder="0"></iframe>

              @else
              <img src="{{ !empty($instaDatas->media_url) ? asset($instaDatas->media_url) :  asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy  gallery-img">
              @endif
                                    
              <div class="tabnews_textgroup">
            
              </div>
            </div>
            @empty
            <h4 class="my-5 font-weight-bold">No Data</h4>
            @endforelse
           
          </div>
        </div>
        
      </div>
    </div>
    <div id="gallModal" class="modal fade" style="opacity:1 !important">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title">Image Modal</h5> --}}
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="">
              <img  class="img-fluid lazy  galleryimgModal" width="600" height="80">
              </div>
            </div>
        </div>
    </div>
    </div>

   {{--  <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
            $(document).on('click','.gallery-img',function(){
            var url = $(this).attr('src');
            // alert(url);
            $('.galleryimgModal').attr('src',url);
            $('#gallModal').modal('show');
            
           });
         //    $(document).on('click','.closeGallery',function(){
         //     $('#vidModal').hide();
         //      window.location="{{route('login')}}";
         // });

      </script>
    
  </body>
</html> --}}
 @endsection