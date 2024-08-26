@extends('layouts.vendor')
@section('title', 'Magazines')
@section('pageheading')
    {{ $content->type }} - Make a grid view
@endsection
@section('content')
    @php
    $slide = Request::query('slide');
    $type = Request::query('type');
    $content_id = $content->id;

    $maxWidth  = 2048;
    $maxHeight = 1536;

    $screenWidth = floor($maxWidth/4);
    $screenHeight = floor($maxHeight/4);

    $layout = Request::query('layout');

    // crossAxis is the column count (max: 4)
    // mainAxis is the row count (max: 6)

    // "mainAxis.crossAxis"
    $sections = [
        'header' => [
            'order' => '1',
            'coords' => '1.4',
            'mainAxis' => 1,
            'crossAxis' => 4,
            'data_requied' => false
        ],
        'one' => [
            'order' => '2',
            'coords' => '2.1',
            'mainAxis' => 2,
            'crossAxis' => 1,
            'data_requied' => true
        ],
        'two' => [
            'order' => '3',
            'coords' => '2.2',
            'mainAxis' => 2,
            'crossAxis' => 2,
            'data_requied' => true
        ],
        'three' => [
            'order' => '4',
            'coords' => '2.1',
            'mainAxis' => 2,
            'crossAxis' => 1,
            'data_requied' => true
        ],
        'four' => [
            'order' => '5',
            'coords' => '2.2',
            'mainAxis' => 2,
            'crossAxis' => 2,
            'data_requied' => true
        ],
        'five' => [
            'order' => '6',
            'coords' => '2.2',
            'mainAxis' => 2,
            'crossAxis' => 2,
            'data_requied' => true
        ],
        'six' => [
            'order' => '7',
            'coords' => '1.2',
            'mainAxis' => 1,
            'crossAxis' => 2,
            'data_requied' => true
        ],
        'seven' => [
            'order' => '8',
            'coords' => '1.2',
            'mainAxis' => 1,
            'crossAxis' => 2,
            'data_requied' => true
        ],
    ];
    @endphp

    @include('vendoruser.make_grid.layouts._html')

@endsection

@section('scripts')
@include('vendoruser.make_grid.layouts._script')
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('css/newspaper_grid.min.css')}}">
@endsection
