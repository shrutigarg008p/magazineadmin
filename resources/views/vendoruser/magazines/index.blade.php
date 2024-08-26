@extends('layouts.vendor')
@section('title', 'Magazines')
@section('pageheading')
    Manage Magazines
@endsection
@section('content')
@php
    $missing_apple_id = Request::get('missing_apple_id') == '1';
@endphp
    <div class="container-fluid">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('vendor.magazines.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Add New
            </a>
            <a href="{{ route('vendor.export_listing', ['content_type' => 'magazine', 'filetype' => 'pdf']) }}" class="btn btn-sm btn-primary ml-3">
                <i class="fas fa-table"></i> Export PDF
            </a>
            <a href="{{ route('vendor.export_listing', ['content_type' => 'magazine', 'filetype' => 'excel']) }}" class="btn btn-sm btn-primary ml-3">
                <i class="fas fa-file-excel"></i> Export Excel
            </a>
            {{-- <a href="{{ Request::fullUrlWithQuery(['missing_apple_id' => $missing_apple_id ? '0':'1']) }}" class="btn btn-sm btn-primary ml-3 {{$missing_apple_id ? ' active':''}}">
                <i class="fas fa-apple-alt"></i> {{ $missing_apple_id ? 'Show all magazines' : 'Missing Apple-id' }}
            </a> --}}
        </div>
        {{-- @if ($missing_apple_id)
            <h5 class="mb-3 text-bold">Magazines with missing Apple product id</h5>
        @endif --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="dataTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Publication</th>
                                <th>Publication Date</th>
                                <th>Upload Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($magazines->count())
                                @foreach ($magazines as $magazine)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $magazine->title }}</td>
                                        <td>{{ $magazine->price }}</td>
                                        <td>{{ $magazine->category->name }}</td>
                                        <td>{{ $magazine->publication->name }}</td>
                                        <td>{{ $magazine->published_date ? $magazine->published_date->format('d/m/Y') : '-' }}</td>
                                        <td>{{ $magazine->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <div>
                                                <form class="toggle_switch" method="post"
                                                    action="{{ route('vendor.magazines.update', ['magazine' => $magazine]) }}">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="change_status">
                                                    <label class="m_8898_switch">
                                                        <input type="checkbox" onchange="$(this).parents('form').submit();" {{$magazine->status ? 'checked':''}}>
                                                        <span class="m_8898_slider round"></span>
                                                    </label>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                @if ($magazine->file_type == 'grid')
                                                    <a class="btn btn-sm btn-primary mr-1"
                                                        href="{{ route('vendor.content_make_grid_listing', ['content_id'=>$magazine->id,'content_type'=>'magazine']) }}">
                                                        <i class="fas fa-pencil-alt"></i> Grid Slides
                                                    </a>
                                                @endif
                                                <a class="btn btn-sm btn-primary" style="margin-right: 5px;"
                                                    href="{{ route('vendor.magazines.edit', ['magazine' => $magazine]) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <hr>
                                                 <a class="btn btn-sm btn-success"
                                                    href="{{ route('vendor.magazines.show', ['magazine' => $magazine]) }}">
                                                 <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                @if (Auth::user()->isAdmin())
                                                <form action="{{ route('vendor.magazines.destroy',$magazine) }}" method="Post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mag-delete"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                                @endif
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
            $('#dataTable').DataTable();
        });
    </script>
@stop
