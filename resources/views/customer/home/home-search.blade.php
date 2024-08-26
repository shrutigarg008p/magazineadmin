@extends('layouts.customer')
@section('title', 'Home Search')
@section('content')

    <div class="container">
    <div class="magazines_with_price" ></div>
   </div>

    <!-- red -->
    <section class="graphic_red">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mob_order text-right">
                    <img src="{{ asset('assets/frontend/img/deive-mob.png') }}">
                </div>
                <div class="col-md-7 graphic_red_right">
                    <p class="graphic_red_text">Graphic NewsPlus is available for all devices.</p>
                    <div class="store_logo">
                        <img src="{{ asset('assets/frontend/img/appstore.png') }}" alt="">
                        <img src="{{ asset('assets/frontend/img/playstore.png') }}" alt="">
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
