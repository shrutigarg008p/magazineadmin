    $(document).on('click','.video_box',function(){
     video_url = $(this).prev().html();
     id = $(this).prev().next().next().html();
     // alert(id);
     $('#vid_id').html(id);
     let newURL = video_url.replace("watch?v=", "embed/");
     $('#cartoonVideo').attr('src',newURL+'?autoplay=1');
     $('#vidModal').modal('show');
    }); 


    $(document).on('click','.close',function(){
         $('#vidModal').hide();
          $("#cartoonVideo").attr('src', '');
    });


    $(document).on('click','.closevideo',function(){
         $('#vidModal').hide();
          window.location="{{route('login')}}";
    });


    $(document).on('click','.share_url',function(){
       // sharePost="sharePost";
       var video_url = $('#cartoonVideo').attr('src');
       var id = $('#vid_id').text();
       // alert(id);
       var url =  window.location.origin;
        $('.vid_share_url_facebook').attr('onclick',"sharePost('facebook','"+url+'/public/'+'videos/'+id+'/'+'view'+"')");
        $('.vid_share_url_whatsapp').attr('onclick',"sharePost('whatsapp','"+url+'/public/'+'videos/'+id+'/'+'view'+"')");
        // sharePost('facebook','{{$contentURL}}')
    });

    $(document).on('click','.socialModalBtn',function(){
        $('#socialModal').hide();
    })