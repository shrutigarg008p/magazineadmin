@extends('layouts.admin')
@section('title', 'Magazines')
@section('pageheading')
    Manage Magazines
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="flex">
                    <a href="{{ route('admin.magazines.create') }}" class="btn btn-sm btn-primary">
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
                                <th>Price</th>
                                <th>Category</th>
                                <th>Publication</th>
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
                                        <td>{{ $magazine->created_at->format('d/m/Y') }}</td>

                                        <td>
                                            <div>
                                                <form class="toggle_switch" method="post"
                                                    action="{{ route('admin.magazines.update', ['magazine' => $magazine]) }}">
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
                                                <a class="btn btn-sm btn-primary" style="margin-right: 5px;"
                                                    href="{{ route('admin.magazines.edit', ['magazine' => $magazine]) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <hr>
                                                 <a class="btn btn-sm btn-success"
                                                    href="{{ route('admin.magazines.show', ['magazine' => $magazine]) }}">
                                                 <i class="fa fa-eye" aria-hidden="true"></i>
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
                iDisplayLength: 100,
            });
        });
    </script>
@stop
