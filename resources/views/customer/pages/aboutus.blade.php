@extends('layouts.customer')
@section('title', 'Home')

@section('content')
    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">About Us</li>
            </ul>
        </div>
    </section>
    <section class="about_magazine">
        <div class="container">
            <h3 class="sidesection_heading">About Us</h3>
            <div class="am_text_group">
                <p class="am_text">Graphic NewsPlus provides you with digital versions of Graphic Communications’ six
                    leading newspaper publications: The Daily Graphic, Graphic Business, Graphic Showbiz, The Mirror,
                    Graphic Sports and Junior Graphic.</p>
                <p class="am_text">This is a completely new version which offers readers access to both digital
                    versions of newspapers and content from our 24-hour news website in addition to breaking news alerts.
                </p>
                <p class="am_text">This new version named Graphic NewsPlus is also packed with multimedia content
                    such
                    as video documentaries, podcasts, voice notes and photo galleries carefully curated to inform, entertain
                    and educate you on current and latest news in Ghana.</p>
            </div>
            <div class="block_with_img">
                <div class="row">
                    <div class="flex_justify">
                        <div class="col-md-6"><img src="{{ asset('assets/frontend/img/about1.jpg') }}" alt=""
                                class="img-fluid lazy "></div>
                        <div class="col-md-6">
                            <h3 class="sidesection_heading">Nemo enim ipsam voluptatem quia voluptas sit</h3>
                            <p class="am_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exerction ullaco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui mollit anim id est
                                laborum.</p>
                            <p class="am_text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                acusantium doloremque laudaium, aperiam, eaque ipsa quae ab illo inventore veritatis et
                                quasi architecto beatae vitae dicta sunt explicabo.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block_with_img">
                <div class="row">
                    <div class="flex_justify">
                        <div class="col-md-6 flex_img_top">
                            <h3 class="sidesection_heading">Ut enim ad minima veniam, quis nostrum exercitationem</h3>
                            <p class="am_text">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                                porro quisquam est, qui dolorem ipsum quia dolor sit amet, conectetur, adipisci velit, sed
                                qia non numam eius modi tempora incidunt ut labore et dolore magnam voluptatem. </p>
                            <p class="am_text">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                blanditiis praesentium voluptum atqe corupti quos dlores et quas molstias excepturi sint
                                occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia
                                animi, id est laborum et dolorum fuga.</p>
                        </div>
                        <div class="col-md-6"><img src="{{ asset('assets/frontend/img/about2.jpg') }}" alt=""
                                class="img-fluid lazy "></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about_grey_block">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="grey_block_group">
                        <h3 class="sidesection_heading">Sed ut perspiciatis unde omnis iste natus</h3>
                        <p class="am_text">Nemo enim ipsam volutatem quia voluptas sit aspntur aut odit aut fugit,
                            sed quia coequuntur magni dolores eos qui ratione volptatem sequi nesciunt. Neque porro qsam
                            est, qui dolorem ipsum quia dolor sit amet, conectetur, adipisci velit, sed qia non numam eius
                            modi tempora incidunt ut labore et mnam voluptatem. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="grey_block_group">
                        <h3 class="sidesection_heading">Excepteur sint occaecat cupidatat</h3>
                        <p class="am_text">Lorem ipsum dolor sit amet, coctetur aiiscing elit, sed do eiusmod tempor
                            inciidunt ut labore et dore maga aliqa. Ut enim ad minim veniam, quis nostrud exetation ullamco
                            laboris nisi ut aliquip ex ea comdo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="sidesection_heading">Quis autem vel eum iure reprehenderit</h3>
                    <p class="am_text">At vero eos et accusam et iusto odio digsimos ducimus qui blanditiis
                        praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                        occaecati cupiditate non provident, similique sunt in culpa qui officia desent mollitia animi, id
                        est sint ocat cupidatat laborum et dolorum fuga.</p>
                </div>
            </div>
        </div>
    </section>

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
