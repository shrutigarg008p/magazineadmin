<div class="container">
    <div class="heading_arrow_group">
         <a href="{{url('galleries/listing')}}">
        <h1 class="common_heading link_list">Photo Galleries</h1>
    </a>
        <a href="{{url('galleries/listing')}}"><img src="{{ asset('assets/frontend/img/icon-next') }}.png" alt=""></a>
    </div>
    <section class="regular slider gallaries_slider">
        @foreach($galleries as $galleryDatas)
        @php
            $cover_image = $galleryDatas->cover_image;
            if(!$cover_image) {
                $cover_image = $galleryDatas->gallary_images->last();
                $cover_image = $cover_image ? $cover_image->image : null;
            }
        @endphp
        <div>
            <div class="inner_box">
                <a class="galleries_image" href="{{url("albums/gallery/$galleryDatas->id/list")}}">
                    <img src="{{ asset("storage/{$cover_image}") }}" data-id="{{$galleryDatas->id}}" class="img-fluid lazy  gallery-imgs" >
                </a>
                <div class="">{{$galleryDatas->title}}</div><br>
            </div>
        </div>
        @endforeach
        @include('customer.pages.galleriesmodal')
    </section>
</div>
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() { 
        try {
            $("#gallSliderModal").parents(".slick-slide").first().remove();
        } catch(e){} }, 0);
    })
</script>