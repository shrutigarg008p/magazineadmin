@extends('layouts.admin')
@section('title', 'Blogs')
@section('pageheading')
    Manage Blogs
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="flex">
                    <a href="{{ route('admin.blogs.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
            </div>
            <div class="btn-group mb-4 d-flex align-items-center">
                <form action="{{route('admin.blogs_export_reports')}}" method="post">
                    @csrf
                    <input type="hidden" name="email" value="{{request()->email}}">
                    <input type="hidden" name="type" value="main">
                    <input type="hidden" name="file_type" value="pdf">
                    <button type="submit" class="btn-sm btn-success">
                        <span class="label label-success">PDF</span> 
                    </button>
                </form>
                <form action="{{route('admin.blogs_export_reports')}}" method="post" class="ml-2">
                    @csrf
                    <input type="hidden" name="email" value={{request()->email}}>
                    <input type="hidden" name="type" value="main">
                    <input type="hidden" name="file_type" value="excel">
                    <button type="submit" class="btn-sm btn-danger">
                        <span class="label label-danger">Excel</span> 
                    </button>
                </form>
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
                                <th>Publishing date</th>
                                <th>Promoted?</th>
                                <th>Top Story?</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($blogs->count())
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->created_at->format("Y/m/d") }}</td>
                                        <td class="text-center">{{ $blog->promoted ? 'Yes' : 'No' }}</td>
                                        <td class="text-center">{{ $blog->top_story ? 'Yes' : 'No' }}</td>
                                        <td>
                                            <div>
                                                <form class="toggle_switch" method="post"
                                                    action="{{ route('admin.blogs.update', ['blog' => $blog]) }}">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="change_status" value="1">
                                                    <label class="m_8898_switch">
                                                        <input type="checkbox" onchange="$(this).parents('form').submit();" {{$blog->status ? 'checked':''}}>
                                                        <span class="m_8898_slider round"></span>
                                                    </label>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('admin.blogs.edit', ['blog' => $blog]) }}">
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
                iDisplayLength: 100,
            });
        });
    </script>
@stop
