@extends('layouts.admin')
@section('title', 'Content Manager')
@section('pageheading')
    Content Manager
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="dataTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($contents->count())
                                @foreach ($contents as $content)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $content->title }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-primary" style="margin-right: 5px;" href="{{route('admin.content_manager.edit', ['content_manager' => $content])}}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                {{-- <a class="btn btn-sm btn-success"
                                                    href="">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a> --}}
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
                            columns: '[0,1]'
                         }
                      }
                   ]
            });
        });
    </script>
@stop
