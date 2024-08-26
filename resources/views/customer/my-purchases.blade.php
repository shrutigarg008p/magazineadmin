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
                    My Purchases
                </li>
            </ul>
        </div>
    </section>
    <div class="container">
        @php
            $type = Request::get('type');
        @endphp
        <p class="d-flex justify-content-around align-items-center">
            <a
                href="{{ Request::url() . '?type=magazine' }}"
                class="{{ (!$type || $type == 'magazine') ? 'text-bold':'font-weight-light text-muted' }} h4">
                Magazines
            </a>
            <a
                href="{{ Request::url() . '?type=newspaper' }}"
                class="{{ $type == 'newspaper' ? 'text-bold':'font-weight-light text-muted' }} h4">
                Newspapers
            </a>
        </p>
        <hr>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="sidesection_right">
                    <div class="magazines_with_price" style="margin-top: 0">
                        @forelse ($papers as $paper)
                            <div class="all_magazines">
                                <img src="{{ asset('storage/' . $paper->cover_image) }}" class="img-fluid lazy ">
                                <div class="magazine_name">{{ $paper->title }}</div>
                                <div class="magazine_price">{{ to_price($paper->price, true) }}</div>
                                <div class="magazine_with_price_btns">
                                    @if($type == 'newspaper')
                                        <a href="{{ url("pdf/{$paper->id}/pdfviewer") }}">Open</a>
                                    @else
                                        <a href="{{ url("pdf/{$paper->id}/viewer") }}">Open</a>
                                    @endif
                                </div>
                                <p class="all_magazines__published_date">{{$paper->published_date->format('d M, Y')}}</p>
                            </div>
                        @empty
                            <div class="my-4 font-weight-bold text-center h4">No {{ $type == 'newspaper' ? 'newspaper':'magazine' }} found</div>
                        @endforelse
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        {{$papers->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
