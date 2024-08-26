@extends('layouts.customer')
@section('title', 'Magazines')

@section('content')
    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list"><a href="">News</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list"><a href="">Politics</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Duis aute irure</li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb -->

    <!-- detail page main section -->
    <section class="md_hg">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="md_left">
                        <img src="{{ asset('assets/frontend/img/nd-cover.jpg') }}" class="img-fluid lazy ">
                        <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="heading_share_icon">
                        <h1 class="md_hg_heading">Hope and Glory</h1>
                        <div class="share_icon_right">
                            <img src="{{ asset('assets/frontend/img/icon-share.png') }}">
                        </div>
                    </div>
                    <ul class="source_date">
                        <li class="sd_list">India Today</li>
                        <li class="sd_list">|</li>
                        <li class="sd_list">July 16, 2021</li>
                    </ul>
                    <div class="magazine_d_price">$15.00</div>
                    <div class="md_text_start">
                        <h2 class="mdtext_heading">Information</h2>
                        <p class="md_text_detail">Sed ut perspiciatis unde omnis iste natus error sit volupem accusium
                            doleque laudaium, totam rem aeriam, eaque ipsa quae ab illo inventore veritatis et quasi
                            architecto beatae vitae dicta sunt explicabo.</p>
                        <p class="md_text_detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                            occaecat cupitat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                    <div class="buttons_group">
                        <button class="md_readthis">Read This Now</button>
                        <button class="md_download">Open</button>
                    </div>
                    <div class="premium_icon"><img src="{{ asset('assets/frontend/img/icon-premium.png') }}" alt="">
                        Premium Edition</div>
                </div>
            </div>
        </div>
    </section>
    <!-- detail page main section -->
    <!-- Related Magazines -->
    <div class="container">
        <div class="heading_arrow_group">
            <h1 class="common_heading">Related Magazines</h1>
            <a href="#"><img src="{{ asset('assets/frontend/img/icon-next.png') }}" alt=""></a>
        </div>
        <section class="regular slider newspaper_slider">
            <div>
                <div class="inner_content">
                    <img src="{{ asset('assets/frontend/img/n1.jpg') }}" class="img-fluid lazy ">
                    <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                    <div class="newspaper_name">Daily Graphic</div>
                </div>
            </div>
            <div>
                <div class="inner_content">
                    <img src="{{ asset('assets/frontend/img/n2.jpg') }}" class="img-fluid lazy ">
                    <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                    <div class="newspaper_name">Graphic Sports</div>
                </div>
            </div>
            <div>
                <div class="inner_content">
                    <img src="{{ asset('assets/frontend/img/n3.jpg') }}" class="img-fluid lazy ">
                    <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                    <div class="newspaper_name">Graphic Business</div>
                </div>
            </div>
            <div>
                <div class="inner_content">
                    <img src="{{ asset('assets/frontend/img/n4.jpg') }}" class="img-fluid lazy ">
                    <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                    <div class="newspaper_name">Junior Graphic</div>
                </div>
            </div>
            <div>
                <div class="inner_content">
                    <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                    <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                    <div class="newspaper_name">Graphic Showbiz</div>
                </div>
            </div>
            <div>
                <div class="inner_content">
                    <img src="{{ asset('assets/frontend/img/n6.jpg') }}" class="img-fluid lazy ">
                    <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                    <div class="newspaper_name">The Mirror</div>
                </div>
            </div>
            <div>
                <div class="inner_content">
                    <img src="{{ asset('assets/frontend/img/n1.jpg') }}" class="img-fluid lazy ">
                    <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                    <div class="newspaper_name">Daily Graphic</div>
                </div>
            </div>
            <div>
                <div class="inner_content">
                    <img src="{{ asset('assets/frontend/img/n2.jpg') }}" class="img-fluid lazy ">
                    <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                    <div class="newspaper_name">Daily Graphic</div>
                </div>
            </div>
            <div>
                <div class="inner_content">
                    <img src="{{ asset('assets/frontend/img/n3.jpg') }}" class="img-fluid lazy ">
                    <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                    <div class="newspaper_name">Daily Graphic</div>
                </div>
            </div>
            <div>
                <div class="inner_content">
                    <img src="{{ asset('assets/frontend/img/n4.jpg') }}" class="img-fluid lazy ">
                    <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                    <div class="newspaper_name">Daily Graphic</div>
                </div>
            </div>
            <div>
                <div class="inner_content">
                    <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                    <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                    <div class="newspaper_name">Daily Graphic</div>
                </div>
            </div>
            <div>
                <div class="inner_content">
                    <img src="{{ asset('assets/frontend/img/n6.jpg') }}" class="img-fluid lazy ">
                    <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                    <div class="newspaper_name">Daily Graphic</div>
                </div>
            </div>
        </section>
    </div>

    <!-- top stories -->
    <div class="container">
        <div class="heading_arrow_group">
            <h1 class="common_heading">Top Stories</h1>
            <a href="#"><img src="{{ asset('assets/frontend/img/icon-next.png') }}" alt=""></a>
        </div>
        <section class="regular slider promoted_slider">
            <div>
                <div class="inner_box">
                    <img src="{{ asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy ">
                    <div class="box_content">
                        <p class="p_gamename">Sports</p>
                        <p class="p_gameheading">Gov’t donate GH¢470,000.00 to DOL Clubs</p>
                        <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                            04-05-2021
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="inner_box">
                    <img src="{{ asset('assets/frontend/img/ts2.jpg') }}" class="img-fluid lazy ">
                    <div class="box_content">
                        <p class="p_gamename">Sports</p>
                        <p class="p_gameheading">Gov’t donate GH¢470,000.00 to DOL Clubs</p>
                        <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                            04-05-2021
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="inner_box">
                    <img src="{{ asset('assets/frontend/img/ts3.jpg') }}" class="img-fluid lazy ">
                    <div class="box_content">
                        <p class="p_gamename">Sports</p>
                        <p class="p_gameheading">Gov’t donate GH¢470,000.00 to DOL Clubs</p>
                        <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                            04-05-2021
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="inner_box">
                    <img src="{{ asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy ">
                    <div class="box_content">
                        <p class="p_gamename">Sports</p>
                        <p class="p_gameheading">Gov’t donate GH¢470,000.00 to DOL Clubs</p>
                        <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                            04-05-2021
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="inner_box">
                    <img src="{{ asset('assets/frontend/img/ts2.jpg') }}" class="img-fluid lazy ">
                    <div class="box_content">
                        <p class="p_gamename">Sports</p>
                        <p class="p_gameheading">Gov’t donate GH¢470,000.00 to DOL Clubs</p>
                        <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                            04-05-2021
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="inner_box">
                    <img src="{{ asset('assets/frontend/img/ts3.jpg') }}" class="img-fluid lazy ">
                    <div class="box_content">
                        <p class="p_gamename">Sports</p>
                        <p class="p_gameheading">Gov’t donate GH¢470,000.00 to DOL Clubs</p>
                        <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                            04-05-2021
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="inner_box">
                    <img src="{{ asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy ">
                    <div class="box_content">
                        <p class="p_gamename">Sports</p>
                        <p class="p_gameheading">Gov’t donate GH¢470,000.00 to DOL Clubs</p>
                        <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                            04-05-2021
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="inner_box">
                    <img src="{{ asset('assets/frontend/img/ts2.jpg') }}" class="img-fluid lazy ">
                    <div class="box_content">
                        <p class="p_gamename">Sports</p>
                        <p class="p_gameheading">Gov’t donate GH¢470,000.00 to DOL Clubs</p>
                        <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                            04-05-2021
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="inner_box">
                    <img src="{{ asset('assets/frontend/img/ts3.jpg') }}" class="img-fluid lazy ">
                    <div class="box_content">
                        <p class="p_gamename">Sports</p>
                        <p class="p_gameheading">Gov’t donate GH¢470,000.00 to DOL Clubs</p>
                        <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                            04-05-2021
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="inner_box">
                    <img src="{{ asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy ">
                    <div class="box_content">
                        <p class="p_gamename">Sports</p>
                        <p class="p_gameheading">Gov’t donate GH¢470,000.00 to DOL Clubs</p>
                        <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                            04-05-2021
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="inner_box">
                    <img src="{{ asset('assets/frontend/img/ts2.jpg') }}" class="img-fluid lazy ">
                    <div class="box_content">
                        <p class="p_gamename">Sports</p>
                        <p class="p_gameheading">Gov’t donate GH¢470,000.00 to DOL Clubs</p>
                        <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                            04-05-2021
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="inner_box">
                    <img src="{{ asset('assets/frontend/img/ts3.jpg') }}" class="img-fluid lazy ">
                    <div class="box_content">
                        <p class="p_gamename">Sports</p>
                        <p class="p_gameheading">Gov’t donate GH¢470,000.00 to DOL Clubs</p>
                        <div class="p_date"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                            04-05-2021
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
