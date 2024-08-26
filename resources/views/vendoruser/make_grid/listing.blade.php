@extends('layouts.vendor')
@section('title', 'NewsPaper')
@section('pageheading')
    Grid Blocks
@endsection
@section('content')
    @php
        if( $content_id = intval(Request::query('content_id')) ) {
            if( $content_type = Request::query('content_type') ) {
                $nextSlide = count($slides) +1;
                $rp = [
                    'content' => $content_id,
                    'type' => $content_type,
                    'slide' => $nextSlide
                ];
            }
        }
    @endphp
    <div class="container-fluid">
        @if ($content)
        <h3 class="text-bold mt-3 mb-4">
            {{ \ucwords($content_type) }}: #{{$content->id}} {{$content->title}}
        </h3>
        @endif
        @if (isset($nextSlide))
            <div class="mb-5 mt-2">
                <a class="btn btn-primary" href="{{route('vendor.content_make_grid', $rp)}}">
                    Add Slide {{$nextSlide}}
                </a>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="dataTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Slide No.</th>
                                <th>Content Type</th>
                                <th>Content ID</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slides as $slide_no => $slide)
                            @php
                                $qp = [
                                    'layout' => $slide['layout'],
                                    'type' => $slide['content_type'],
                                    'content' => $slide['content_id'],
                                    'slide' => $slide_no,
                                    'from_grid_listing' => '1'
                                ];
                            @endphp
                                <tr>
                                    <td>{{ $slide_no }}</td>
                                    <td>{{ \ucwords($slide['content_type']) }}</td>
                                    <td>{{ $slide['content_id'] }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-primary" style="margin-right: 5px;"
                                                href="{{ route('vendor.content_make_grid', $qp) }}">
                                                <i class="fas fa-pencil-alt"></i> Slide
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@stop
