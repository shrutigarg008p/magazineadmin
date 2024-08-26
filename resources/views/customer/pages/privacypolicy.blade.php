@extends('layouts.customer')
<?php

$title=isset($content->title)?'- '.$content->title:'';
?>
@section('title', " $title")

@section('content')
 <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
                <li class="breadcrumb_list">></li>
               <?php
               if($content->title == "About Us"){
               ?>
                <li class="breadcrumb_list">About Us</li>
                 <?php }

                elseif ($content->title == "FAQ") {
                    // code...
                ?>
                <li class="breadcrumb_list">FAQ</li>
                <?php }

                elseif ($content->title == "Privacy Policy"){ ?>
                <li class="breadcrumb_list">Privacy Policy</li>
                <?php }


                elseif ($content->title == "Policies & Licences"){  ?>
                <li class="breadcrumb_list">Policies & Licences</li>
                <?php }


                elseif ($content->slug == "courtesies"){ ?>
                <li class="breadcrumb_list">Courtesies</li>
                <?php }


                elseif ($content->slug == "web_terms"){ ?>
                <li class="breadcrumb_list">Terms & Conditions</li>
                <?php }



                else{ ?>
                {{-- <li class="breadcrumb_list"></li> --}}


                <?php } ?>
            </ul>
        </div>
    </section>
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphic {{isset($content->title)?'- '.$content->title:''}}</title>
</head>
<body> --}}

    <section class="about_magazine">
        <div class="container">
            @if(isset($content->page_content))
                @php echo $content->page_content; @endphp
            @endif
        </div>
    </section>
 
 @endsection   
{{-- </body>
</html> --}}





