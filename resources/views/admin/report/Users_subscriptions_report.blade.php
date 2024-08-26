@extends('layouts.admin')
@section('title', 'Users')
@section('pageheading')
    User-Subscription Manager
@endsection
@section('content')
    <div class="container-fluid">
        {{-- @if (request()->type == App\Models\User::CUSTOMER) --}}
            <div class="row mb-3">
                <h5 class="col-12">Filter Users</h5>
                <div class="col-lg-5">
                    <form class="row" method="get" action="{{Request::url()}}">
                        <div class="col-lg-10">
                            <div class="form-group">
                                {{-- <label for="subsc_type">Subscription Status</label> --}}
                                <input id="email" name="email" class="form-control" placeholder="Enter User Name or Email" value={{Request::query('email')}}>
                            </div>
                        </div>
                        {{-- <div class="col-lg-5">
                            <div class="form-group">
                                <input id="refer_code" name="refer_code" class="form-control" placeholder="Enter Refer Code" value={{request()->refer_code}}>
                            </div>
                        </div> --}}
                        <div class="col-lg-2">
                            <div class="form-group">
                                <button type="submit" class="btn-sm btn-md btn-primary">Filter Users</button>
                                @if (Request::get('email'))
                                    <a href="{{url()->current()}}" class="btn btn-sm btn-outline-primary ml-2">Clear</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class=" col-lg-3 btn-group">
                    <form action ="{{route('admin.download_subscribe_file')}}" method="get">
                        @csrf
                        <input type="hidden" name="email" value={{request()->email}}>
                        <input type="hidden" name="type" value="by_users">
                        <input type="hidden" name="file_type" value="pdf">
                        <input type="hidden" name="planid" value="{{$pid}}">
                        <input type="hidden" name="status" value="{{$status}}">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <span class="label label-success"><i class="fas fa-table"></i> PDF</span> 
                        </button>
                    </form>
                    <form action="{{route('admin.download_subscribe_file')}}" method="get">
                        @csrf

                        <input type="hidden" name="email" value={{request()->email}}>
                        <input type="hidden" name="type" value="by_users">
                        <input type="hidden" name="file_type" value="excel">
                        <input type="hidden" name="planid" value="{{$pid}}">
                        <input type="hidden" name="status" value="{{$status}}">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <span class="label label-danger"><i class="fas fa-file-excel"></i> Excel</span> 
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
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Phone</th>
                                <th>Plan Price</th>
                                <th>Start Date</th>
                                <th>Expire Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data))
                                @foreach ($data as $plans)
                                @if(!empty($plans))
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $plans->user->name ?? '' }}</td>
                                        <td>{{ $plans->user->email ?? '' }}</td>
                                        <td>{{ $plans->user->phone ?? '' }}</td>
                                        <td>{{ $plans->purchased_at }} {{$plans->user->my_currency ?? 'GHS'}}</td>
                                        <td>{{ $plans->subscribed_at }}</td>
                                        <td>{{ $plans->expires_at }}</td>
                                        
                                    </tr>
                                @endif
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
