@extends('layouts.admin')
@section('title', 'Dashboard')
@section('pageheading')
    Dashboard
@endsection
@section('content')
    <div class="container-fluid">

        @include('admin.dashboard._filters')
        
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total->users }}</h3>

                        <p>Total Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    @can('manage users')
                        <a href="{{ route('admin.users.index', ['type' => App\Models\User::CUSTOMER]) }}"
                        class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    @endcan
                    
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total->android_users }}</h3>

                        <p>Android Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    @can('manage users')
                        <a href="{{ route('admin.users.index', ['type' => App\Models\User::CUSTOMER,'platform'=>'android']) }}"
                        class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    @endcan
                    
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total->web_users }}</h3>

                        <p>Web Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    @can('manage users')
                        <a href="{{ route('admin.users.index', ['type' => App\Models\User::CUSTOMER,'platform'=>'web']) }}"
                        class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    @endcan
                    
                </div>
            </div>
             <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total->ios_users }}</h3>

                        <p>IOS Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    @can('manage users')
                        <a href="{{ route('admin.users.index', ['type' => App\Models\User::CUSTOMER,'platform'=>'ios']) }}"
                        class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    @endcan
                    
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total->vendors }}</h3>

                        <p>Total Vendors</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    @can('manage users')
                        <a href="{{ route('admin.users.index', ['type' => App\Models\User::VENDOR]) }}"
                        class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    @endcan
                    
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total->newspapers }}</h3>
                        <p>Total Newspapers</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    @can('newspapers')
                        <a href="{{route('admin.newspapers.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    @endcan
                    
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total->magazines }}</h3>

                        <p>Total Magazines</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    @can('magazines')
                        <a href="{{route('admin.magazines.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    @endcan
                    
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total->subsciptions }}</h3>

                        <p>Total Active Subscriptions</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    @can('plans')
                        <a href="{{route('admin.subscriptionReport')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    @endcan
                    
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total->mag_downloads }}</h3>

                        <p>Magazines Downloads</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    @can('reports')
                        <a href="{{route('admin.E_Report')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    @endcan
                    
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total->news_downloads }}</h3>

                        <p>Newspaper Downloads</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    @can('reoprts')
                        <a href="{{route('admin.E_Report')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    @endcan
                    
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
