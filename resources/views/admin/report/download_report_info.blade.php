@extends('layouts.admin')
@section('title', 'Users')
@section('pageheading')
    Download Manager
@endsection
@section('content')
    <div class="container-fluid">
            <div class="row mb-3">
                <h5 class="col-12"> <h2> {{$user->name}} </h2></h5>
            </div>
            <div class="row mb-3">
                <h5 class="col-12">Filter {{strtoupper($type)}}</h5>
                <div class="col-lg-5">
                    <form class="row" method="get" action="">
                        <div class="col-lg-9">
                            <div class="form-group">
                                <input name="title" class="form-control" placeholder="Enter Title" value={{request()->title}}>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <button type="submit" class="btn-sm btn-md btn-primary">Filter</button>
                                @if (Request::exists('title'))
                                    <a href="{{url()->current()}}" class="btn btn-sm btn-outline-primary ml-2">Clear</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div class=" col-lg-3 btn-group">
                    <form action="{{route('admin.E_Report_file')}}" method="post">
                        @csrf
                        <input type="hidden" name="name" value={{request()->name}}>
                        <input type="hidden" name="type" value="by_user">
                        <input type="hidden" name="Cover_type" value="{{$type}}">
                        <input type="hidden" name="usersID" value="{{$user->id}}">
                        <input type="hidden" name="file_type" value="pdf">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <span class="label label-success"><i class="fas fa-table"></i> PDF</span> 
                        </button>
                    </form>
                    <form action="{{route('admin.E_Report_file')}}" method="post">
                        @csrf
                        <input type="hidden" name="name" value={{request()->name}}>
                        <input type="hidden" name="type" value="by_user">
                        <input type="hidden" name="Cover_type" value="{{$type}}">
                        <input type="hidden" name="usersID" value="{{$user->id}}">
                        <input type="hidden" name="file_type" value="excel">
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
                                <th>Title</th>
                                <th>Category</th>
                                <th>Publisher</th>
                                <th>Copyright Owner</th>
                                <th>Price</th>
                                <th>Published Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data))
                                @foreach ($data as $users)                                
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div>{{ $users->title }}</div>
                                        </td>
                                        <td>{{ $users->category->name }}</td>
                                        <td>{{ $users->publication->name }}</td>
                                        <td>{{ $users->copyright_owner }}</td>
                                        <td>{{ $users->price }}</td>
                                        <td>{{ date('Y-m-d',strtotime($users->published_date)) }}</td>
                                        
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
