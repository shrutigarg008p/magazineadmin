@extends('layouts.customer')
@section('title', 'Galleries')

@section('content')
    <div class="container">
      <div class="tabnews_tabs">
        <div class="main_page_heading">
          <img src="img/icon-prev.png" alt="">
        <?php
          if(!empty($all_gallery[0]['album_id'])){
          $album=App\Models\Albums::where('id',$all_gallery[0]['album_id'])->first();
          }
        
        // dd($album);
        ?>
        </div>
        <div class="tab">
          <!-- <button class="tabnews_links" onclick="openCity(event, 'appads')" id="defaultOpen">Magazine</button>
          <button class="tabnews_links" onclick="openCity(event, 'webads')">Newspaper</button> -->
        </div>
        <div id="appads" class="tabcontent">
          <div class="heading_arrow_group">
            <h1 class="common_heading">{{!empty($album) ? $album->title : '' }} Album</h1>
          </div>
          <div class="heading_arrow_group heading_bg_light">
            {{-- <h1 class="common_heading">NewsPaper</h1> --}}
          </div>
          <div class="tabnews_block">
            
            @foreach($all_gallery as $galleryDatas)
            <div class="tabnews_inner">
              
              <img src="{{ asset("storage/".$galleryDatas->image) }}" class="img-fluid lazy  modal-img-slider  {{$album_id}}" data-img="{{$album_id}}">
                                    
              <div class="tabnews_textgroup">
                  <div class="tabnews_name">{{$galleryDatas->title}}</div>
                <div class="tabnews_price">{{$galleryDatas->created_at->format('d-m-y')}}</div>
              </div>
            </div>
            @endforeach
           
          </div>
        </div>
        
      </div>
    </div>
    <div id="gallSliderModal" class="modal fade" style="opacity:1 !important">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{!empty($album) ? $album->title : '' }} Album</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="">
                @foreach($galleries as $galleriesData)
                <?php   $gallery_data =  App\Models\AlbumGallery::where('album_id',$galleriesData->id)->latest()->get(); ?>
                <section class="regular slider gallaries_sliderModal modal-slider {{$galleriesData->id}}" style="display:none">
                @foreach($gallery_data as $galleriesDatas)
                <div>
                    <div class="inner_content">
                        
                        <div class="alum-text" style=" position: relative;text-align: center;color: white;">
                          <img src="{{ asset("storage/".$galleriesDatas->image) }}" class="img-fluid lazy  " data-img="{{$galleriesData->id}}" data-i={{$galleriesDatas->id}}>
                          
                        </div>
                        <br>
                        <div class="centered" style="text-align:center" ><strong>{{$galleriesDatas->title}}</strong><br><br></div>
                          <div class="" style="text-align:center;"  >{{!empty($galleriesDatas->short_description) ? $galleriesDatas->short_description:"Demo" }}</div>
                    </div>
                </div>
                @endforeach
               
              </section>
             {{--   @foreach($gallery_data as $galleriesDatas)
                <div>
                    <div class="inner_content">
                        <img src="{{ asset("storage/".$galleriesDatas->image) }}" class="img-fluid lazy  modal-img-slider modal-img {{$galleriesData->id}}" data-img="{{$galleriesData->id}}"><br>
                    </div>
                </div>
                @endforeach --}}
              @endforeach
              {{-- <img  class="img-fluid lazy  galleryimgModal" width="600" height="80"> --}}
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
   <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript">
  $(document).on('click','.modal-img-slider',function(){
    // alert();
    // alert($('.modal-img-slider').index(this));
    abc = parseInt($('.modal-img-slider').index(this));
    // alert(abc);
    $('.gallaries_sliderModal').slick('slickGoTo', abc);
    var gall_id = $(this).attr('data-img');
    $('.modal-slider').css('display','none');

    $('.modal-slider.'+gall_id).css('display','block');
    $('#gallSliderModal').modal('show');

  });
</script>
 @endsection