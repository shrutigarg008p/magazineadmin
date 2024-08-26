@extends('layouts.admin')
@section('title', 'System Users')
@section('pageheading')
    Manage Users
@endsection
@section('content')
    <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <a href="{{route('admin.users.createsystemuser')}}" class="btn-sm btn-info">Add New System User</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <a href="{{route('vendor.export_listing_systemuser_listing',['content_type'=>'users','filetype'=>'pdf','type'=>$type])}}" class="btn btn-sm btn-primary"><i class="fas fa-table"></i> Export PDF</a>
                            <a href="{{route('vendor.export_listing_systemuser_listing',['content_type'=>'users','filetype'=>'excel','type'=>$type])}}" class="btn btn-sm btn-primary"><i class="fas fa-file-excel"></i> Export Excel</a>
                        </div>
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
                                <th>RoleName</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count())
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div>{{ $user->name }}</div>
                                        </td>
                                        <td>
                                            <div class="badge badge-primary">
                                                {{ $user->role_name }}
                                            </div>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->status)
                                                <div class="badge badge-success">
                                                    {{ $user->status_text }}
                                                </div>
                                            @else
                                                <div class="badge badge-secondary">
                                                    {{ $user->status_text }}
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.users.edit', ['user' => $user, 'type' => $user->type]) }}"
                                                    class="btn btn-xs btn-primary">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Edit
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
                // dom: 'Bfrtip',
                //   buttons: [
                //       {
                //          extend: 'excel',
                //          text: 'Export Data',
                //          className: 'btn btn-default',
                //          exportOptions: {
                //             columns: [0,1,2,3,4]
                //          }
                //       }
                //   ]
            });
        });
    </script>
@stop
