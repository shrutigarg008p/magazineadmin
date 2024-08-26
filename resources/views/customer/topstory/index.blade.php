@extends('layouts.customer')
@section('title', 'Top Stories')

@section('content')
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{ url('customer') }}">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Top Story</li>
                {{-- <li class="breadcrumb_list">></li> --}}
                <li class="breadcrumb_list">{{ $category_details->name ?? null }}</li>
            </ul>
        </div>
    </section>

    <div class="container">
        <div class="tabnews_tabs">
            <div class="tab">
            </div>
            <div id="appads" class="tabcontent">
                <div class="heading_arrow_group">
                    <h1 class="common_heading">Top Stories</h1>
                </div>
                {{-- <div class="heading_arrow_group heading_bg_light">
                    <h1 class="common_heading">NewsPaper</h1>
                </div> --}}
                <div class="tabnews_block">

                    @foreach ($topstory as $topstoryData)
                        <div class="tabnews_inner">

                            <div class="inner_content text-center">

                              <img src="{{ asset('assets/frontend/img/pdf.png') }}" data-id="{{ $topstoryData->id }}"
                                data-type="top_story"
                                class="news_pdf_icons {{ in_array($topstoryData->id, $btopstory) ? 'active' : '' }}">

                              <a class="top_story_img" href="{{ url("topstory/$topstoryData->id/details") }}">

                                  @if (strpos($topstoryData->content_image, 'https') !== false)
                                      <img src="{{ $topstoryData->content_image }}" class="img-fluid lazy " style="width:100%"
                                          height="150">
                                  @else
                                      <img src="{{ !empty($topstoryData->content_image)? asset('storage/' . $topstoryData->content_image): asset('assets/frontend/img/ts1.jpg') }}"
                                          class="img-fluid lazy ">
                                  @endif
                              </a>
                            </div>
                            
                            <div class="tabnews_textgroup">
                              <a class="top_story_img" href="{{ url("topstory/$topstoryData->id/details") }}">
                                <p class="p_gamename">{{ $topstoryData->blog_category->name }}</p>
                                <div class="tabnews_name">{{ $topstoryData->title }}</div>
                                <div class="tabnews_names"><img src="{{ asset('assets/frontend/img/calender.png') }}">
                                    {{ $topstoryData->created_at->format('d-m-Y') }}</div>
                                <div class="tabnews_price">{{ $topstoryData->price }}</div>
                              </a>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="my-4 d-flex justify-content-end">
                    {{$topstory->links()}}
                </div>

            </div>

        </div>
    </div>
@endsection