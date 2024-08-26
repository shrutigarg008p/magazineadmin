<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @php
        $webcustom = App\Models\Ad::where('ads_type', 'Web')->first();
        $pub_id = $webcustom->g_ads_id ?? null;
    @endphp

    @if ($pub_id)
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ $pub_id }}"
            crossorigin="anonymous"></script>
    @endif
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <meta name="description" content="@yield('meta_description', 'Graphic Newsplus')">
    <meta name="keywords" content="@yield('meta_keywords', 'magazine, newspaper, top stories, popular content, breaking news, entertainment, ghana news, africa news')">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="@yield('title', 'Graphic Newsplus')" />
    <meta name="twitter:description" content="@yield('meta_description', 'Graphic Newsplus')" />
    <meta name="twitter:site" content="@Graphicgh" />
    <meta name="twitter:image" content="@yield('meta_image', asset('assets/frontend/img/logo_big.png'))" />
    <meta property="og:description" content="@yield('meta_description', 'Graphic Newsplus')" />
    <meta property="og:title" content="@yield('title', 'Graphic Newsplus')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:image" content="@yield('meta_image', asset('assets/frontend/img/logo_big.png'))" />
    <title>@yield('title') | {{ config('app.name', 'Graphic Newsplus') }}</title>
    {{-- new --}}
    <link rel="resource" type="application/l10n" href="{{ URL::asset('pdf/web/locale/locale.properties') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Favicon  -->
    <link href="{{ asset('favicon-mag.png') }}" rel="icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- jQuery Datatable Style -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/jquery.dataTables.min.css') }}">
    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/backend/css/adminlte.min.css') }}"> --}}
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/custom/vendor.css') }}">
    <!-- Pdf Css -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/pdf-turn.css') }}">
    {{-- new --}}
    <title>@yield('title') | {{ config('app.name', 'Graphic Newsplus') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/intlTelInput.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/component.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer"
         /> --}}
    @include('layouts._css')
    @yield('styles')

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LRZTBCEFYL"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-LRZTBCEFYL');
    </script>
    <meta name="facebook-domain-verification" content="a37ca13i187blq6d6kpi75b4dszr6y" />
</head>

