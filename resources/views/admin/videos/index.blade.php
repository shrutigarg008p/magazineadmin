@extends('layouts.admin')
@section('title', 'Videos')
@section('pageheading')
    Manage Videos
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="flex">
                    <a href="{{ route('admin.videos.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="dataTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Thumbnail</th>
                                <th>Video URL</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($videos->count())
                                @foreach ($videos as $video)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $video->title ?? 'n/a' }}</td>
                                        <td>
                                            @if ($video->thumbnail_image)
                                                <img src="{{ asset("storage/{$video->thumbnail_image}") }}"
                                                    alt="{{ $video->id }}" width="50">
                                            @else
                                                <img src="{{ asset('assets/frontend/img/default_video_image.png') }}"
                                                    alt="{{ $video->id }}" width="50">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($video->video_link)
                                                <a href="{{ $video->video_link }}" target="_blank">See Video</a>
                                            @else
                                                n/a
                                            @endif
                                        </td>
                                        <td>
                                            <div>
                                                <form class="toggle_switch" method="post"
                                                    action="{{ route('admin.videos.changestatus', ['video' => $video]) }}">
                                                    @csrf
                                                    <label class="m_8898_switch">
                                                        <input type="checkbox" onchange="$(this).parents('form').submit();" {{$video->status ? 'checked':''}}>
                                                        <span class="m_8898_slider round"></span>
                                                    </label>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('admin.videos.edit', ['video' => $video]) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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
            $('#dataTable').DataTable({
                   dom: 'Bfrtip',
                   buttons: [
                      {
                         extend: 'excel',
                         text: 'Export Data',
                         className: 'btn btn-default',
                         exportOptions: {
                            columns: '[0,1,2,3,4,5]]'
                         }
                      }
                   ]
            });
        });
    </script>
@stop
