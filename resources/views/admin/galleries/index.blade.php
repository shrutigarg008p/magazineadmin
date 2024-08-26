@extends('layouts.admin')
@section('title', 'Galleries')
@section('pageheading')
    Manage Galleries
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="flex">
                    <a href="{{ route('admin.galleries.create') }}" class="btn btn-sm btn-primary">
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
                                <th>Album Thumbnail</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($albums->count())
                            {{-- @dd($albums); --}}
                                @foreach ($albums as $album)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ( $album->cover_image )

                                            <img src="{{ asset("storage/{$album->cover_image}") }}" alt="{{ $album->id }}"
                                                width="50">

                                            @elseif( $gallery_image = $album->gallary_images->last() )

                                            <img src="{{ asset("storage/{$gallery_image->image}") }}" alt="{{ $album->id }}"
                                                width="50">
                                                
                                            @endif
                                        </td>
                                        <td >{{ $album->title ?? 'n/a' }}</td>
                                        <td>
                                            <div>
                                                <form class="toggle_switch" method="post"
                                                    action="{{ route('admin.galleries.changestatus', ['album' => $album]) }}">
                                                    @csrf
                                                    <label class="m_8898_switch">
                                                        <input type="checkbox" onchange="$(this).parents('form').submit();" {{$album->status ? 'checked':''}}>
                                                        <span class="m_8898_slider round"></span>
                                                    </label>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('admin.galleries.edit', ['gallery' => $album]) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form method="post"
                                                    action="{{ route('admin.galleries.destroy', ['gallery' => $album]) }}"
                                                    onsubmit="return confirm('Are you sure to delete this gallery?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-primary ml-1">
                                                        <i class="fas fa-trash"></i>
                                                        {{__('Remove Gallery')}}
                                                    </button>
                                                </form>
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
                            columns: '[0,1,2,3,4]'
                         }
                      }
                   ]
            });
        });
    </script>
@stop
