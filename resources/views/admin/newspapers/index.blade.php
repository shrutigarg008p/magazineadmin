@extends('layouts.admin')
@section('title', 'NewsPaper')
@section('pageheading')
    Manage Newspapers
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="flex">
                    <a href="{{ route('admin.newspapers.create') }}" class="btn btn-sm btn-primary">
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
                            @if ($newspaper->count())
                                @foreach ($newspaper as $news_paper)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $news_paper->title }}</td>
                                        <td>{{ $news_paper->price }}</td>
                                        <td>{{ $news_paper->category->name }}</td>
                                        <td>{{ $news_paper->publication->name }}</td>
                                        <td>{{ $news_paper->created_at->format('d/m/Y') }}</td>

                                        <td>
                                            <div>
                                                <form class="toggle_switch" method="post"
                                                    action="{{ route('admin.newspapers.update', ['newspaper' => $news_paper]) }}">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="change_status">
                                                    <label class="m_8898_switch">
                                                        <input type="checkbox" onchange="$(this).parents('form').submit();" {{$news_paper->status ? 'checked':''}}>
                                                        <span class="m_8898_slider round"></span>
                                                    </label>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-primary" style="margin-right: 5px;" 
                                                    href="{{ route('admin.newspapers.edit', ['newspaper' => $news_paper]) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('admin.newspapers.show', ['newspaper' => $news_paper]) }}">
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
            $('#dataTable').DataTable();
        });
    </script>
@stop
