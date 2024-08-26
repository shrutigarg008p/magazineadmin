 /*play more than one audio*/
         //    jQuery($ => {
         //   $('.play-btn').click(e => {
         //     let $song = $(e.target).hide().closest('.song');
         //     $song.find('.audio')[0].play();
         //     $song.find('.icon').toggleClass('fa-volume-mute fa-volume-up');
         //   });
         
         //   $('.song').on('click', '.fa-volume-up', e => {
         //     let $song = $(e.target).closest('.song');
         //     $song.find('.audio')[0].pause();
         //     $song.find('.icon').removeClass('fa-volume-up').addClass('fa-volume-mute');
         //     $song.find('.play-btn').show();
         //   });
         // });
         /*end*/
         $(document).on('click','.podcast_left',function(){
         var audioval = $(this).prev().html();
         var audio = document.getElementById('audiotag');
         audio.pause();
         // alert($(this).children().first().next().is(':visible'));
         // $('#audiotag').attr('src','');
         // alert($('.pause-btn').is(':visible'));
         // alert($(this).children().first().next().is(':visible'));
         // if($(this).children().first().next().is(':visible') == false && $('.pause-btn').is(':visible') == false ){
         //     // alert();
         //     audio.pause();
         //     $('#audiotag').attr('src',audioval);
         //     audio.play();
         //     // $('.play-btn').css('display','block');
         //     // $('.pause-btn').css('display','none');
         //     $(this).children().first().css('display','none');
         //     $(this).children().first().next().css('display','block');
         
         // }
          if($(this).children().first().next().is(':visible') == true ){
             audio.pause();
             $('.play-btn').css('display','block');
              $('.pause-btn').css('display','none');
          }
         else{
             // alert('if');
             // alert(audio.played);
             $('#audiotag').attr('src',audioval);
             audio.play();
             $('.play-btn').css('display','block');
             $('.pause-btn').css('display','none');
             $(this).children().first().css('display','none');
             $(this).children().first().next().css('display','block'); 
         
         }
         // else{
         //     // alert('else');
         //     audio.pause();
         //     $('.play-btn').css('display','block');
         //      $('.pause-btn').css('display','none');
         //      $(this).children().first().css('display','block');
         //     $(this).children().first().next().css('display','none');
         //   }
         
         });
        $(document).on('click','.closepodcast',function(){
            // alert();
            window.location="{{route('login')}}";
        });

        $(document).on('click','.share_pod_url',function(){
       // var id = $(this).parent().children().prev().html();
            
       var id = $(this).parent().children().html();
       // alert(id);
       var url =  window.location.origin;
        $('.vid_pod_url_facebook').attr('onclick',"sharePost('facebook','"+url+'/public/'+'podcasts/'+id+'/'+'view'+"')");
        $('.vid_pod_url_whatsapp').attr('onclick',"sharePost('whatsapp','"+url+'/public/'+'podcasts/'+id+'/'+'view'+"')");

        // sharePost('facebook','{{$contentURL}}')
     });