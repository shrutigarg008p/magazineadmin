@extends('layouts.customer')
@section('title', 'Archive')
@section('content')
    @php
    $publication_id = Request::query('publication_id');
    $date = Request::query('date');
    $route = $type === 'magazine' ? 'magazines' : 'newspapers';
    @endphp
    <section class="breadcrumb_group mb-1">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{ url('customer') }}">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Archives</li>
                <li class="breadcrumb_list">{{ $category_details->name ?? null }}</li>
            </ul>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="tabnews_tabs category-tab mt-2">
                    <div class="tab mb-3">
                        <a href="{{ Request::fullUrlWithQuery(['type' => 'magazine']) }}" class="d-flex align-items-center justify-content-center btn tabnews_links {{ $type == 'magazine' ? ' active':'' }}">Magazine</a>
                        <a href="{{ Request::fullUrlWithQuery(['type' => 'newspaper']) }}" class="d-flex align-items-center justify-content-center btn tabnews_links {{ $type == 'newspaper' ? ' active':'' }}">Newspaper</a>
                    </div>
                    {{-- magazine --}}
                    <div id="appads" class="tabcontent mt-2">
                        <form action="{{ Request::url() }}" method="get"
                            class="d-flex flex-wrap justify-content-between align-items-center mb-3">

                            <select name="publication_id" class="form-control w-auto my-1 my-md-0">
                                <option value="">Select Publication</option>
                                @foreach ($publications as $publication)
                                    <option value="{{ $publication->id }}"
                                        {{ $publication_id == $publication->id ? 'selected' : '' }}>
                                        {{ $publication->name }} </option>
                                @endforeach
                            </select>

                            <div class="select_field_right">
                                <div class="date_pick_icon">
                                    <input class="onlydatepicker form-control my-1 my-md-0" type="text" name="date"
                                        placeholder="Search by date" readonly value="{{ $date ?? now()->subWeek()->format('Y-m-d') }}">
                                </div>
                            </div>

                            <input type="hidden" name="type" value="{{$type}}">

                            <button type="submit" class="btn btn-sm btn-danger my-1 my-lg-0">
                                <i class="fas fa-filter"></i>
                                Filter
                            </button>

                            @if (Request::get('date') || Request::get('publication_id'))
                              <a class="text-danger" href="{{Request::url()}}">x clear</a>
                            @endif
                        </form>
                        <div class="d-flex flex-wrap justify-content-center">
                            @forelse ($contents as $content)
                                <div class="all_magazines">
                                    <a class="magazine_image" href="{{url( $type == 'magazine' ? "single/magazine/{$content->id}": "single/newspaper/{$content->id}")}}">
                                        <img src="{{ asset('storage/' . $content->cover_image) }}"
                                            class="img-fluid lazy  archive">
                                        <div class="tabnews_textgroup">
                                            <div class="tabnews_name">{{ $content->title }}</div>
                                            <div class="magazine_d_price">{{ to_price($content->price, true) }}</div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <div class="tabnews_inner">
                                    <div class="tabnews_textgroup">
                                        <div class="tabnews_name">Data Not Found</div>
                                    </div>
                                </div>
                            @endforelse
                            <div class="d-flex justify-content-end align-items-center w-100">
                                {{ $contents->appends(Request::query())->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
