@extends('layouts.admin')
@section('title', 'Users')
@section('pageheading')
    Download Manager
@endsection
@section('content')
    <div class="container-fluid">
        {{-- @if (request()->type == App\Models\User::CUSTOMER) --}}
            <div class="row mb-3">
                <h5 class="col-12">Filter Users</h5>
                <div class="col-lg-5">
                    <form class="row" method="get" action="{{route('admin.E_Report')}}">
                        <div class="col-lg-9">
                            <div class="form-group">
                                {{-- <label for="subsc_type">Subscription Status</label> --}}
                                <input id="email" name="email" class="form-control" placeholder="Enter Email" value={{request()->email}}>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <button type="submit" class="btn-sm btn-md btn-primary">Filter</button>
                                @if (Request::exists('email'))
                                    <a href="{{url()->current()}}" class="btn btn-sm btn-outline-primary ml-2">Clear</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="btn-group mb-4 d-flex align-items-center">
                <form action="{{route('admin.E_Report_file')}}" method="post">
                    @csrf
                    <input type="hidden" name="email" value="{{request()->email}}">
                    <input type="hidden" name="type" value="main">
                    <input type="hidden" name="file_type" value="pdf">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="label label-success"><i class="fas fa-table"></i> PDF</span> 
                    </button>
                </form>
                <form action="{{route('admin.E_Report_file')}}" method="post" class="ml-2">
                    @csrf
                    <input type="hidden" name="email" value={{request()->email}}>
                    <input type="hidden" name="type" value="main">
                    <input type="hidden" name="file_type" value="excel">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="label label-danger"><i class="fas fa-file-excel"></i> Excel</span> 
                    </button>
                </form>
            </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="dataTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Dowloaded Magazine</th>
                                <th>Downloaded Newspaper</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div>{{ $user->name }}</div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td> <a class="btn btn-warning {{$user->magazine_downloads()->count()==0?'disabled':''}}" href="{{route('admin.E_ReportInfo',['id'=> $user->id,'type'=>'magazine'])}}">
                                            <span class="label label-warning">Magazine</span> 
                                            <span class="badge badge-info"> {{ $user->magazine_downloads()->count() }} </span> 
                                        </a>
                                    </td>
                                    <td> <a class="btn btn-danger  {{$user->newspaper_downloads()->count()==0?'disabled':''}}" href="{{route('admin.E_ReportInfo',['id'=> $user->id,'type'=>'newspaper'])}}"> 
                                            <span class="label label-success">Newspaper</span> 
                                            <span class="badge badge-info"> {{ $user->newspaper_downloads()->count() }} </span>
                                        </a> 
                                    </td>
                                    
                                </tr>
                            @empty
                            <tr>
                                <th colspan="5">Data not available</th>
                            </tr>
                            @endforelse
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
