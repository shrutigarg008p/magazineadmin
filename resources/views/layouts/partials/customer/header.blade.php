{{-- 
<section class="top_stripe">
   <div class="container">
      <div class="top_annoucement">
         <img src="{{ asset('assets/frontend/img/announcement.png') }}" alt="">
         <?php $trendnews =  App\Models\Blog::where('top_story',1)->active()->latest()->first('title'); ?>
         <p class="announcement_text"><span>Trending News :</span> {{$trendnews->title}}</p>
      </div>
   </div>
</section>
--}}
<?php  $check = Auth::user();
if($check){
$id=Auth::user()->id;
$user = App\Models\User::find($id);
$user =  $user->isCustomer();  
}else{
   $user = "";
}

?>
<section class="top_navlogo">
   <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark secondary-color">
         <a class="navbar-brand logo_desktop" href="{{url('')}}"><img src="{{ asset('assets/frontend/img/logo.png') }}"></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-6"
            aria-controls="navbarSupportedContent-6" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="sign_in_right_desktop">
            <div id="sb-search" class="sb-search ml-auto">
               <form id="sb-search-input-form">
                  <input class="sb-search-input" placeholder="Enter your search term..." type="text" value=""
                     name="search" id="search">
                  <input class="sb-search-submit" type="submit" value="">
                  <span class="sb-icon-search"></span>
               </form>
            </div>
            <div class="search_text">Search</div>
            <div class="user_dropdowns">
               @if(!Auth::user() && !$user)
               <div class="sign_in">
                  <a href="{{ route('login') }}">
                  <img src="{{ asset('assets/frontend/img/icon-sign.png') }}"> Sign In
                  </a>
               </div>
               @else
               @if(Auth::user() && $user)
               <button class="drop_btn" onclick="user_account()">
                  {{ Auth::user()->name }} <i class="fa fa-angle-down ml-1 drop_btn"></i>
               </button>
               
               <div id="user_dropdown" class="dropdown_content dropdown_content_mob">
                  <a href="{{ route('profile') }}">My Profile</a>
                  <a href="{{url('subscriptions') }}">My Subscriptions</a>
                  <a href="{{url('user/my_purchases') }}">My Purchases</a>
                  <a href="{{url('archive/list') }}">Archive</a>
                  <a href="{{ route('magazines') }}">Magazines</a>
                  <a href="{{ url('newspapers/list') }}">Newspapers</a>
                  <a href="#">Graphic Services</a>
                  <a href="{{ url('bookmarks/list') }}">Bookmarks</a>
                  <a href="{{ url('refer-friend') }}">Refer Friends</a>
                  <a href="{{ route('aboutus') }}">About Us</a>
                  {{--  <a href="{{ route('cp.referfriend') }}">Refer a Friend</a>
                  <a href="{{ route('cp.settings') }}">Setting</a> --}}
                  <form id="logout_form" action="{{ route('logout') }}" method="post">
                     @csrf
                     <a class="dropdown-item" href="javascript:;" role="button" title="logout"
                        onclick="event.preventDefault(); $('#logout_form').submit();">
                     Logout
                     </a>
                  </form>
               </div>
               @else
                <div class="sign_in">
                  <a href="{{ route('login') }}">
                  <img src="{{ asset('assets/frontend/img/icon-sign.png') }}"> Sign In
                  </a>
               </div>
               @endif
               @endif
            </div>
         </div>
      </nav>
   </div>
