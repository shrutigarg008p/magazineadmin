@extends('layouts.vendor')
@section('title', 'Magazines')
@section('pageheading')
    Magazines & Newspapers Sold Directly
@endsection
@section('content')
    <div class="container-fluid">
        <div class="mb-3 mt-2">
            <p>Total Magazines Sold: <b>{{$magazines_sold}}</b></p>
            <p>Total Newspaper Sold: <b>{{$newspapers_sold}}</b></p>
        </div>
        <div class="mb-3 d-flex align-items-center">
            <a href="{{Request::fullUrlWithQuery(['export_filetype' => 'pdf'])}}" class="btn btn-sm btn-primary">Pdf</a>
            <a href="{{Request::fullUrlWithQuery(['export_filetype' => 'excel'])}}" class="btn btn-sm btn-primary ml-2">Excel</a>
        </div>
        <div class="mb-5 row">
            <div class="col-12 col-sm-8 col-sm-6">
                <form action="{{Request::fullUrl()}}" method="get" class="d-flex align-items-center">
                    <div class="form-group">
                        <input type="text" name="date_from" value="{{Request::query('date_from')}}" placeholder="From Date" class="onlydatepicker form-control" readonly>
                    </div>
                    <div class="form-group ml-2">
                        <input type="text" name="date_to" value="{{Request::query('date_to')}}" placeholder="To Date" class="onlydatepicker form-control" readonly>
                    </div>
                    <div class="form-group ml-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                    @if (Request::query('date_from') || Request::query('date_to'))
                    <div class="form-group ml-2">
                        <a href="{{Request::url()}}" class="btn btn-outline-primary">Clear Filters</a>
                    </div>
                    @endif
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
                                <th>Type</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Unit Sold</th>
                                <th>Publication</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ([$magazines, $newspapers] as $p_content_list)
                                @foreach ($p_content_list as $p_content)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p_content->type  }}</td>
                                        <td>{{ $p_content->title }}</td>
                                        <td>{{ $p_content->price }}</td>
                                        <td>{{ $p_content->category->name }}</td>
                                        <td>{{ $p_content->users_who_bought_count }}</td>
                                        <td>{{ $p_content->publication->name }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
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
