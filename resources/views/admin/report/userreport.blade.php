@extends('layouts.admin')
@section('title', 'Users')
@section('pageheading')
    User Registrations
@endsection
@section('content')
    <div class="container-fluid">
            <div class="row mb-3">
                <h6 class="col-12 text-bold">Filter</h6>
                <div class="col-lg-12">
                    <form class="row" method="get" action="{{route('admin.userreport',['type'=>$type])}}">
                        <div class="col-lg-2">
                            <div class="form-group">
                                {{-- <label for="subsc_type">Subscription Status</label> --}}
                                <select id="subsc_type" name="status" class="form-control">
                                    <option value=""> Status </option>
                                    <option value="1" {{ request()->status == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ request()->status == '0' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                {{-- <label for="subsc_type">Subscription Status</label> --}}
                                <input id="email" name="email" class="form-control" placeholder="Enter Email" value={{request()->email}}>
                            </div>
                        </div>
                        @if ($type=='user')
                            <div class="col-lg-2">
                                <div class="form-group">
                                    {{-- <label for="subsc_type">Subscription Status</label> --}}
                                    <input id="refer_code" name="refer_code" class="form-control" placeholder="Enter Refer Code" value={{request()->refer_code}}>
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-2">
                            <div class="form-group">
                                {{-- <label for="subsc_type">Subscription Status</label> --}}
                                <select id="country" name="country" class="form-control">
                                    <option value="">Select Country</option>
                                    @forelse ($countries as $val)
                                        <option value="{{$val}}" {{ request()->country == $val ? 'selected' : '' }}>{{$val}}</option>
                                    @empty
                                        
                                    @endforelse
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            @include('admin.dashboard._filters')
                        </div>
                    </form>
                </div>
                <div class="col-lg-1">
                    <form action="{{route('admin.downloadPDF',['type'=>$type,'file'=>'pdf'])}}" method="post">
                        @csrf
                        <input type="hidden" name="status" value="{{request()->has('status') ? request()->status:''}}">
                        <input type="hidden" name="email" value="{{request()->has('email') ? request()->email:''}}">
                        <input type="hidden" name="refer_code" value="{{request()->has('refer_code') ? request()->refer_code:''}}">
                        <input type="hidden" name="country" value="{{request()->has('country') ? request()->country:''}}">
                        <input type="hidden" name="starts_at" value="{{request()->has('starts_at') ? request()->query('starts_at'):''}}">
                        <input type="hidden" name="ends_at" value="{{request()->has('ends_at') ? request()->query('ends_at'):''}}">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-table"></i> PDF</button>
                    </form>
                
                </div>
                <div class="col-lg-1">
                    <form action="{{route('admin.downloadPDF',['type'=>$type,'file'=>'xls'])}}" method="post">
                        @csrf
                        <input type="hidden" name="status" value="{{request()->has('status') ? request()->status:''}}">
                        <input type="hidden" name="email" value="{{request()->has('email') ? request()->email:''}}">
                        <input type="hidden" name="refer_code" value="{{request()->has('refer_code') ? request()->refer_code:''}}">
                        <input type="hidden" name="country" value="{{request()->has('country') ? request()->country:''}}">
                        <input type="hidden" name="starts_at" value="{{request()->has('starts_at') ? request()->query('starts_at'):''}}">
                        <input type="hidden" name="ends_at" value="{{request()->has('ends_at') ? request()->query('ends_at'):''}}">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-file-excel"></i> Excel</button>
                                {{-- <a href="{{route('admin.downloadPDF',['type'=>$type,'file'=>'xls'])}}" class="btn-sm btn-success">Excel</a> --}}
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
                                <th>User Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Verified</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>Status</th>
                                @if ($type=='user')
                                    <th>Refer Code</th>
                                @endif
                                <th>Joined At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count())
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div>{{ $user->first_name }}</div>
                                        </td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        @if ($type=='user')
                                        <td>
                                            @if ($user->verified==1)
                                                <div class="badge badge-success">
                                                    Yes
                                                </div>
                                            @else
                                                <div class="badge badge-secondary">
                                                    No
                                                </div>
                                            @endif
                                        </td>
                                        @elseif ($type=='vendor')
                                            <td>
                                                @if ($user->vendor_verified==1)
                                                    <div class="badge badge-success">
                                                        Verified
                                                    </div>
                                                    @if($user->isVendorVerified()==1)
                                                        <div class="badge badge-success">
                                                            Approved
                                                        </div>
                                                    @else
                                                        <div class="badge badge-secondary">
                                                            Dis-Approved
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="badge badge-secondary">
                                                        Not-Verified
                                                    </div>
                                                @endif
                                            </td>
                                        @endif
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->country }}</td>
                                        <td>{{ $user->dob }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>
                                            @if ($user->status==1)
                                                <div class="badge badge-success">
                                                    Activated
                                                </div>
                                            @else
                                                <div class="badge badge-secondary">
                                                    De-activated
                                                </div>
                                            @endif
                                        </td>
                                        @if ($type=='user')
                                            <td>{{ $user->refer_code }}</td>
                                        @endif
                                        <td>{{ $user->created_at }}</td>
                                        
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
