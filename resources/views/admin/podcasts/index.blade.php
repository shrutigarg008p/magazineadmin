@extends('layouts.admin')
@section('title', 'Podcasts')
@section('pageheading')
    Manage Podcasts
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="flex">
                    <a href="{{ route('admin.podcasts.create') }}" class="btn btn-sm btn-primary">
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
                                <th>Podcast</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($podcasts->count())
                                @foreach ($podcasts as $podcast)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $podcast->title ?? 'n/a' }}</td>
                                        <td>
                                            <img src="{{ asset("storage/{$podcast->thumbnail_image}") }}"
                                                alt="{{ $podcast->id }}" width="50">
                                        </td>
                                        <td>
                                            <audio controls>
                                                <source src="{{ asset("storage/{$podcast->podcast_file}") }}"
                                                    type="audio/mpeg">
                                                Your browser does not support the audio tag.
                                            </audio>
                                        </td>
                                        <td>
                                            <div>
                                                <form class="toggle_switch" method="post"
                                                    action="{{ route('admin.podcasts.changestatus', ['podcast' => $podcast]) }}">
                                                    @csrf
                                                    <label class="m_8898_switch">
                                                        <input type="checkbox" onchange="$(this).parents('form').submit();" {{$podcast->status ? 'checked':''}}>
                                                        <span class="m_8898_slider round"></span>
                                                    </label>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('admin.podcasts.edit', ['podcast' => $podcast]) }}">
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
                            columns: '[0,1,2,3,4,5]'
                         }
                      }
                   ]
            });
        });
    </script>
@stop
