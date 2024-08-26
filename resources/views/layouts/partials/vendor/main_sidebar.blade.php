<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('vendor.dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/backend/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Magazine VENDOR</span>
    </a>
    @php
        $navActive = 'active';
        $menuOpen = 'menu-is-opening menu-open';
        $urlSegmentTwo = request()->segment(2) ?? 'account';
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
                    <a href="{{ route('vendor.dashboard') }}"
                        class="nav-link {{ $urlSegmentTwo === 'dashboard' ? $navActive : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('vendor.magazines.index') }}"
                        class="nav-link {{ $urlSegmentTwo === 'magazines' ? $navActive : '' }}">
                        <i class="fas fa-book-open"></i>
                        <p>
                            Magazines
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{ route('vendor.newspapers.index') }}"
                        class="nav-link {{ $urlSegmentTwo === 'newspapers' ? $navActive : '' }}">
                        <i class="fas fa-newspaper"></i>
                        <p>
                            Newspapers
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('vendor.sales.index') }}"
                        class="nav-link {{ $urlSegmentTwo === 'sales' ? $navActive : '' }}">
                        <i class="fas fa-money-check"></i>
                        <p>
                            Sales
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
