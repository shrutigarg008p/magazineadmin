@extends('layouts.customer')
@section('title', 'NewsPapers')


@section('content')
    <style>
        .sidebar_border {
            max-height: 280px;
            overflow: auto;
        }
    </style>
    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{ url('customer') }}">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Newspapers</li>
                
                @if (isset($category_details) && $category_details->name)
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">{{ $category_details->name }}</li>
                @endif
            </ul>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <!-- left side -->
            <div class="col-md-12 col-lg-3 mobile-cat-hide">
                <div class="sidebar_border">
                    <h2 class="sedebar_heading">Newspaper Categories</h2>
                    <ul class="sidebar_order">
                        <li class="sidebar_list">
                            <a class="{{empty(Request::query('category_id'))?' active font-weight-bold':''}}" href="{{ Request::fullUrlWithQuery(['category_id' => '']) }}">All</a>
                        </li>

                        @foreach ($catsDatas as $category)
                            <li class="sidebar_list">
                                <a class="{{Request::query('category_id') == $category->id ? ' active font-weight-bold':''}}" href="{{ Request::fullUrlWithQuery(['category_id' => $category->id]) }}">
                                    {{$category->name}}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>

                {{-- Top --}}
                <div class="sidebar_border">
                    <h2 class="sedebar_heading">Publications</h2>

                    <ul class="sidebar_order">
                        <li class="sidebar_list" role="button">
                            <a href="{{Request::fullUrlWithQuery(['publication_id' => ''])}}">
                                All
                            </a>
                        </li>
                        @foreach ($pubsData as $publication)
                            <li class="sidebar_list" role="button"
                                value="{{ $publication->id }}">
                                <a class="{{Request::query('publication_id')==$publication->id ? ' active font-weight-bold':''}}"
                                    href="{{Request::fullUrlWithQuery(['publication_id' => $publication->id])}}">
                                    {{ $publication->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- right side -->
            <div class="col-md-12 col-lg-9">
                <div class="sidesection_right">
                    <div class="heading_arrow_group w-100">
                        <div class="d-flex justify-content-between w-100">
                            <h1 class="common_heading">NewsPapers</h1>
                        </div>
                    </div>
                    
                    <form action="{{Request::url()}}" method="get">
                        
                        <div class="row align-items-center">
                            <div class="col-12 col-md-4">
                                <select name="publication_id" class="form-control">
                                    <option value="">All Publications</option>
                                    @foreach ($pubsData as $publication)
                                        <option value="{{ $publication->id }}" {{Request::query('publication_id') == $publication->id ? 'selected':''}}>{{ $publication->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="d-flex align-items-end position-relative">
                                    <input value="{{Request::query('date')}}" class="onlydatepicker form-control" type="text"
                                        name="date" placeholder="Search by date (Y/M/D)" readonly onscroll="return false;">
                                    <a href="#" style="right:10px;top:8px;" class="position-absolute clear-date"><i class="fas fa-times text-dark"></i></a>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="d-flex justify-content-end align-items-center">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-filter"></i>
                                        Filter
                                    </button>

                                    @if (Request::query('publication_id') || Request::query('date'))
                                        <a href="{{Request::url()}}" class="btn btn-sm btn-danger ml-2">
                                            <i class="fas fa-cog"></i>
                                            Reset
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @php
                            $allowParams = ['category_id'];
                        @endphp

                        @foreach ($allowParams as $allowParam)
                            @if ($param = Request::query($allowParam))
                                <input type="hidden" name="{{$allowParam}}" value="{{$param}}">
                            @endif
                        @endforeach
                    </form>

                    <div class="magazines_with_price">
                        @forelse ($newsDatas as $news)
                            <div class="all_magazines">
                                <a class="newspaper_image" href="{{ url("newspapers/$news->id/details") }}">
                                    <img src="{{ asset('storage/' . $news->cover_image) }}" class="img-fluid lazy ">
                                </a>
                                <div class="magazine_name">{{ $news->title }}</div>
                                <p class="all_magazines__published_date">{{$news->published_date->format('d M, Y')}}</p>
                                <div class="magazine_price">{{to_price($news->publication->newspaper_price_ghs, true)}}</div>
                            </div>
                        @empty
                            <div class="all_magazines">

                                <div class="magazine_name">Data Not Found</div>

                            </div>
                        @endforelse
                    </div>
                    <div class="mt-3 d-flex justify-content-end">
                        {{$newsDatas->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(function() {
            $(".clear-date").click(function(e) {
                e.preventDefault();
                $("input[name='date']").val("");
            });
        });
    </script>
@endsection