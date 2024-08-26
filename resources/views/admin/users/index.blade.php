@extends('layouts.admin')
@section('title', 'Users')
@php
    $type = $type ?? Request::query('type');
@endphp
@section('pageheading')
    Manage {{ isset($type) ? \ucwords($type): 'User' }}
@endsection
@section('content')
    <div class="container-fluid">
        @if ($type == App\Models\User::CUSTOMER)
            <div class="row mb-3">
                <h5 class="col-12">Filter Users</h5>
                <div class="col-lg-12">
                    <form class="row" method="get">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{-- <label for="subsc_type">Subscription Status</label> --}}
                                <select id="subsc_type" name="subsc_type" class="form-control">
                                    <option value="">-- subscription status --</option>
                                    <option value="1" {{ request()->subsc_type == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ request()->subsc_type == '0' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="hidden" name="type" value="{{ App\Models\User::CUSTOMER }}">
                                <input type="hidden" name="platform" value="{{ request()->get('platform')}}">
                                <button type="submit" class="btn-sm btn-primary">Filter</button>
                                <a href="{{route('admin.users.create')}}" class="btn btn-sm btn-info">
                                    Add New User
                                </a>
                            </div>
                        </div>
                    </form>
                    <div class="my-2 font-weight-bold">
                        <div class="d-flex align-items-center">
                            <form action="{{route('admin.importusers')}}" method="post" id="importusers" enctype="multipart/form-data">
                                @csrf
                                <label for="bulkUpload" class="btn btn-sm btn-success m-0">Bulk User Registration</label>
                                <input type="file" id="bulkUpload" name="file" style="display: none" onchange="$(`#importusers`).submit();" />
                            </form>
                            <a href="{{asset('assets/backend/Bulk_User_Import_1569890.xls')}}" target="_blank" class="btn btn-sm btn-primary ml-1">Download Sample Bulk-upload File</a>
                        </div>
                        <div class="mt-1">
                            Bulk update instructions:
                            <ul>
                                <li>Duplicating email or phone number will be ignored</li>
                                <li>Invalid iso2 country code will be replaced with ghana country code (GH)</li>
                                <li>Dob format: Y-m-d (Eg. 1994-02-18)</li>
                                <li>Plan-id and Plan-duration-code can be retrieved on <a href="{{url('admin/plans')}}">plan page</a></li>
                                <li>Once uploaded, do not hit back or cancel as uploading may take upto several minutes</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <a href="{{route('vendor.export_listing_user_listing',['content_type'=>'users','filetype'=>'pdf','type'=>$type])}}" class="btn btn-sm btn-primary"><i class="fas fa-table"></i> Export PDF</a>
                            <a href="{{route('vendor.export_listing_user_listing',['content_type'=>'users','filetype'=>'excel','type'=>$type])}}" class="btn btn-sm btn-primary"><i class="fas fa-file-excel"></i> Export Excel</a>
                        </div>
                    </div>
                </div>
            </div>

        @elseif ($type == App\Models\User::VENDOR)
            <div class="row mb-3">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <a href="{{route('vendor.export_listing_user_listing',['content_type'=>'users','filetype'=>'pdf','type'=>$type])}}" class="btn btn-sm btn-primary"><i class="fas fa-table"></i> Export PDF</a>
                            <a href="{{route('vendor.export_listing_user_listing',['content_type'=>'users','filetype'=>'excel','type'=>$type])}}" class="btn btn-sm btn-primary"><i class="fas fa-file-excel"></i> Export Excel</a>
                        </div>
                    </div>
                </div>
            </div>

        @elseif( $type == App\Models\User::COMPANY)
            <div class="row mb-4">
                <div class="col-12">
                    <a href="{{route('admin.users.create', ['type' => 'company'])}}" class="btn btn-sm btn-info">
                        + Add New Company
                    </a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <a href="{{route('vendor.export_listing_user_listing',['content_type'=>'users','filetype'=>'pdf','type'=>$type])}}" class="btn btn-sm btn-primary"><i class="fas fa-table"></i> Export PDF</a>
                            <a href="{{route('vendor.export_listing_user_listing',['content_type'=>'users','filetype'=>'excel','type'=>$type])}}" class="btn btn-sm btn-primary"><i class="fas fa-file-excel"></i> Export Excel</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
        <div class="row mb-3">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <a href="{{route('vendor.export_listing_user_listing',['content_type'=>'users','filetype'=>'pdf'])}}" class="btn btn-sm btn-primary"><i class="fas fa-table"></i> Export PDF</a>
                            <a href="{{route('vendor.export_listing_user_listing',['content_type'=>'users','filetype'=>'excel'])}}" class="btn btn-sm btn-primary"><i class="fas fa-file-excel"></i> Export Excel</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="dataTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                               <!--  @if($type!='vendor')
                                    <th>Heard From</th>
                                    <th>Referred By</th>
                                @endif -->
                                <!-- <th>RoleName</th> -->
                                <th>Email</th>
                                <th>Referred by</th>
                                <th>Phone</th>
                                <th>Refferal Code</th> 
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
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
                processing: true,
                serverSide: true,
                aLengthMenu: [[10, 25, 100, 200], [10, 25, 100, 200]],
                iDisplayLength: 100,
                ajax:{
                  "url" : "{{route('admin.users.getUserListDataAjax')}}", // json datasource
                  "type": "GET",
                  "data":{
                      type:"{{ request()->get('type')}}",
                      platform:"{{ request()->get('platform')}}",
                   },
                },
                columns: [
                    { data: 'count' },
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'refer_by' },
                    { data: 'phone' },
                    { data: 'refer_code' },
                    { data: 'status' },
                    { data: 'action' },
                ],
                // dom: 'Bfrtip',
                // buttons: [
                //   {
                //      extend: 'excel',
                //      text: 'Export Data',
                //      className: 'btn btn-default',
                //      exportOptions: {
                //         columns: [0,1,2,3,4,5]
                //      }
                //   }
                // ]
            });
        });
    </script>
@stop
