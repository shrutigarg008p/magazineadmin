@extends('layouts.customer')
@section('title', 'Home')
@section('content')
<style>
    .slick-slider{
        width: -webkit-fill-available;
        height: -webkit-fill-available;
    }
    .promoted_slider .promoted_image, .stories_slider .stories_image{
        height: 170px;
    }
</style>
    @include('customer.home.banner-2')

    <div id="main">
        <?php

        if( empty($posValue) || $posValue->isEmpty() ) {

            $posValue = [
                'topics', 'categories', 'newspaper', 'magazines',
                'videos', 'promoted_contents', 'top_stories',
                'podcasts', 'galleries', 'instagram', 'ads'
            ];
        } else {
            $posValue = $posValue->pluck('section')->toArray();
        }

        foreach($posValue as $value){
            switch ($value) {
                case "newspapers":
                ?>
                    <div class="mt-3">
                        @include('customer.home.newspaper')
                    </div>
                    <?php 
                    break;
                case "categories":
                ?>
                    <div class="mt-3">
                        @include('customer.home.popular_categories')
                    </div>
                    <?php 
                    break;
                case "magazines":
                ?>
                    <div class="mt-3">
                        @include('customer.home.popular_magazine')
                    </div>
                    <?php 
                    break;
                case "videos":
                ?>
                    <div class="mt-3">
                        @include('customer.home.videos')
                    </div>
                    <?php 
                    break;
                case "promoted_contents":
                ?>
                    <div class="mt-3">
                        @include('customer.home.popular_content')
                    </div>
                    <?php 
                    break;
                case "top_stories":
                ?>
                    <div class="mt-3">
                        @include('customer.home.top_stories')
                    </div>
                    <?php
                    break;
                case "podcasts":
                    ?>
                    <div class="mt-3">
                        @include('customer.home.podcasts')
                    </div>

                    <?php 
                    break;
                case "galleries":
                    ?>
                    <div class="mt-3">
                        @include('customer.home.galleries')
                    </div>
                    <?php 
                    break;
                case "topics":
                    ?>
                    <div class="mt-3">
                        @include('customer.home.topics_to_follow')
                    </div>
                    <?php 
                    break;
                case "instagram":
                    ?>
                    <div class="mt-3">
                        @include('customer.home.instagram_posts')
                    </div>
                    <?php 
                    break;
                case "ads":
                    ?>
                    <?php 
                    break;
                default:
                ?>
        <?php 
            }    
        } 
        ?>
    </div>

    <!-- red -->
    <section class="graphic_red mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mob_order text-right">
                    <img src="{{ asset('assets/frontend/img/deive-mob.png') }}">
                </div>
                <div class="col-md-7 graphic_red_right">
                    <p class="graphic_red_text">Graphic NewsPlus is available for all devices.</p>
                    <div class="store_logo">
                        <a href="https://apps.apple.com/in/app/graphic-newsplus/id1602213036" target="_blank"><img src="{{ asset('assets/frontend/img/appstore.png') }}" alt=""></a>
                        <a href="https://play.google.com/store/apps/details?id=com.graphicnewsplus" target="_blank"><img src="{{ asset('assets/frontend/img/playstore.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- red -->
@endsection
@section('scripts')
    <script src="{{ asset('assets/frontend/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {
            $(".lazy").slick({
                dots: true,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
            });
        });
    </script>

    <script type="text/javascript">
        $(document).on('ready', function() {
            $(".newspaper_slider").slick({
                infinite: true,
                slidesToShow: 6,
                slidesToScroll: 4,
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
            $(".promoted_slider").slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            infinite: true
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
            $(".gallaries_slider").slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 4,
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            infinite: true
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        });
    </script>
@endsection
