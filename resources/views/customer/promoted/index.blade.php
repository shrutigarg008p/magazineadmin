
@extends('layouts.customer')
@section('title', 'Promoted Content')

@section('content')
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{ url('customer') }}">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Promoted Content</li>
                {{-- <li class="breadcrumb_list">></li> --}}
                <li class="breadcrumb_list">{{ $category_details->name ?? null }}</li>
            </ul>
        </div>
    </section>
    <div class="container">
        <div class="tabnews_tabs">
          
            <div id="appads" class="tabcontent">
                <div class="heading_arrow_group">
                    <h1 class="common_heading">Promoted Content</h1>
                </div>
                {{-- <div class="heading_arrow_group heading_bg_light">
                    <h1 class="common_heading">NewsPaper</h1>
                </div> --}}
                <div class="tabnews_block">

                    @foreach ($promoted as $promotedData)
                        <div class="tabnews_inner">
                            <div class="inner_content text-center">

                               <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{ $promotedData->id }}"
                                  data-type="popular_content"
                                  class="news_pdf_icons {{ in_array($promotedData->id, $bpromoted) ? 'active' : '' }}">

                                <a class="top_story_img" href="{{ url("promoted/$promotedData->id/details") }}">

                                    @if (strpos($promotedData->content_image, 'https') !== false)
                                        <img src="{{ $promotedData->content_image }}" class="img-fluid lazy " style="width:100%"
                                            height="150">
                                    @else
                                        <img src="{{ !empty($promotedData->content_image)? asset('storage/' . $promotedData->content_image): asset('assets/frontend/img/ts1.jpg') }}"
                                            class="img-fluid lazy ">
                                    @endif

                                </a>

                            </div>

                            <div class="tabnews_textgroup">
                                <a class="top_story_img" href="{{ url("promoted/$promotedData->id/details") }}">
                                    <p class="p_gamename">{{ $promotedData->blog_category->name }}</p>
                                    <div class="tabnews_name">{{ $promotedData->title }}</div>
                                    <div class="tabnews_names"><img
                                            src="{{ asset('assets/frontend/img/calender.png') }}">
                                        {{ $promotedData->created_at->format('d-m-Y') }}</div>
                                    <div class="tabnews_price">{{ $promotedData->price }}</div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="my-4 d-flex justify-content-end">
                    {{$promoted->links()}}
                </div>
            </div>

        </div>
    </div>
@endsection