<div class="all-modals">

<div id="gallModal" class="modal fade" style="opacity:1 !important">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title">Image Modal</h5> --}}
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="">
                @foreach($galleries as $galleriesData)
                <?php   $gallery_data =  App\Models\AlbumGallery::where('album_id',$galleriesData->id)->latest()->orderby('id','desc')->get(); ?>
               {{--  <section class="regular slider gallaries_sliderModal modal-slider {{$galleriesData->id}}" style="display:none">
                @foreach($gallery_data as $galleriesDatas)
                <div>
                    <div class="inner_content">
                        <img src="{{ asset("storage/".$galleriesDatas->image) }}" class="img-fluid lazy  " data-img="{{$galleriesData->id}}"><br>
                    </div>
                </div>
                @endforeach
               
              </section> --}}
               @foreach($gallery_data as $galleriesDatas)
                <div>
                    <div class="inner_content">
                        <img src="{{ asset("storage/".$galleriesDatas->image) }}" class="img-fluid lazy  modal-img-slider modal-img {{$galleriesData->id}}" data-img="{{$galleriesData->id}}">
                        <div class="img-fluid lazy  modal-img-slider modal-img {{$galleriesData->id}}">{{$galleriesDatas->title}}</div><br>
                    </div>
                </div>
                @endforeach
              @endforeach
              {{-- <img  class="img-fluid lazy  galleryimgModal" width="600" height="80"> --}}
              </div>
            </div>
        </div>
    </div>
</div>


<div id="gallSliderModal" class="modal fade" style="opacity:1 !important">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title">Image Modal</h5> --}}
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="">
                @foreach($galleries as $galleriesData)
                <?php   $gallery_data =  App\Models\AlbumGallery::where('album_id',$galleriesData->id)->latest()->orderby('id','desc')->get(); ?>
                <section class="regular slider gallaries_sliderModal modal-slider {{$galleriesData->id}}" style="display:none">
                @foreach($gallery_data as $galleriesDatas)
                <div>
                    <div class="inner_content">
                        <img src="{{ asset("storage/".$galleriesDatas->image) }}" class="img-fluid lazy  " data-img="{{$galleriesData->id}}" data-i={{$galleriesDatas->id}}><br>
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
</div>