@extends('layouts.admin')
@section('title', 'Publications')
@section('pageheading')
    Manage Publications
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="flex">
                    <a href="{{ route('admin.publications.create') }}" class="btn btn-sm btn-primary">
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
                                <th>Name</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pubs->count())
                                @foreach ($pubs as $publication)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $publication->name }}</td>
                                        <td>{{ $publication->type }}</td>
                                        <td>
                                            <div>
                                                <form class="toggle_switch" method="post"
                                                    action="{{ route('admin.publications.changestatus', ['publication' => $publication]) }}">
                                                    @csrf
                                                    <label class="m_8898_switch">
                                                        <input type="checkbox" onchange="$(this).parents('form').submit();" {{$publication->status ? 'checked':''}}>
                                                        <span class="m_8898_slider round"></span>
                                                    </label>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('admin.publications.edit', ['publication' => $publication]) }}">
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
            $('#dataTable').DataTable();
        });
    </script>
@stop