<body>
    <style>
      /* Aug 31, inline css minified */
        @media (max-width:640px){.home_banner img.img-fluid{height:auto!important;min-height:300px}}.bookmark_promoted,.bookmark_top_stories{width:30%;margin-right:3%;margin-bottom:15px;position:relative}.bookmark_promoted .book_stories_image,.bookmark_top_stories .book_stories_image{max-height:150px;overflow:hidden;display:block}.bookmark_promoted .box_content,.bookmark_top_stories .box_content,.promoted_slider .box_content{height:auto}.tabnews_block{clear:both}.bookmark_magazines,.bookmark_newspapers{width:23%;float:left;position:relative;margin-right:10px}.bookmark_magazines a.book_magazine_image,.bookmark_newspapers .book_magazine_image{height:260px;overflow:hidden;display:block}.tabnews_textgroup.podcasts{border:1px solid #e0e0e0}.modal{z-index:9999}.link_list{color:red}.link_list:hover{color:#04aa6d}.magazines_with_price.bookmark .all_magazines{width:250px!important}.home_banner .inner_group .blog_image:before{content:'';position:absolute;width:100%;height:250px;bottom:0;background:#000;background:-moz-linear-gradient(360deg,#000 0,rgba(255,255,255,0) 100%);background:-webkit-linear-gradient(360deg,#000 0,rgba(255,255,255,0) 100%);background:linear-gradient(360deg,#000 0,rgba(255,255,255,0) 100%)}.bundle_block .tab .tabbundle_links.active,button.md_readthis{background:#ca0a0a;color:#fff}.gallaries_slider .video_box{border-radius:15px;display:inline-block}.gallaries_slider a.galleries_image{overflow:hidden;height:227px;display:inline-block}#chalf-yearly,#cmonthly,#cthree-month,#cyearly,#half-yearly,#monthly,#three-month,#yearly,.modal-img,.news_pdf_icons{display:none}img.img-fluid.modal-img-slider{width:212px;height:191px}button.md_readthis{height:50px;border:0;font-size:16px;font-weight:600;border-radius:3px;padding:0 30px;margin-right:20px;width:200px;float:left}.category-tab .tabnews_inner{width:153px}.bundle_block{border:1px solid #ccc;border-radius:3px;padding:20px;margin-bottom:30px}.bundle_block .tab{background:#e0e0e0;width:max-content;margin:0 auto;border-radius:50px}.bundle_block .tab .tabbundle_links{background:0 0;border:0;height:45px;padding:0 20px;border-radius:50px}.container_bundle{display:block;position:relative;cursor:pointer;font-size:22px;-webkit-user-select:none;-moz-user-select:none;width:33%;height:26px;padding:0;margin:0;-ms-user-select:none;user-select:none}.container_bundle input.bundle{position:absolute;opacity:0;cursor:pointer}.checkmark_bundle{position:absolute;top:0;left:0;height:26px;width:26px;background-color:#eee;border-radius:50%}.container_bundle:hover input.bundle~.checkmark_bundle{background-color:#ccc}.container_bundle input.bundle:checked~.checkmark_bundle{background-color:#fff;border:4px solid #ca0a0a}.checkmark_bundle:after{content:"";position:absolute;display:none}.container_bundle input.bundle:checked~.checkmark_bundle:after{display:block}.container_bundle .checkmark_bundle:after{top:4px;left:4px;width:10px;height:10px;border-radius:50%;background:#ca0a0a}.bd_block{border:1px solid #ccc;border-radius:3px;padding:10px 20px;display:flex;justify-content:flex-start;align-items:center;margin-top:20px}.bd_heading{font-size:14px;color:#000;font-weight:500;width:33%}.bd_heading span{display:block;color:#898989}.btm_radio .container_bundle{width:auto;height:auto}.btm_radio .radio_btn_text{padding-left:40px;font-size:14px;color:#000}.btm_radio .checkmark_bundle{top:5px}.btm_radio{display:flex;align-items:flex-start;margin-bottom:30px}.plans_pay_due{font-size:16px;font-weight:500;text-align:center;margin-bottom:20px}.plans_pay_due span.currency{font-size:32px;color:#ca0a0a;display:block;font-weight:600}.all_planspay_btn{width:100%;max-width:500px;height:50px;background:#ca0a0a;border:0;color:#fff;font-size:16px;font-weight:600;text-transform:uppercase;border-radius:5px;margin:0 auto;display:block}.plans_checkout{margin-bottom:30px}.bd_heading:last-child{text-align:right}.sv_icons_right{display:flex;align-items:center}.video_icon_right{margin-right:30px}.parsley-errors-list.filled,div#vidModal{opacity:1}input.parsley-success,select.parsley-success,textarea.parsley-success{color:#468847;background-color:#dff0d8;border:1px solid #d6e9c6}input.parsley-error,select.parsley-error,textarea.parsley-error{color:#b94a48;background-color:#f2dede;border:1px solid #eed3d7}.parsley-errors-list{margin:2px 0 3px;padding:0;list-style-type:none;font-size:.9em;line-height:.9em;opacity:0;color:#b94a48;transition:.3s ease-in;-o-transition:.3s ease-in;-moz-transition:.3s ease-in;-webkit-transition:.3s ease-in}li.parsley-custom-error-message{margin:-13px 96px 15px -204px}.profile-tab{list-style:none;display:flex;align-items:center}.profile-tab a{font-size:15px;color:#fff}.profile-tab a.dropdown-item{color:#212529}.profile-tab .dropdown-menu.dropdown-menu-right.show{min-width:100px;top:29px}.inner_box_img{overflow:hidden;height:206px;background:#edf0f6}.invalid-feedback{text-align:left}#toggle_pwd{cursor:pointer}img#toggle_rcpwd,img#toggle_rpwd{margin:-78px -114px 29px 343px}.promoted_slider .promoted_image{display:flex;align-items:center;justify-content:center;background:#f2f2f2}.magazines_img_data,.news_img_data,.stor_img_data{height:180px;overflow:hidden}.home_banner .blog_image{display:flex;justify-content:center}
    </style>

    <!-- Header -->
    @section('header')
        @include('layouts.partials.customer.header')
    @show
    <!-- /.Header -->
    <!-- Content -->
    <div class="magazines_with_price justify-content-center" style="display: none"></div>
    <div id="main2">
        @yield('content')
    </div>
    <!-- - Content -->
    <!-- footer -->
    @section('footer')
        @include('layouts.partials.customer.footer')
    @show
    <!-- footer -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-2.2.0.min.js') }}"></script> {{-- site breaks without this version of jquery --}}
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <!-- top_header_search -->
    <script src="{{ asset('assets/frontend/js/classie.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/uisearch.js') }}"></script>
    <script src="{{ asset('js/speech.js') }}"></script>
    <script src="{{ asset('js/videos.js') }}"></script>
    <script src="{{ asset('js/podcasts.js') }}"></script>
    <script src="{{ asset('js/galleries.js') }}"></script>
    <script src="{{ asset('js/eyeicon.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/utils.min.js') }}"></script>
    {{-- PDF Flip --}}
    <script src="{{ asset('assets/frontend/js/parsley.min.js') }}"></script>

    {{-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script> --}}
    <script>
        new UISearch(document.getElementById('sb-search'));
    </script>
    <script>
        new UISearch(document.getElementById('sb-search1'));
    </script>
    <script src="{{ asset('assets/frontend/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
    <!-- top_header_search -->

    <script src="//cdn.jsdelivr.net/npm/vanilla-lazyload@17.8.3/dist/lazyload.min.js"></script>
    <script>
        $(document).ready(function() {
            new LazyLoad({});

            var Toaster = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 10000,
                timerProgressBar: true,
                didOpen: function(toast) {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                    toast.addEventListener('click', Swal.close);
                }
            });

            @if (Session::has('success'))
                Toaster.fire({
                    icon: 'success',
                    title: "{{ Session::pull('success') }}"
                });
            @elseif (Session::has('error'))
                Toaster.fire({
                    icon: 'error',
                    title: "{{ Session::pull('error') }}"
                });
            @elseif (Session::has('info'))
                Toaster.fire({
                    icon: 'info',
                    title: "{{ Session::pull('info') }}"
                });
            @endif

        });
    </script>
    <script>
        // Initialize All Required DOM Element
        const burgerMenu = document.getElementById("burger");
        const navbarMenu = document.getElementById("menu");

        // Initialize Responsive Navbar Menu
        burgerMenu.addEventListener("click", () => {
            burgerMenu.classList.toggle("active");
            navbarMenu.classList.toggle("active");

            if (navbarMenu.classList.contains("active")) {
                navbarMenu.style.maxHeight = navbarMenu.scrollHeight + "px";
            } else {
                navbarMenu.removeAttribute("style");
            }
        });
    </script>
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
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });


            /*podcast*/
            $(".podcast_slider").slick({
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
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 480,
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

            /*end*/

            $(".gallaries_sliderModal").slick({
                dots: true,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
            });

            $(".promoted_slider").slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 3,
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 4,
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
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }

                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });

            $(".videos_slider").slick({
                infinite: true,
                slidesToShow: 4,
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
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });

            $(".insta_slider").slick({
                infinite: true,
                slidesToShow: 6,
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

            $(".gallaries_slider").slick({
                infinite: true,
                slidesToShow: 6,
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
    {{-- for publication filter --}}
    <script type="text/javascript">
        function publication_list_change() {
            var id = $(this).val();
            // alert(id);
            $('.all_select').removeClass('active');
            var AuthUser = "{{ Auth::user() ? Auth::user()->country : null }}";

            var token = $("input[name='_token']").val();
            $.ajax({
                url: "<?php echo route('filter'); ?>",
                method: 'POST',
                data: {
                    "publication_id": id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    // alert(data);

                    if (data != "") {

                        if (AuthUser != "" && AuthUser == "GH") {
                            var country = "GHS";
                        } else {
                            var country = "USD";
                        }


                        $(".magazines_with_price").empty();

                        $.each(data, function(key, value) {
                            $(".magazines_with_price").append(
                                '<div class="all_magazines magazine_slider">' +
                                // '<div class="btn_hover">'
                                // +
                                '<a  class="magazine_image" href="<?php echo url('magazines/'); ?>' + '/' + value
                                .id + '/details">' +
                                '<img src="<?php echo asset('/'); ?>storage/' + value.cover_image +
                                '" class="img-fluid">' +
                                '</a>' +

                                '<img src="" class="news_pdf_icon">'

                                +
                                '<div class="magazine_name">' + value.title +
                                '</div>' +
                                '<div class="magazine_price">' + country + " " + value.price +
                                '</div>' +

                                '</div>');
                        });

                    } else {
                        // $(".magazines_with_price").empty();
                        $(".magazines_with_price").html("Data Not Found");
                    }

                }
            });
        }

        $(".publication_list_item").click(function(e) {
            const self = this;

            $(".publication_list_item").map(function() {
                $(this).toggleClass('text-danger', this == self);
            });

            publication_list_change.apply(self, [e]);
        });

        $("select[name='publication']").change(publication_list_change);
        /*end*/
        /*for date filter*/
        $(function() {

            $('.date_search').on('change', function() {
                const inputValue = $('.date_search').val();
                // alert(inputValue);
                $('.all_select').removeClass('active');

                var AuthUser = "{{ Auth::user() ? Auth::user()->country : null }}";

                var token = $("input[name='_token']").val();
                $.ajax({
                    url: "<?php echo route('filter'); ?>",
                    method: 'POST',
                    data: {
                        "from": inputValue,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data != "") {
                            if (AuthUser != "" && AuthUser == "GH") {
                                var country = "GHS";
                            } else {
                                var country = "USD";
                            }
                            $(".magazines_with_price").empty();
                            $.each(data, function(key, value) {

                                // console.log(value);
                                $(".magazines_with_price").append(
                                    '<div class="all_magazines magazine_slider">' +

                                    '<a class="magazine_image" href="<?php echo url('magazines/'); ?>' +
                                    '/' + value.id + '/details">' +
                                    '<img src="<?php echo asset('/'); ?>storage/' + value
                                    .cover_image + '" class="img-fluid">' +
                                    '</a>' +

                                    '<img src="" class="news_pdf_icon">'

                                    +
                                    '<div class="magazine_name">' + value.title +
                                    '</div>' +
                                    '<div class="magazine_price">' + country + " " +
                                    value.price +
                                    '</div>'

                                    +
                                    '</div>'
                                );
                            });

                        } else {
                            // $(".magazines_with_price").empty();
                            $(".magazines_with_price").html("Data Not Found");
                        }

                    }
                });
            });
        })
        /*end*/
    </script>
    <script type="text/javascript">
        function publication_news_list_item() {
            var id = $(this).val();
            // alert(id+"shiv");
            $('.all_select').removeClass('active');
            var AuthUser = "{{ Auth::user() ? Auth::user()->country : null }}";

            var token = $("input[name='_token']").val();
            $.ajax({
                url: "<?php echo url('filter/news'); ?>",
                method: 'POST',
                data: {
                    "publication_id": id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    // alert(data);

                    if (data != "") {
                        if (AuthUser != "" && AuthUser == "GH") {
                            var country = "GHS";
                        } else {
                            var country = "USD";
                        }

                        $(".magazines_with_price").empty();

                        $.each(data, function(key, value) {
                            $(".magazines_with_price").append(
                                '<div class="all_magazines newspaper_slider">' +
                                // '<div class="btn_hover">'
                                // +
                                '<a class="newspaper_image" href="<?php echo url('newspapers/'); ?>' + '/' + value
                                .id + '/details">' +
                                '<img src="<?php echo asset('/'); ?>storage/' + value.cover_image +
                                '" class="img-fluid">' +
                                '</a>' +

                                '<img src="" class="news_pdf_icon">' +

                                '<div class="magazine_name">' + value.title +
                                '</div>' +
                                '<div class="magazine_price">' + country + " " + value.price +
                                '</div>' +

                                '</div>');
                        });

                    } else {
                        // $(".magazines_with_price").empty();
                        $(".magazines_with_price").html("Data Not Found");

                    }

                }
            });
        }
        $(".publication_list_news_item").click(function(e) {
            const self = this;

            $(".publication_list_news_item").map(function() {
                $(this).toggleClass('text-danger', this == self);
            });

            publication_news_list_item.apply(self, [e]);
        });
        $("select[name='publication_news']").change(publication_news_list_item);
        /*end*/
        /*for date filter*/
        $(function() {


            $('.date_search_news').on('change', function() {
                const inputValue = $('.date_search_news').val();
                // alert(inputValue);
                $('.all_select').removeClass('active');

                var AuthUser = "{{ Auth::user() ? Auth::user()->country : null }}";

                var token = $("input[name='_token']").val();
                $.ajax({
                    url: "<?php echo url('filter/news'); ?>",
                    method: 'POST',
                    data: {
                        "from": inputValue,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        // console.log(data);
                        if (data != '') {
                            if (AuthUser != "" && AuthUser == "GH") {
                                var country = "GHS";
                            } else {
                                var country = "USD";
                            }
                            $(".magazines_with_price").empty();
                            $.each(data, function(key, value) {

                                // console.log(value);
                                $(".magazines_with_price").append(
                                    '<div class="all_magazines newspaper_slider">' +
                                    '<a class="newspaper_image" href="<?php echo url('newspapers/'); ?>' +
                                    '/' + value.id + '/details">' +
                                    '<img src="<?php echo asset('/'); ?>storage/' + value
                                    .cover_image + '" class="img-fluid">' +
                                    '</a>' +
                                    '<img src="" class="news_pdf_icon">' +
                                    '<div class="magazine_name">' + value.title +
                                    '</div>' +
                                    '<div class="magazine_price">' + country + " " +
                                    value.price +
                                    '</div>' +

                                    '</div>'
                                );
                            });

                        } else {
                            // $(".magazines_with_price").empty();
                            $(".magazines_with_price").html("Data Not Found");
                        }
                    }
                });
            });
        })
        /*end*/
    </script>
    <script type="text/javascript">
        function _input_text_debounce(a, b, c) {
            var d;
            return function() {
                var e = this,
                    f = arguments;
                clearTimeout(d), d = setTimeout(function() {
                    d = null, c || a.apply(e, f)
                }, b), c && !d && a.apply(e, f)
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const memo = {};
            let searchGoing = false;
            let lastQuery;

            function _renderContent(content = '') {
                if (content == '') {
                    $(".magazines_with_price").html(content);
                    $(".magazines_with_price").hide();
                    $('#main, #main2').show();
                } else {
                    $(".magazines_with_price").html(content);
                    $(".magazines_with_price").show();
                    $('#main, #main2').hide();
                }
            }


            $("#sb-search-input-form").submit(function(e) {
                e.preventDefault();
                return false;
            });

            $('#search').keyup(_input_text_debounce(function() {
                var query = $(this).val().trim();

                if (searchGoing || lastQuery === query) {
                    return;
                }

                if (!query) {
                    return _renderContent(); // render home
                }

                if (memo[query]) {
                    return _renderContent(memo[query]);
                }

                $.ajax({
                    url: "<?php echo url('home-search'); ?>",
                    method: 'POST',
                    data: {
                        "search": query,
                        "_token": "{{ csrf_token() }}"
                    },
                    beforeSend: function() {
                        searchGoing = true;
                        lastQuery = query;
                    },
                    success: function(data) {
                        // console.log(data);
                        if (data != "") {
                            memo[query] = data;
                            _renderContent(data);
                        }
                    },
                    complete: function() {
                        searchGoing = false;
                    }
                });
            }, 650));
        });
    </script>
    <script type="text/javascript">
        $('#search2').keyup(function() {
            var query = $(this).val();

            $.ajax({
                url: "<?php echo url('home-search'); ?>",
                method: 'POST',
                data: {
                    "search": query,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    // console.log(data);
                    if (data != "") {
                        $(".magazines_with_price").html(data);
                        $(".magazines_with_price").show();
                        $('#main, #main2').hide();
                    } else {
                        // $('#main').show()
                    }
                }

            });


        });
    </script>
    <script type="text/javascript">
        $(document).on('click', '.news_pdf_icon', function() {
            // alert();
            var id = $(this).attr('data-id');
            var type = $(this).attr('data-type');
            // alert(type);

            if (type == "newspaper") {

                $.ajax({
                    url: "<?php echo url('set_bookmark'); ?>",
                    method: 'POST',
                    data: {
                        "id": id,
                        "type": type,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        // console.log(data);
                        swal({
                                title: data.success,
                                icon: "success",
                            })
                            .then((ok) => {
                                location.reload();
                            });
                    }

                });
            } else {
                $.ajax({
                    url: "<?php echo url('set_bookmark'); ?>",
                    method: 'POST',
                    data: {
                        "id": id,
                        "type": type,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {

                        // console.log(data);
                        swal({
                                title: data.success,
                                icon: "success",
                            })
                            .then((ok) => {
                                location.reload();
                            });
                    }
                });
            }

        });
    </script>
    <script type="text/javascript">
        var auth_check = @json(Auth::check());

        $(document).ready(function() {
            if (auth_check) $(".news_pdf_icons").addClass('d-block');
        });

        $(document).on('click', '.news_pdf_icons', function() {
            // alert();
            var id = $(this).attr('data-id');
            var type = $(this).attr('data-type');
            // alert(type);

            if (type == "top_story") {

                $.ajax({
                    url: "<?php echo url('set_bookmark'); ?>",
                    method: 'POST',
                    data: {
                        "id": id,
                        "type": type,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        // console.log(data);
                        swal({
                                title: data.success,
                                icon: "success",
                            })
                            .then((ok) => {
                                location.reload();
                            });
                    }

                });
            } else {
                $.ajax({
                    url: "<?php echo url('set_bookmark'); ?>",
                    method: 'POST',
                    data: {
                        "id": id,
                        "type": type,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {

                        // console.log(data);
                        swal({
                                title: data.success,
                                icon: "success",
                            })
                            .then((ok) => {
                                location.reload();
                            });
                    }
                });
            }

        });
    </script>
    <script>
        /* When the user clicks on the button, 
                 toggle between hiding and showing the dropdown content */
        function user_account() {
            document.getElementById("user_dropdown").classList.toggle("show");
        }

        function user_account_mob() {
            document.getElementById("user_dropdown_mob").classList.toggle("show");
        }
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop_btn')) {
                var dropdowns = document.getElementsByClassName("dropdown_content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
    <script>
        function sharePost(type, url) {
            // console.log(url);
            window.close();
            if (type == 'facebook') {
                window.open(
                    "https://www.facebook.com/sharer/sharer.php?&u=" + url,
                    "_blank", "width=600, height=450");
                // "https://www.facebook.com/sharer/sharer.php?&u=https://gcgl.dci.in/public", 
                // "_blank", "width=600, height=450"); 
            } else if (type == 'twitter') {
                window.open(
                    "https://twitter.com/intent/tweet?url=" + url,
                    "_blank", "width=600, height=450");
            } else if (type == 'linkedin') {
                window.open(
                    "https://www.linkedin.com/shareArticle?mini=true&url=" + url,
                    "_blank", "width=600, height=450");
            } else if (type == 'pinterest') {
                window.open(
                    "https://pinterest.com/pin/create/button/?url=" + url,
                    "_blank", "width=600, height=450");
            } else if (type == 'whatsapp') {
                var number = '';
                var message = url.split(' ').join('%20');
                window.open(
                    "https://api.whatsapp.com/send?phone=" + number + "&text=%20" + message,
                    "_blank", "width=600, height=450");
            }
        }
    </script>
    {{-- for publication filter archive --}}
    <script type="text/javascript">
        $("select[name='publication_archive_mags']").change(function() {
            var id = $(this).val();
            var AuthUser = "{{ Auth::user() ? Auth::user()->country : null }}";
            // alert(id);
            // alert(AuthUser);
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "<?php echo route('archive'); ?>",
                method: 'POST',
                data: {
                    "publication_id": id,
                    "type": "magazine",
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    // console.log(data);

                    if (data != "") {

                        if (AuthUser != "" && AuthUser == "GH") {
                            var country = "GHS";
                        } else {
                            var country = "USD";
                        }

                        $(".tabnews_block").empty();

                        $.each(data, function(key, value) {
                            $(".tabnews_block").append(
                                '<div class="all_magazines magazine_slider">' +
                                '<a  class="magazine_image" href="<?php echo url('magazines/'); ?>' +
                                '/' + value.id + '/details">' +
                                '<img src="<?php echo asset('/'); ?>storage/' + value
                                .cover_image + '" class="img-fluid archive">' +
                                '</a>' +
                                '<img src="" class="news_pdf_icon">' +
                                '<div class="tabnews_textgroup">' +
                                '<div class="tabnews_name">' + value.title + '</div>' +
                                '</div>' +
                                '<div class="magazine_d_price">' + country + " " + value
                                .price +
                                '</div>' +
                                '</div>');
                        });

                    } else {
                        // $(".magazines_with_price").empty();
                        $(".tabnews_block").html("Data Not Found");
                    }

                }
            });
        });
        /*end*/
        /*for date filter*/
        $(function() {

            $('.date_archive_mags').on('change', function() {
                var AuthUser = "{{ Auth::user() ? Auth::user()->country : null }}";

                const inputValue = $('.date_archive_mags').val();
                // alert(inputValue);
                var token = $("input[name='_token']").val();
                $.ajax({
                    url: "<?php echo route('archive'); ?>",
                    method: 'POST',
                    data: {
                        "from": inputValue,
                        "type": "magazine",
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data != "") {
                            if (AuthUser != "" && AuthUser == "GH") {
                                var country = "GHS";
                            } else {
                                var country = "USD";
                            }
                            $(".tabnews_block").empty();
                            $.each(data, function(key, value) {

                                $(".tabnews_block").append(
                                    '<div class="all_magazines magazine_slider">' +
                                    '<a  class="magazine_image" href="<?php echo url('magazines/'); ?>' +
                                    '/' + value.id + '/details">' +
                                    '<img src="<?php echo asset('/'); ?>storage/' + value
                                    .cover_image + '" class="img-fluid archive">' +
                                    '</a>' +
                                    '<img src="" class="news_pdf_icon">' +
                                    '<div class="tabnews_textgroup">' +
                                    '<div class="tabnews_name">' + value.title +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="magazine_d_price">' + country +
                                    " " + value.price +
                                    '</div>' +
                                    '</div>');
                            });

                        } else {
                            // $(".magazines_with_price").empty();
                            $(".tabnews_block").html("Data Not Found");
                        }

                    }
                });
            });
        })
        /*end*/
    </script>
    <script type="text/javascript">
        $("select[name='publication_archive_news']").change(function() {
            var id = $(this).val();
            // alert(id);
            var AuthUser = "{{ Auth::user() ? Auth::user()->country : null }}";
            // alert(AuthUser);
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "<?php echo route('archive'); ?>",
                method: 'POST',
                data: {
                    "publication_id": id,
                    "type": "newspaper",
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    // console.log(data);

                    if (data != "") {

                        if (AuthUser != "" && AuthUser == "GH") {
                            var country = "GHS";
                        } else {
                            var country = "USD";
                        }

                        $(".tabnews_block").empty();

                        $.each(data, function(key, value) {
                            $(".tabnews_block").append(
                                '<div class="all_magazines magazine_slider">' +
                                // '<div class="btn_hover">'
                                // +
                                '<a  class="magazine_image" href="<?php echo url('newspapers/'); ?>' +
                                '/' + value.id + '/details">' +
                                '<img src="<?php echo asset('/'); ?>storage/' + value
                                .cover_image + '" class="img-fluid archive">' +
                                '</a>' +

                                '<img src="" class="news_pdf_icon">'

                                +

                                '<div class="tabnews_textgroup">' +
                                '<div class="tabnews_name">' + value.title + '</div>' +
                                '</div>' +
                                '<div class="magazine_d_price">' + country + " " + value
                                .price +
                                '</div>' +

                                '</div>');
                        });

                    } else {
                        // $(".magazines_with_price").empty();
                        $(".tabnews_block").html("Data Not Found");
                    }

                }
            });
        });
        /*end*/
        /*for date filter*/
        $(function() {

            $('.date_archive_news').on('change', function() {
                var AuthUser = "{{ Auth::user() ? Auth::user()->country : null }}";
                const inputValue = $('.date_archive_news').val();
                // alert(inputValue);
                var token = $("input[name='_token']").val();
                $.ajax({
                    url: "<?php echo route('archive'); ?>",
                    method: 'POST',
                    data: {
                        "from": inputValue,
                        "type": "newspaper",
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data != "") {
                            if (AuthUser != "" && AuthUser == "GH") {
                                var country = "GHS";
                            } else {
                                var country = "USD";
                            }
                            $(".tabnews_block").empty();
                            $.each(data, function(key, value) {

                                $(".tabnews_block").append(
                                    '<div class="all_magazines magazine_slider">' +
                                    '<a  class="magazine_image" href="<?php echo url('newspapers/'); ?>' +
                                    '/' + value.id + '/details">' +
                                    '<img src="<?php echo asset('/'); ?>storage/' + value
                                    .cover_image + '" class="img-fluid archive">' +
                                    '</a>' +
                                    '<img src="" class="news_pdf_icon">' +
                                    '<div class="tabnews_textgroup">' +
                                    '<div class="tabnews_name">' + value.title +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="magazine_d_price">' + country +
                                    " " + value.price +
                                    '</div>' +
                                    '</div>');
                            });
                        } else {
                            // $(".magazines_with_price").empty();
                            $(".tabnews_block").html("Data Not Found");
                        }


                    }
                });
            });
        })
        /*end*/
    </script>
    <script>
        var phone_number = window.intlTelInput(document.querySelector(".phone"), {
            separateDialCode: true,
            preferredCountries: ["in"],
            hiddenInput: "full",
            utilsScript: "{{ asset('assets/frontend/js/utils.min.js') }}"
        });
    </script>
    @yield('scripts')
    @include('layouts._js')
    @include('common.keep_token_alive')
</body>

</html>
