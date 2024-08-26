@extends('layouts.admin')
@section('title', 'Users')
@section('pageheading')
    Subscription Report
@endsection
@section('content')
        <div class="container-fluid">
             <div class="container-fluid">
            <div class="my-2">
          <form action="{{route('admin.subscriptionReport')}}" method="get" class="my-2">
             <h4 class="text-bold">{{__('Filter based on dates:')}} </h4>
             <div class="row align-items-center">
                <div class="col-12 col-sm-4 form-group">
                   <label for="">{{__('FROM')}}</label>
                   <input type="date" class="form-control " name="start_date"
                      value="{{ request()->query('start_date') }}" >
                </div>
                <div class="col-12 col-sm-4 form-group">
                   <label for="">{{__('TO')}}</label>
                   <input type="date" class="form-control " name="end_date"
                      value="{{ request()->query('end_date') }}" >
                </div>
                <div class="col">
                    <div class="form-inline align-items-center">
                        <button class="btn btn-sm btn-sm btn-primary" style="margin-top:13px">
                            <i class="fas fa-filter"></i>
                            {{__('Filter')}}
                        </button>
                        @if (Request::exists('start_date'))
                            <a href="{{url()->current()}}" class="btn btn-sm btn-outline-primary ml-1 mt-2">
                                <i class="fas fa-xmark"></i>
                                X Clear
                            </a>
                        @endif
                    </div>
                </div>
             </div>
          </form>
       </div>
        {{-- @if (request()->type == App\Models\User::CUSTOMER) --}}
            <div class="row mb-3">
                <h6 class="col-12 font-weight-bold">Filter Subscription Packages</h6>
                <div class="col-12">
                    <form class="row" method="get" action="{{route('admin.subscriptionReport')}}">
                        <div class="col-lg-3">
                            <div class="form-group">
                                {{-- <label for="subsc_type">Subscription Status</label> --}}
                                <input id="title" name="title" class="form-control" placeholder="Enter Title" value={{request()->title}}>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                {{-- <label for="subsc_type">Subscription Status</label> --}}
                                {{-- <input id="type" name="type" class="form-control" placeholder="Enter Type" value={{request()->type}}> --}}
                                <select id="status" name="type" class="form-control" placeholder="Enter status" value={{request()->type}}>
                                    <option value=""> Select Type </option>
                                    <option value="bundle" @if(request()->type=="bundle") selected @endif> Bundle  </option>
                                    <option value="custom" @if(request()->type=="custom") selected @endif> Custom </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                {{-- <label for="subsc_type">Subscription Status</label> --}}
                                <select id="status" name="status" class="form-control" placeholder="Enter status">
                                    <option value=""> Select Status </option>
                                    <option value="1" @if(request()->status=='1') selected @endif> Active  </option>
                                    <option value="0" @if(request()->status=='0') selected @endif> De-active </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-inline align-items-center">
                                <button type="submit" class="btn-sm btn-sm btn-primary">
                                    <i class="fas fa-filter"></i>
                                    Filter
                                </button>
                                @if (Request::exists('status'))
                                    <a href="{{url()->current()}}" class="btn btn-sm btn-outline-primary ml-1">
                                        <i class="fas fa-xmark"></i>
                                        Clear
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="btn-group d-flex align-items-center mb-4">
                <form action="{{route('admin.download_subscribe_file')}}" method="get">

                    @foreach (Request::query() as $key => $value)
                        <input type="hidden" name="{{$key}}" value="{{$value}}">
                    @endforeach

                    <input type="hidden" name="file_type" value="pdf">

                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="label label-success"><i class="fas fa-table"></i> PDF</span> 
                    </button>
                </form>
                <form action="{{route('admin.download_subscribe_file', Request::query())}}" method="get" class="ml-2">
                    @foreach (Request::query() as $key => $value)
                        <input type="hidden" name="{{$key}}" value="{{$value}}">
                    @endforeach

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
                                <th>Title</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>No. of Publications</th>
                                <th>No Of Subscription</th>
                                <th> Subscription Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data))
                                @foreach ($data as $plans)
                                    <?php 
                                    // dd($plans->getUserSubscriptions()->where('pay_status',1)->where(DB::raw("DATE(created_at) = '".date('Y-m-d')."'"))->count());
                                        $Astatus = $plans->getUserSubscriptions->where('expires_at','>=',now())->count();
                                        $Dstatus = $plans->getUserSubscriptions->where('expires_at','<',now())->count();
                                    ?>
                                {{-- @dump($Astatus); --}}
                                {{-- @continue; --}}
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div>{{ $plans->title }}</div>
                                        </td>
                                        <td>{{ $plans->type }}</td>
                                        <td><span class="badge badge-{{($plans->status != 0)?"success":"danger"}}"> 
                                            {{ ($plans->status != 0)?"Active":"De-active" }} </span>
                                        </td>
                                        <td style="text-align: center">{{$plans->publications->count()}}</td>
                                        <td style="text-align: center">{{$plans->getUserSubscriptions->count()}}</td>
                                        <td><div class="btn-group">
                                                <a class="btn-sm btn-success {{($Astatus) ?'':'disabled'}}" href="{{route('admin.User_subscriptionReport',['id'=> $plans->id,'status'=>1])}}">
                                                    <span class="label label-success">Active</span> 
                                                    <span class="badge badge-warning">{{$Astatus}}</span>
                                                </a>
                                                <a class="btn-sm btn-danger {{($Dstatus) ?'':'disabled'}}" href="{{route('admin.User_subscriptionReport',['id'=> $plans->id,'status'=>0])}}">
                                                    <span class="label label-danger">Inactive</span> 
                                                    <span class="badge badge-info">{{$Dstatus}}</span>
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
                iDisplayLength: 100,
            });
        });
    </script>
@stop
