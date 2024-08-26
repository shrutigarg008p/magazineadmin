@extends('layouts.customer')
@section('title', 'My Purchases')

@section('content')
    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">My Purchases</li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb -->

    <section class="my_download">
        <div class="container">
            <h3 class="sidesection_heading">My Purchases</h3>
            <div class="table-responsive">
                <table class="table_my_download">
                    <thead>
                        <tr class="tmd_head">
                            <th>Item</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="tmd_item">
                            <td><img src="{{ asset('assets/frontend/img/tmd1.jpg') }}" alt=""></td>
                            <td>Excepteur sint occaecat</td>
                            <td>$15.00</td>
                            <td><a href="{{ route('magazines.show') }}" class="tmd_read_btn">Read This Now</a></td>
                        </tr>
                        <tr class="tmd_item">
                            <td><img src="{{ asset('assets/frontend/img/tmd1.jpg') }}" alt=""></td>
                            <td>Excepteur sint occaecat</td>
                            <td>$15.00</td>
                            <td><a href="{{ route('magazines.show') }}" class="tmd_read_btn">Read This Now</a></td>
                        </tr>
                        <tr class="tmd_item">
                            <td><img src="{{ asset('assets/frontend/img/tmd1.jpg') }}" alt=""></td>
                            <td>Excepteur sint occaecat</td>
                            <td>$15.00</td>
                            <td><a href="{{ route('magazines.show') }}" class="tmd_read_btn">Read This Now</a></td>
                        </tr>
                        <tr class="tmd_item">
                            <td><img src="{{ asset('assets/frontend/img/tmd1.jpg') }}" alt=""></td>
                            <td>Excepteur sint occaecat</td>
                            <td>$15.00</td>
                            <td><a href="{{ route('magazines.show') }}" class="tmd_read_btn">Read This Now</a></td>
                        </tr>
                        <tr class="tmd_item">
                            <td><img src="{{ asset('assets/frontend/img/tmd1.jpg') }}" alt=""></td>
                            <td>Excepteur sint occaecat</td>
                            <td>$15.00</td>
                            <td><a href="{{ route('magazines.show') }}" class="tmd_read_btn">Read This Now</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    @include('customer.account.partials.footer')
@endsection
