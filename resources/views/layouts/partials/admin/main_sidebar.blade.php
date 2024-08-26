<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/backend/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Magazine ADMIN</span>
    </a>
    @php
        $CUSTOMER = App\Models\User::CUSTOMER;
        $VENDOR = App\Models\User::VENDOR;
        $systemusers = 'systemusers';
        
        $navActive = 'active';
        $menuOpen = 'menu-is-opening menu-open';
        $urlSegmentTwo = request()->segment(2) ?? 'account';
        $userType = request()->get('type');
        // @dd($urlSegmentTwo)
    @endphp
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @php($userdata = request()->user())
            <div class="image">
                <img src="{{ asset('assets/backend/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="javascript:;" class="d-block">{{ $userdata->name }}</a>
                <span class="badge badge-pill badge-success">{{ $userdata->type_text }}</span>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ $urlSegmentTwo === 'dashboard' ? $navActive : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                @can('manage users')
                    <li class="nav-item {{ in_array($urlSegmentTwo,['users', 'systemusers', 'affiliations']) ? $menuOpen : '' }}">
                        <a href="#" class="nav-link {{ $urlSegmentTwo === 'users' ? $navActive : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Manage Users
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}"
                                    class="nav-link {{ $urlSegmentTwo === 'users' && !request()->has('type') ? $navActive : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        All
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index', ['type' => $VENDOR]) }}"
                                    class="nav-link {{ $urlSegmentTwo === 'users' && request()->get('type') == $VENDOR ? $navActive : '' }}">
                                    <i class="nav-icon fas fa-user-tie"></i>
                                    <p>
                                        Vendors
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index', ['type' => $CUSTOMER]) }}"
                                    class="nav-link {{ $urlSegmentTwo === 'users' && request()->get('type') == $CUSTOMER ? $navActive : '' }}">
                                    <i class="nav-icon fas fa-user-friends"></i>
                                    <p>
                                        Subscribers
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.users.systemUsers') }}"
                                    class="nav-link {{ $urlSegmentTwo === 'systemusers' ? $navActive : '' }}">
                                    <i class="nav-icon fas fa-user-friends"></i>
                                    <p>
                                        System Users
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index', ['type' => \App\Models\User::COMPANY]) }}"
                                    class="nav-link {{ ($urlSegmentTwo === 'users' && $userType == \App\Models\User::COMPANY) ? $navActive : '' }}">
                                    <i class="nav-icon fas fa-user-friends"></i>
                                    <p>
                                        Companies
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.affiliations') }}"
                                    class="nav-link {{ $urlSegmentTwo === 'affiliations' ? $navActive : '' }}">
                                    <i class="nav-icon fas fa-user-friends"></i>
                                    <p>
                                        Affiliations
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{route('admin.heard_from')}}"
                        class="nav-link {{ $urlSegmentTwo === 'heard_from' ? $navActive : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Heard From Listing
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.banner.edit', ['id' => 1])}}"
                        class="nav-link {{ $urlSegmentTwo === 'banner' ? $navActive : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Web Banner
                        </p>
                    </a>
                </li>
                @can('magazines')
                    <li class="nav-item">
                        <a href="{{route('admin.magazines.index')}}"
                            class="nav-link {{ $urlSegmentTwo === 'magazines' ? $navActive : '' }}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Magazines
                                {{-- <span class="right badge badge-danger">New</span> --}}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('newspapers')
                    <li class="nav-item">
                        <a href="{{route('admin.newspapers.index')}}"
                            class="nav-link {{ $urlSegmentTwo === 'newspapers' ? $navActive : '' }}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Newspapers
                                {{-- <span class="right badge badge-danger">New</span> --}}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('categories')
                    <li class="nav-item">
                        <a href="{{ route('admin.magcats.index') }}"
                            class="nav-link {{ $urlSegmentTwo === 'magcats' ? $navActive : '' }}">
                            <i class="nav-icon fas fa-th-list"></i>
                            <p>
                                Categories
                                {{-- <span class="right badge badge-danger">New</span> --}}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('publication')
                    <li class="nav-item">
                        <a href="{{ route('admin.publications.index') }}"
                            class="nav-link {{ $urlSegmentTwo === 'publications' ? $navActive : '' }}">
                            <i class="nav-icon fas fa-laptop-house"></i>
                            <p>
                                Publications
                                {{-- <span class="right badge badge-danger">New</span> --}}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('plans')
                    <li class="nav-item">
                        <a href="{{ route('admin.plans.index') }}"
                            class="nav-link {{ $urlSegmentTwo === 'plans' ? $navActive : '' }}">
                            <i class="nav-icon fas fa-money-check-alt"></i>
                            <p>
                                Plans
                                {{-- <span class="right badge badge-danger">New</span> --}}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('refunds')
                    <li class="nav-item">
                        <a href="{{ route('admin.refund.index') }}"
                            class="nav-link {{ $urlSegmentTwo === 'refund' ? $navActive : '' }}">
                            <i class="nav-icon fas fa-money-check-alt"></i>
                            <p>
                                Refunds
                            </p>
                        </a>
                    </li>
                @endcan
                @can('gallery', 'podcasts', 'videos')
                    <li class="nav-item {{ in_array($urlSegmentTwo, ['galleries', 'podcasts','videos']) ? $menuOpen : '' }}">
                        <a href="#"
                            class="nav-link {{ in_array($urlSegmentTwo, ['galleries', 'podcasts','videos']) ? $navActive : '' }}">
                            <i class="nav-icon fas fa-photo-video"></i>
                            <p>
                                Manage Media
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('gallery')
                                <li class="nav-item">
                                    <a href="{{ route('admin.galleries.index') }}"
                                        class="nav-link {{ $urlSegmentTwo === 'galleries' ? $navActive : '' }}">
                                        <i class="nav-icon fas fa-images"></i>
                                        <p>
                                            Galleries
                                            {{-- <span class="right badge badge-danger">New</span> --}}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('podcasts')
                                <li class="nav-item">
                                    <a href="{{ route('admin.podcasts.index') }}"
                                        class="nav-link {{ $urlSegmentTwo === 'podcasts' ? $navActive : '' }}">
                                        <i class="nav-icon fas fa-compact-disc"></i>
                                        <p>
                                            Podcasts
                                            {{-- <span class="right badge badge-danger">New</span> --}}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('videos')
                                <li class="nav-item">
                                    <a href="{{ route('admin.videos.index') }}"
                                        class="nav-link {{ $urlSegmentTwo === 'videos' ? $navActive : '' }}">
                                        <i class="nav-icon fas fa-video"></i>
                                        <p>
                                            Videos
                                            {{-- <span class="right badge badge-danger">New</span> --}}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            
                        </ul>
                    </li>
                @endcan
                
                @can('blogs')
                    <li class="nav-item {{ in_array($urlSegmentTwo, ['blogs', 'blogcats', 'blog_plans']) ? $menuOpen : '' }}">
                        <a href="#"
                            class="nav-link {{ in_array($urlSegmentTwo, ['blogs', 'blogcats']) ? $navActive : '' }}">
                            <i class="nav-icon fas fa-blog"></i>
                            <p>
                                Blogs
                                <i class="fas fa-angle-blog right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- <li class="nav-item">
                                <a href="{{ route('admin.blogcats.index') }}"
                                    class="nav-link {{ $urlSegmentTwo === 'blogcats' ? $navActive : '' }}">
                                    <i class="nav-icon fas fa-scroll"></i>
                                    <p>
                                        Categories
                                    </p>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('admin.blogs.index') }}"
                                    class="nav-link {{ $urlSegmentTwo === 'blogs' ? $navActive : '' }}">
                                    <i class="nav-icon fas fa-paste"></i>
                                    <p>
                                        Blog Posts
                                    </p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('admin.blog_plans.index') }}"
                                    class="nav-link {{ $urlSegmentTwo === 'blog_plans' ? $navActive : '' }}">
                                    <i class="nav-icon fas fa-paste"></i>
                                    <p>
                                        Blog Plans
                                    </p>
                                </a>
                            </li> --}}
                        </ul>
                    </li> 
                @endcan
                
                    
                    {{--  <li class="nav-item">
                            <a href="{{ route('admin.ads.index') }}"
                                class="nav-link {{ $urlSegmentTwo === 'magcats' ? $navActive : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Ads
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.adscreen.index') }}"
                                class="nav-link {{ $urlSegmentTwo === 'magcats' ? $navActive : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    AdsScreen
                                </p>
                            </a>
                        </li> 
                    --}}
                @can('ads')
                    <li class="nav-item {{ in_array($urlSegmentTwo, ['ads', 'adscreen']) ? $menuOpen : '' }}">
                        <a href="#"
                            class="nav-link {{ in_array($urlSegmentTwo, ['ads', 'adscreen']) ? $navActive : '' }}">
                            <i class="nav-icon fas fa-ad"></i>
                            <p>
                                Ads
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.ads.index') }}"
                                    class="nav-link {{ $urlSegmentTwo === 'ads' ? $navActive : '' }}">
                                    <i class="nav-icon fas fa-ad"></i>
                                    <p>
                                        Ads
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.adscreen.index') }}"
                                    class="nav-link {{ $urlSegmentTwo === 'adscreen' ? $navActive : '' }}">
                                    <i class="nav-icon fas fa-audio-description"></i>
                                    <p>
                                        AdsScreen
                                    </p>
                                </a>
                            </li>
                        </ul>
                    
                    </li>
                @endcan
                @can('appleplan')
                    <li class="nav-item">
                        <a href="{{ route('admin.appleplan.index') }}"
                            class="nav-link {{ $urlSegmentTwo === 'appleplan' ? $navActive : '' }}">
                            <i class="nav-icon fas fa-money-check-alt"></i>
                            <p>
                                Apple Price
                            </p>
                        </a>
                    </li> 
                @endcan
                @can('coupons')
                    <li class="nav-item">
                        <a href="{{ route('admin.coupon.index') }}"
                            class="nav-link {{ $urlSegmentTwo === 'coupon' ? $navActive : '' }}">
                            <i class="nav-icon fas fa-dice"></i>
                            <p>
                                Coupons
                            </p>
                        </a>
                    </li> 
                @endcan
                @can('positions')
                    <li class="nav-item">
                        <a href="{{ url('admin/custom') }}"
                            class="nav-link {{ $urlSegmentTwo === 'magcats' ? $navActive : '' }}">
                            <i class="nav-icon fas fa-network-wired"></i>
                            <p>
                                Positions
                            </p>
                        </a>
                    </li> 
                @endcan
                
                @can('notifications')
                    <li class="nav-item">
                        <a href="{{ route('admin.notif_templates.index') }}"
                            class="nav-link {{ $urlSegmentTwo === 'notif_templates' ? $navActive : '' }}">
                            <i class="nav-icon fas fa-bell"></i>
                            <p>
                                Notifications
                            </p>
                        </a>
                    </li>
                @endcan
                

                {{-- <li class="nav-item">
                    <a href="{{ route('admin.changeview') }}"
                        class="nav-link {{ $urlSegmentTwo === 'changeview' ? $navActive : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Change Password
                        </p>
                    </a>
                </li> --}}
                @can('rss')
                    <li class="nav-item">
                        <a href="{{ route('admin.rss_feed_mgt.index') }}"
                            class="nav-link {{ $urlSegmentTwo === 'rss_feed_mgt' ? $navActive : '' }}">
                            <i class="nav-icon fas fa-rss-square"></i>
                            <p>
                                Rss Feeds
                            </p>
                        </a>
                    </li>
                @endcan
                @can('content manager')
                    <li class="nav-item">
                        <a href="{{ route('admin.content_manager.index') }}"
                            class="nav-link {{ $urlSegmentTwo === 'content_manager' ? $navActive : '' }}">
                            <i class="nav-icon fas fa-bookmark"></i>
                            <p>
                                Content Manager
                            </p>
                        </a>
                    </li>
                @endcan

                <li class="nav-item">
                    <a href="{{ route('admin.payments.index') }}"
                        class="nav-link {{ $urlSegmentTwo === 'payments' ? $navActive : '' }}">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Payments
                        </p>
                    </a>
                </li>
                
                @can('reports')
                    <li class="nav-item {{ in_array($urlSegmentTwo, ['reports']) ? $menuOpen : '' }}">
                        <a href="#"
                            class="nav-link {{ in_array($urlSegmentTwo, ['reports']) ? $navActive : '' }}">
                            <i class="nav-icon fas fa-photo-video"></i>
                            <p>
                                Report Manager
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.userreport',['type'=>App\Models\User::CUSTOMER])}}"
                                    class="nav-link {{ $urlSegmentTwo === 'userreport' ? $navActive : '' }}">
                                    <i class="nav-icon fas fa-images"></i>
                                    <p>
                                        User Registration
                                        {{-- <span class="right badge badge-danger">New</span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.userreport',['type'=>App\Models\User::VENDOR])}}"
                                    class="nav-link {{ $urlSegmentTwo === 'users' ? $navActive : '' }}">
                                    <i class="nav-icon fas fa-images"></i>
                                    <p>
                                        Vendor Registration
                                        {{-- <span class="right badge badge-danger">New</span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.E_Report')}}"
                                    class="nav-link {{ $urlSegmentTwo === ' download_report' ? $navActive : '' }}">
                                    <i class="nav-icon fas fa-download"></i>
                                    <p>
                                        Download Report
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.subscriptionReport')}}"
                                    class="nav-link {{ $urlSegmentTwo === ' subscription_report' ? $navActive : '' }}">
                                    <i class="nav-icon fas fa-download"></i>
                                    <p>
                                        Subscriptions Report
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.ad_reading_views_report')}}"
                                    class="nav-link {{ $urlSegmentTwo === ' ad_reading_views_report' ? $navActive : '' }}">
                                    <i class="nav-icon fas fa-download"></i>
                                    <p>
                                        Clicks Analytics
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li> 
                @endcan
            
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
