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


      <div class="tabnews_tabs">
      
          <div class="heading_arrow_group heading_bg_light">
            <h1 class="common_heading"></h1> 
          </div>
          <div class="tabnews_block">
            
            @foreach($data as $magDatas)

            <div class="tabnews_inner">
            <a href="">
              <img src="{{ asset('storage/'.$magDatas['cover_image']) }}" class="img-fluid lazy ">
            </a>
              <div class="tabnews_textgroup">
                <div class="tabnews_name">{{$magDatas['title']}}</div>
                <div class="tabnews_price">{{$magDatas['price']}}</div>
              </div>
            </div>
            @endforeach
           
          </div>
        </div>
        
      </div>
    </div>


  </body>
</html>