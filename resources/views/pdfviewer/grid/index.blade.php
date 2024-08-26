@extends('layouts.customer')
@section('title', 'Magazines')
@section('pageheading')
{{ $content->title }}
@endsection
@section('content')
    @php
        $maxWidth = 2048;
        $maxHeight = 1536;

        $screenWidth = floor($maxWidth / 3);
        $screenHeight = floor($maxHeight / 3);
    @endphp

    <div class="container my-5">
        @include('pdfviewer.partial.pub_filter')
        
        <div class="heading_share_icon mb-2 d-block text-center">
            <h1 class="md_hg_heading">#{{ $content->id }} {{$content->title}}</h1>
        </div>

        <section class="layouts-slider" data-sizes="50vw">
            @foreach ($slides as $page_no => $slide)
                @continue( !defined('\App\Vars\GridLayout::'.$slide['layout']) )

                @php
                    $gridBlocks = collect($slide['blocks']);
                    $layout = $slide['layout'];
                    $sections = constant('\App\Vars\GridLayout::'.$layout);
                @endphp

                <div class="slide" data-page="{{ $page_no }}">
                    @include('pdfviewer.grid._html')
                </div>
            @endforeach
        </section>
    </div>

    <div class="modal" id="grid-detail-modal" tabindex="-1" aria-labelledby="grid-detail-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="grid-detail-modal-content" class="container" style="max-width:1100px;">

                </div>
            </div>
        </div>
        </div>
    </div>

@endsection

@section('scripts')
<script src="{{ asset('assets/frontend/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">

    $(document).on('ready', function() {
        $(".layouts-slider").slick({
            dots: true,
            autoplay: false
        });

        var $grid_modal = $("#grid-detail-modal");
        var $grid_modal_content = $("#grid-detail-modal-content");

        $(".grid-detail-btn").click(function() {
            var self = $(this);

            $grid_modal_content.html(
                self.find(".grid-detail-content").html()
            );

            $grid_modal.modal("show");
        });
    });
</script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/newspaper_grid.min.css') }}">
    <style>
        .modal-fullscreen {
            width: 100vw;
            max-width: none;
            height: 100%;
            margin: 0;
        }
        .modal-fullscreen .modal-content {
            height: 100%;
            border: 0;
        }
        .modal-fullscreen .modal-header,
        .modal-fullscreen .modal-content,
        .modal-fullscreen .modal-footer {
            border-radius: 0;
        }
        .modal-fullscreen .modal-body {
            overflow-y: auto;
        }
    </style>
@endsection