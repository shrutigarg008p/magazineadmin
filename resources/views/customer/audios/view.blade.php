@extends('layouts.customer')
@section('title', 'Podcast - #'.$podcast->id)
@section('meta_description', $podcast->title)
@if ($podcast->thumbnail_image)
    @section('meta_image', asset("storage/{$podcast->thumbnail_image}"))
@endif

@section('content')
    <div class="container">
        <div class="tabnews_tabs">
            <div id="appads" class="tabcontent">
                <h1 class="common_heading mb-4">{{$podcast->title}}</h1>
                
                <div class="d-flex align-items-center justify-content-center w-100 mb-4">
                    <div class="card" style="width:24rem;">
                        <img class="card-img-top" src="{{asset('storage/'.$podcast->thumbnail_image)}}" alt="Image">
                        <div class="card-body">
                          <h5 class="card-title">{{$podcast->title}}</h5>
                          @if(Auth::user())
                          <audio class="w-100" controls src="{{asset('storage/'.$podcast->podcast_file)}}" preload="auto"></audio>
                          @else
                          <audio class="w-100" controls src="" preload="auto"></audio>
                          @endif
                        </div>
                      </div>
                </div>
            </div>

        </div>
    </div>

@endsection
