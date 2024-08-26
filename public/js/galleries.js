  $(document).on('click','.gallery-img',function(){
    // abc = parseInt($('.gallery-img').index(this)) - 4;
    // // alert(abc);
    // $('.gallaries_sliderModal').slick('slickGoTo', abc);
    // alert($(this).attr('data-id'));
  var id =$(this).attr('data-id');
  var url = $(this).attr('src');
   $(".modal-img").css('display','none');
    $(".modal-img."+id).css('display','block');
  // alert(url);
  $('.galleryimgModal').attr('src',url);
  $('#gallModal').modal('show');
  
  });
  $(document).on('click','.closeGallery',function(){
   $('#vidModal').hide();
    window.location="{{route('login')}}";
  });


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

  