</section>
<section class="top_navmenu">
   <nav class="navbar">
      <div class="container">
         <section class="wrapper">
            <a class="navbar-brand logo_mob" href="/"><img src="{{ asset('assets/frontend/img/logo.png') }}"></a>
            <button type="button" class="burger" id="burger">
            <span class="burger-line"></span>
            <span class="burger-line"></span>
            <span class="burger-line"></span>
            <span class="burger-line"></span>
            </button>
            <div class="menu" id="menu">
               <ul class="menu-inner">
                  <li class="menu-item"><a href="{{ route('home') }}" class="menu-link {{  request()->routeIs('home') ? 'active' : '' }}">Home</a>
                  <li class="menu-item"><a href="{{ route('news') }}" class="menu-link {{  request()->routeIs('news') ? 'active' : '' }}">Newspapers</a>
                  <li class="menu-item"><a href="{{ route('magazines') }}"
                     class="menu-link {{  request()->routeIs('magazines') ? 'active' : '' }}">Magazines</a></li>
                  </li>
                  <li class="menu-item"><a href="#" class="menu-link">Graphic
                     Services</a>
                  </li>
                  <li class="menu-item"><a href="{{ route('faq') }}" class="menu-link">FAQ</a></li>
                  <li class="menu-item"><a href="{{ url('all_plans') }}" class="menu-link {{  request()->routeIs('all_plans') ? 'active' : '' }}">Pricing</a></li>
                  <li class="menu-item"><a href="{{ route('contactus') }}" class="menu-link {{  request()->routeIs('contactus') ? 'active' : '' }}">Contact Us</a>
                  <li class="menu-item"><a href="{{ route('aboutus') }}" class="menu-link {{  request()->routeIs('aboutus') ? 'active' : '' }}">About Us
                     </a>
                  </li>
                  @if(!Auth::user() && !$user)
                  <li class="menu-item search_sign_mob">
                     <div class="sign_in">
                        <a href="{{ route('login') }}">
                        <img src="{{ asset('assets/frontend/img/icon-sign.png') }}"> Sign In
                        </a>
                     </div>
                  </li>
                   <li class="menu-item search_sign_mob">
                     <div id="sb-search1" class="sb-search sb-search-open ml-auto">
                        <form id="sb-search-input-form">
                           <input class="sb-search-input" placeholder="Enter your search term..." type="text"
                              value="" name="search" id="search2">
                           <input class="sb-search-submit" type="submit" value="">
                           <span class="sb-icon-search"></span>
                        </form>
                     </div>
                  </li>
                  @else
                  @if(Auth::user() && $user)
                  <li class="menu-item search_sign_mob">
                     <div class="sign_in user_dropdown">
                        <button  class="drop_btn">
                        {{-- <img src="{{ asset('assets/frontend/img/user-img.png')}}"> --}}   {{ Auth::user()->name }} <i onclick="user_account_mob()" class="fa fa-angle-down ml-1 drop_btn"></i>
                        </button>
                        <div id="user_dropdown_mob" class="dropdown_content dropdown_content_mob">
                           <a href="{{ route('profile') }}">My Profile</a>
                           <a href="{{url('subscriptions') }}">My Subscriptions</a>
                           <a href="{{url('archive/list') }}">Archive</a>
                           <a href="{{url('user/downloads') }}">My Purchases</a>
                           <a href="{{ route('magazines') }}">Magazines</a>
                           <a href="{{ url('newspapers/list') }}">Newspapers</a>
                           <a href="#">Graphic Services</a>
                           <a href="{{ url('bookmarks/list') }}">Bookmarks</a>
                           <a href="{{ url('refer-friend') }}">Refer Friends</a>
                           <a href="{{ route('aboutus') }}">About Us</a>
                           {{--  <a href="{{ route('cp.referfriend') }}">Refer a Friend</a>
                           <a href="{{ route('cp.settings') }}">Setting</a> --}}
                           <form id="logout_form" action="{{ route('logout') }}" method="post">
                              @csrf
                              <a class="dropdown-item" href="javascript:;" role="button" title="logout"
                                 onclick="event.preventDefault(); $('#logout_form').submit();">
                              Logout
                              </a>
                           </form>
                        </div>
                     </div>
                  </li>
                  <li class="menu-item search_sign_mob">
                     <div id="sb-search1" class="sb-search sb-search-open ml-auto">
                        <form id="sb-search-input-form">
                           <input class="sb-search-input" placeholder="Enter your search term..." type="text"
                              value="" name="search" id="search2">
                           <input class="sb-search-submit" type="submit" value="">
                           <span class="sb-icon-search"></span>
                        </form>
                     </div>
                  </li>
               </ul>
            </div>
            <div class="social_icon ml-auto">
               <ul>
                  <li><a href="https://m.facebook.com/dailygraphicghana"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="https://twitter.com/Graphicgh?t=UjTUYQHnaBHwIuItxYSdtw&s=09"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="https://www.instagram.com/graphic.com.gh/"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="https://www.youtube.com/c/GraphicOnlineTV"><i class="fa fa-youtube"></i></a></li>
               </ul>
            </div>
            @else
             <li class="menu-item search_sign_mob">
                     <div class="sign_in">
                        <a href="{{ route('login') }}">
                        <img src="{{ asset('assets/frontend/img/icon-sign.png') }}"> Sign In
                        </a>
                     </div>
                  </li>

            @endif
            @endif
         </section>
      </div>
   </nav>
</section>