<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazines</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}"> 
    <style type="text/css">
      .tabnews_block {
      display: flex;
      flex-wrap: wrap;
      }
      .tabnews_inner {
      margin-right: 20px;
      margin-bottom: 20px;
      background: #ebebeb;
      border-radius: 5px;
      }
      .tabnews_inner:nth-child(5n+5) {
      margin-right: 0;
      }
      .tabnews_name {
      font-size: 16px;
      font-weight: 500;
      color: #000;
      }
      .tabnews_price {
      font-size: 14px;
      color: #797979;
      }
      .tabnews_textgroup {
      padding: 10px;
      }
      .tabnews_links {
      height: 50px;
      background: #d3d3d3;
      border: 0;
      color: #000;
      font-size: 16px;
      font-weight: 500;
      border-radius: 3px;
      padding: 0 30px;
      width: 160px;
      }
      .tabnews_links.active {
      background: #ca0a0a;
      color: #fff;
      }
      .tabnews_links:first-child {
      margin-right: 20px;
      }
      .tabnews_tabs {
      margin-top: 40px;
      }
      .tabnews_tabs .tab {
      margin-bottom: 20px;
      }
      .heading_bg_light {
      background: #ebebeb;
      padding: 10px;
      }
      .main_page_heading {
      font-size: 20px;
      color: #000;
      font-weight: 500;
      margin-bottom: 20px;
      }
      .main_page_heading img {
      margin-right: 20px;
      }
    </style>
  </head>
  <body>
    <div class="container">

       {{-- filter --}}
      <div class="row">
            <!-- left side -->
            <div class="col-md-3">
                <div class="sidebar_border">
                    <h2 class="sedebar_heading">Categories</h2>
                    <ul class="sidebar_order">
                         @foreach($catsDatas as $categories)
                        <li class="sidebar_list">
                            <a href="{{url("magazines/list/$categories->id/details")}}">{{$categories->name}}</a>
                        </li>
                        @endforeach
                       
                    </ul>
                </div>
            </div>
            <!-- right side -->
            <div class="col-md-9">
                <div class="sidesection_right">
                    <h3 class="sidesection_heading">{{$category_details->name ?? null}}</h3>
                    <div class="select_field_group">
                        <select name="publication_mags" id="publication_mags" class="publication">
                            <option value="">Select Publication</option>
                            @foreach($pubsData as $publication)
                            <option value="{{$publication->id}}">{{$publication->name}} </option>
                            @endforeach
                        </select>
                        <div class="select_field_right">
                           {{--  <select name="" id="" class="publication">
                                <option value="">20 item</option>
                                <option value=""> 40 item</option>
                            </select> --}}
                            <div class="date_pick_icon">
                                <input class="date_pick_right" type="text" id="geburtsdatum" name="geburtsdatum" class="date_search"
                                    placeholder="Search by date" maxlength="" onfocus="loadInputText()"
                                    onClick="this.select(); ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
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
            <h1 class="common_heading">Magazines</h1> 
          </div>
          <div class="tabnews_block">
            @foreach($mags as $magDatas)
            <div class="tabnews_inner">
            <a href="{{url("magazines/$magDatas->id/details")}}">
              <img src="{{ asset('storage/'.$magDatas->cover_image) }}" class="img-fluid lazy ">
            </a>
              <div class="tabnews_textgroup">
                <div class="tabnews_name">{{$magDatas->title}}</div>
                <div class="tabnews_price">{{$magDatas->price}}</div>
              </div>
            </div>
            @endforeach
           
          </div>
        </div>
        
      </div>
    </div>
   <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <script src="{{ asset('assets/frontend/js/classie.js') }}"></script>
      <script src="{{ asset('assets/frontend/js/uisearch.js') }}"></script>
          <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />

    <script type="text/javascript">
        $(function() {
            $('#geburtsdatum').datepicker({
                dateFormat: 'dd.mm.yy',
                changeYear: true,
                changeMonth: true,
                showAnim: 'slideDown',
                yearRange: '-120:+0',
            });

            $('#geburtsdatum').on('change', function() {
                const inputValue = $('#geburtsdatum').val();
                // split String of DE Format Date
                const dateParts = inputValue.split('.');
                // re-order dateParts
                const reformatDate = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);
                // Test Parts: console.log(dateParts[2], dateParts[1], dateParts[0]);
                // reformat date to UTC
                const inputValueUTC = Date.parse(reformatDate);
                const maxDate = Date.now();
                //const minDate = Date.now()-120;
                const minDate = new Date();
                minDate.setFullYear(minDate.getFullYear() - 120);

                // now comparing the reformated date with maxDate
                if (inputValueUTC > maxDate) {
                    // alert('Future dates are not allowed')
                    alert('Not Found');
                    $('#geburtsdatum').val('');
                } else if (!validDateFormat(inputValue)) {
                    // alert('Invalid Date Format')
                    alert('Not Found');
                    $('#geburtsdatum').val('');
                } else if (inputValueUTC < minDate) {
                    // date is not allowed to be less than 120 years from now
                    alert('Not Found')
                    $('#geburtsdatum').val('');
                }
            });
        });

        function validDateFormat(input) {
            var regEx = /^(0[1-9]|1\d|2\d|3[01])\.(0[1-9]|1[0-2])\.[12][0-9]{3}$/;
            //var regEx = /^(0[1-9]|1\d|2\d|3[01])\.(0[1-9]|1[0-2])\.(17|18|19|20)\d{2}$/;
            // var regEx = /^(0[1-9]|1\d|2\d|3[01])\.(0[1-9]|1[0-2])\.(19|20)\d{2} $/;


            return input.match(regEx) != null;
        }

        function loadInputText() {
            document.getElementById("geburtsdatum").value = "Search by date";
        }
    </script>
    {{-- for news filter --}}
      <script type="text/javascript">
         $("select[name='publication_mags']").change(function(){
             var id = $(this).val();
             // alert(id);
             var token = $("input[name='_token']").val();
             $.ajax({
                 url: "<?php echo route('filtermags') ?>",
                 method: 'POST',
                 data: {"publication_id":id,  "_token": "{{ csrf_token() }}"},
                 success: function(data) {
                   // alert(data);
         
                   if(data){
                   
                       $(".tabnews_block").empty();
                     
                       $.each(data,function(key,value){
                           $(".tabnews_block").append('<div class="tabnews_inner">'
                            +
                           '<a href="<?php echo url('magazines/')?>'+'/'+value.id+'/details">'
                            +
                           '<img src="<?php echo asset('/');?>storage/'+value.cover_image+'"" class="img-fluid lazy ">'
                            +
                            '</a>'
                            +
                           '<div class="tabnews_textgroup">'
                            +
                           '<div class="tabnews_name">'
                           +
                           value.title
                           +
                           '</div>'
                           +
                           '<div class="tabnews_price">'
                           +
                           value.price
                           +
                           '</div>'
                           +
                          '</div>'
                           +
                          '</div>'
                           );
                       });
         
                       }else{
                          $(".tabnews_block").empty();
                       }
         
                   }
             });
         });
         /*end*/
         /*for date filter*/
          $(function() {
               // $('.date_search').datepicker({
               //     dateFormat: 'yy-mm-dd',
               //     changeYear: true,
               //     changeMonth: true,
               //     showAnim: 'slideDown',
               //     yearRange: '-120:+0',
               // });
         
               $('#geburtsdatum').on('change', function() {
                   const inputValue = $('#geburtsdatum').val();
                   // alert(inputValue);
                   var token = $("input[name='_token']").val();
                     $.ajax({
                         url: "<?php echo route('filtermags') ?>",
                         method: 'POST',
                         data: {"from":inputValue,  "_token": "{{ csrf_token() }}"},
                         success: function(data) {
                          console.log(data);

                          if(data){
                   
                           $(".tabnews_block").empty();
                         
                           $.each(data,function(key,value){
                               $(".tabnews_block").append('<div class="tabnews_inner">'
                                +
                               '<a href="<?php echo url('magazines/')?>'+'/'+value.id+'/details">'
                                +
                               '<img src="<?php echo asset('/');?>storage/'+value.cover_image+'"" class="img-fluid lazy ">'
                                +
                                '</a>'
                                +
                               '<div class="tabnews_textgroup">'
                                +
                               '<div class="tabnews_name">'
                               +
                               value.title
                               +
                               '</div>'
                               +
                               '<div class="tabnews_price">'
                               +
                               value.price
                               +
                               '</div>'
                               +
                              '</div>'
                               +
                              '</div>'
                               );
                           });
             
                       }else{
                          $(".tabnews_block").empty();
                       }
                          
                                           
                       }
                   });
               });
         })
          /*end*/
      </script>
      {{-- end news --}}
     <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>

  </body>
</html>