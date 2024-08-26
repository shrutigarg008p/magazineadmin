@extends('layouts.admin')
@section('title', 'Clicks & Read Analytics (Ads, Magazines, Newspapers)')
@section('pageheading')
    Clicks & Read Analytics (Ads, Magazines, Newspapers)
@endsection
@section('content')
    <div class="container-fluid">
        {{-- @if (request()->type == App\Models\User::CUSTOMER) --}}
        <div class="row mb-3">
            <h5 class="col-12">Filter Users By Email</h5>
            <div class="col-lg-5">
                <form class="row" method="get" action="{{route('admin.ad_reading_views_report')}}">
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
                <form action="{{route('admin.ads_report_file')}}" method="post">
                    @csrf
                    <input type="hidden" name="email" value="{{request()->email}}">
                    <input type="hidden" name="type" value="main">
                    <input type="hidden" name="file_type" value="pdf">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="label label-success"><i class="fas fa-table"></i> Export PDF</span> 
                    </button>
                </form>
                <form action="{{route('admin.ads_report_file')}}" method="post" class="ml-2">
                    @csrf
                    <input type="hidden" name="email" value={{request()->email}}>
                    <input type="hidden" name="type" value="main">
                    <input type="hidden" name="file_type" value="excel">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="label label-danger"><i class="fas fa-file-excel"></i> Export Excel</span> 
                    </button>
                </form>
            </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="dataTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Ads Clicked</th>
                                <th>Magazines Read</th>
                                <th>Newspaper Read</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($activities as $key => $activity)
                            @php
                                $user = $activity['user'] ?? new \App\Models\User();
                            @endphp
                            @if($user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <div>{{ $user->name }}</div>
                                    </td>
                                    <td>
                                        <div>{{ $user->email }}</div>
                                    </td>
                                    <td>{{ $activity['ads'] }} times</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#clickMagazineModal{{$key}}">
                                            <span class="label label-warning">Magazines</span>
                                            <span class="badge badge-info"> {{ $activity['magazine']['count'] }} </span> 
                                        </button>

                                        <div class="modal" id="clickMagazineModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="clickMagazineModal{{$key}}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="clickMagazineModal{{$key}}Label">Magazines</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="list-group">
                                                        @forelse ($activity['magazine']['list'] as $item)
                                                            @php($content = $item['item'])

                                                            <li class="list-group-item">
                                                                <div class="row align-items-center">
                                                                    <div class="col-4">
                                                                        <img src="{{url('storage/'.$content->thumbnail_image)}}" alt="" class="img-thumbnail" />
                                                                    </div>
                                                                    <div class="col-8">
                                                                        {{$content->title}}
                                                                        <span class="badge badge-info"> {{ $item['count'] }} </span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @empty
                                                            <h5 class="text-bold">No Data</h5>
                                                        @endforelse
                                                    </ul>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#clickNewspaperModal{{$key}}">
                                            <span class="label label-success">Newspaper</span> 
                                            <span class="badge badge-info"> {{ $activity['newspaper']['count'] }} </span>
                                        </button>

                                        <div class="modal" id="clickNewspaperModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="clickNewspaperModal{{$key}}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="clickNewspaperModal{{$key}}Label">Newspapers</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="list-group">
                                                        @forelse ($activity['newspaper']['list'] as $item)
                                                            @php($content = $item['item'])

                                                            <li class="list-group-item">
                                                                <div class="row align-items-center">
                                                                    <div class="col-4">
                                                                        <img src="{{url('storage/'.$content->thumbnail_image)}}" alt="" class="img-thumbnail" />
                                                                    </div>
                                                                    <div class="col-8">
                                                                        {{$content->title}}
                                                                        <span class="badge badge-info"> {{ $item['count'] }} </span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @empty
                                                            <h5 class="text-bold">No Data</h5>
                                                        @endforelse
                                                    </ul>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endif
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
                  
            });
        });
    </script>
@stop
