<!-- footer -->
<?php  $check = Auth::user();
if($check){
$id=Auth::user()->id;
$user = App\Models\User::find($id);
$user =  $user->isCustomer();  
}else{
   $user = "";
}

?>
<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="footer_group">
                    {{-- <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="" class="img-fluid"> --}}
                      @if($check !=  null && $user)
                     <a class="navbar-brand logo_desktop" href="{{route('customer.home')}}"><img src="{{ asset('assets/frontend/img/logo.png') }}"></a>
                     @else
                     <a class="navbar-brand logo_desktop" href="{{route('home')}}"><img src="{{ asset('assets/frontend/img/logo.png') }}"></a>   
                     @endif
                    <p class="f_logotext">Graphic NewsPlus provides you
                        with digital versions of Graphic
                        Communications’ six leading
                        newspaper publications: The Daily Graphic, Graphic Business, Graphic Showbiz, The Mirror,
                        Graphic Sports and Junior Graphic. + 233 551484843</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer_group">
                    <h1 class="common_heading">Information</h1>
                    <ul class="footer_nav">
                        <li><a href="{{ route('aboutus') }}">About Us</a></li>
                        <li><a href="{{ url('vendor/register') }}">Vendor Registration</a></li>

                         @if(!Auth::user())
                        <li><a href="{{ route('login') }}">Magazines</a></li>
                        @else
                        <li><a href="{{ route('magazines') }}">Magazines</a></li>
                        @endif
                         @if(!Auth::user())
                        <li><a href="{{ route('login') }}">News</a></li>
                        @else
                        <li><a href="{{ route('news') }}">News</a></li>

                        @endif
                        <li><a href="#">Graphic Services</a></li>
                        @if(!Auth::user())
                        <li><a href="{{ route('login') }}">Contact us</a></li>

                        @else
                        <li><a href="{{ route('contactus') }}">Contact us</a></li>

                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer_group">
                    <h1 class="common_heading">Help</h1>
                    <ul class="footer_nav">
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                        @if(!Auth::user())
                        <li><a href="{{ route('login') }}">Sign In</a></li>
                        @endif
                        <li><a href="{{url('privacyPolicy')}}">Privacy Policy</a></li>
                        <li><a href="{{url('policiesandlicences')}}">Policies and Licenses</a></li>
                        <li><a href="{{url('courtesies')}}">Courtesis from GDPR and other laws</a></li>
                        <li><a href="{{url('terms')}}">Terms and Conditions</a></li>


                    </ul>
                </div>
            </div>
           {{--  <div class="col-lg-3 col-md-6">
                <div class="footer_group">
                    @php
                    $userid=Auth::user()->id ?? "";
                    $ft = App\Models\UserInfo::where('user_id',$userid)->first()->favourite_topics ?? [];
                    $topics = !empty($ft)?json_decode($ft):[];
                    // return $topics;
                     if(!empty($topics)){
                    $categories = App\Models\Category::where('popular',1)->whereIn('id',$topics)->active()->latest()->get();
                    $mags= App\Models\Magazine::with('category','publication')->whereIn('category_id',$topics)->get();
                    $news= App\Models\Newspaper::with('category','publication')->whereIn('category_id',$topics)->get();


                    }else{
                        $categories  = App\Models\Category::where('popular',1)->active()->latest()->get();
                        $news= App\Models\Newspaper::with('category','publication')->get();
                        $mags= App\Models\Magazine::with('category','publication')->get();
                    }
                    @endphp
                    <h1 class="common_heading">Top Categories</h1>
                    <ul class="footer_nav">
                         @if(Auth::user())
                        @foreach($categories as $catsData)
                        <li><a href="{{url("categories/$catsData->id/details")}}">{{$catsData->name}}</a></li>
                        @endforeach
                        @else
                       
                        @foreach($categories as $catsData)
                        <li><a href="{{route('login')}}">{{$catsData->name}}</a></li>
                  
                        @endforeach
                      
                        @endif
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- footer -->

<!-- footer bottom -->
<section class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="copyright">© 2015 - {{date('Y')}} Graphic NewsPlus All rights reserved.</p>
            </div>
            <div class="col-md-6 social_footer">
                <div class="social_icon">
                    <ul>
                        <li><a target="_blank" href="https://m.facebook.com/dailygraphicghana"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/Graphicgh?t=UjTUYQHnaBHwIuItxYSdtw&s=09"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/graphicdigitalgh/"><i class="fa fa-instagram"></i></a></li>
                        <li><a target="_blank" href="https://www.youtube.com/c/GraphicOnlineTV"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- footer bottom -->
