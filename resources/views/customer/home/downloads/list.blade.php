@extends('layouts.customer')
@section('title', 'Magazines & Newspapers')
@section('content')
    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{ url('customer') }}">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">
                    Downloads
                </li>
            </ul>
        </div>
    </section>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="sidesection_right">
                    <div class="magazines_with_price" style="margin-top: 0">
                        {{-- Magazines Downloads --}}
                        @foreach ($magazinesData as $magDatas)
                            <div class="all_magazines">
                                <img src="{{ asset('storage/' . $magDatas->cover_image) }}" class="img-fluid lazy ">
                                <div class="magazine_name">{{ $magDatas->title }}</div>
                                <div class="magazine_price">{{ to_price($magDatas->price, true) }}</div>
                                <div class="magazine_with_price_btns">
                                    <a href="{{ url("pdf/{$magDatas->id}/viewer") }}">Open</a>
                                </div>
                                <p class="all_magazines__published_date">{{$magDatas->published_date->format('d M, Y')}}</p>
                            </div>
                        @endforeach
                        {{-- Newpapers Downloads --}}
                        @foreach ($newspapersData as $newsDatas)
                            <div class="all_magazines">
                                <img src="{{ asset('storage/' . $newsDatas->cover_image) }}" class="img-fluid lazy ">
                                <div class="magazine_name">{{ $newsDatas->title }}</div>
                                <div class="magazine_price">{{ to_price($newsDatas->price, true) }}</div>
                                <div class="magazine_with_price_btns">
                                    <a href="{{ url("pdf/{$newsDatas->id}/pdfviewer") }}">Open</a>
                                </div>
                                <p class="all_magazines__published_date">{{$newsDatas->published_date->format('d M, Y')}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
