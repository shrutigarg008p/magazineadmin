@extends('layouts.admin')
@section('title', 'Heard From Listing')
@section('pageheading')
    Heard From Listing
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="flex">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addContentModal">
                        <i class="fas fa-plus"></i> Add New
                    </button>
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
                                <th>Users Count</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collection as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        {{$item->user_counts}}
                                    </td>   
                                    <td class="{{ $item->status ? 'text-success': 'text-danger' }}">{{ $item->status ? 'Active': 'Inactive' }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <form class="toggle_switch reload" method="post"
                                                action="{{ route('admin.heard_from', ['content' => $item]) }}">
                                                @csrf
                                                <label class="m_8898_switch">
                                                    <input type="checkbox" onchange="$(this).parents('form').submit();" {{$item->status ? 'checked':''}}>
                                                    <span class="m_8898_slider round"></span>
                                                </label>
                                                <input type="hidden" name="action" value="status_change">
                                            </form>
                                            <form method="post"
                                                action="{{ route('admin.heard_from', ['content' => $item]) }}">
                                                @csrf
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-sm btn-danger ml-1" data-toggle="modal" data-target="#editContent{{$item->id}}">
                                                        Edit
                                                    </button>
                                                    <button type="submit" name="action" value="delete"
                                                        class="btn btn-sm btn-danger ml-1" onclick="return confirm('Are you sure you want to delete this item?');">
                                                        Delete
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editContent{{$item->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="editContent{{$item->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editContent{{$item->id}}Label">Edit Heard From</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('admin.heard_from.update', ['heard_from' => $item->id]) }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <textarea name="title" maxlength="1000" class="form-control" id="" rows="3" required>{{$item->title}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    <div class="modal fade" id="addContentModal" tabindex="-1" role="dialog"
        aria-labelledby="addContentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addContentModalLabel">New Heard From</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.heard_from.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                            <div class="form-group">
                                <textarea name="title" maxlength="1000" class="form-control" id="" cols="30" rows="3" required></textarea>
                            </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                            columns: [0,1,2,3]
                         }
                      }
                   ]
            });
        });
    </script>
@stop
