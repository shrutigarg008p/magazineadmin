@extends('layouts.admin')
@section('title', 'Plans')
@section('pageheading')
    Manage Plans
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1 mb-5">
                <div class="flex">
                    <a href="{{ route('admin.plans.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
                
            </div>
            <div class="col-lg-4 mb-5 d-flex align-items-center">
                <form action="{{route('admin.plans_export_reports')}}" method="post">
                    @csrf
                    <input type="hidden" name="email" value="{{request()->email}}">
                    <input type="hidden" name="type" value="main">
                    <input type="hidden" name="file_type" value="pdf">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="label label-success"><i class="fas fa-table"></i> Export PDF</span> 
                    </button>
                </form>
                <form action="{{route('admin.plans_export_reports')}}" method="post" class="ml-2">
                    @csrf
                    <input type="hidden" name="email" value={{request()->email}}>
                    <input type="hidden" name="type" value="main">
                    <input type="hidden" name="file_type" value="excel">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="label label-danger"><i class="fas fa-file-excel"></i> Export Excel</span> 
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
                                <th>Type</th>
                                <th>Status</th>
                                <th>Display Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($plans as $plan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ Str::ucfirst($plan->title) }} [ ID: {{$plan->id}} ]</td>
                                    <td>
                                        @if($plan->id == env('FREE_PLAN_ID'))
                                        <p>-</p>
                                        @else
                                        {{ Str::upper($plan->type) }}
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <form class="toggle_switch" method="post"
                                                action="{{ route('admin.plans.changestatus', ['plan' => $plan]) }}">
                                                @csrf
                                                <label class="m_8898_switch">
                                                    <input type="checkbox" onchange="$(this).parents('form').submit();" {{$plan->status ? 'checked':''}}>
                                                    <span class="m_8898_slider round"></span>
                                                </label>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        @if($plan->id != env('FREE_PLAN_ID'))
                                        {{ $plan->display_order }}
                                        @endif
                                    </td>                                    
                                    <td>
                                        <div class="btn-group">
                                            @if($plan->id != env('FREE_PLAN_ID'))
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ route('admin.plans.edit', ['plan' => $plan]) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                
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
                   dom: 'Bfrtip',
                   buttons: [
                      {
                         extend: 'excel',
                         text: 'Export Data',
                         className: 'btn btn-default',
                         exportOptions: {
                            columns: '[0,1,2,3,4,5]'
                         }
                      }
                   ]
            });
        });
    </script>
@stop
