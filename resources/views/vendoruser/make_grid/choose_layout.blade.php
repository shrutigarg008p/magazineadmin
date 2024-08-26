@extends('layouts.vendor')
@section('title', 'Magazines')
@section('pageheading')
    {{$content->type}} - Make a grid view
@endsection
@section('content')

@php
    $slide = intval(Request::query('slide'));
    $slide = !empty($slide) ? $slide: 1;
@endphp

<div class="mt-2 mb-4">
    <h2>{{$content->type}}: <b>{{$content->title}}</b></h2>
</div>

<h5 class="mb-4">Choose A Layout for <b>Slide {{$slide}}</b></h5>

<form action="{{ route('vendor.content_make_grid') }}" method="get">
    <input type="hidden" name="slide" value="{{$slide}}">
    <input type="hidden" name="type" value="{{Request::query('type')}}">
    <input type="hidden" name="content" value="{{Request::query('content')}}">

    <div class="row flex-wrap">
        @foreach (['one', 'two', 'three'] as $layout)
            <div class="col">
                <input type="radio" id="layout_{{$layout}}" name="layout" value="{{$layout}}">
                <label for="layout_{{$layout}}">
                    <div class="d-flex flex-column">
                        Layout {{$layout}}
                        <img src="{{asset('assets/backend/img/grid_view_layout_'.$layout.'.png')}}" alt="">
                    </div>
                </label>
            </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Start</button>
</form>

@endsection