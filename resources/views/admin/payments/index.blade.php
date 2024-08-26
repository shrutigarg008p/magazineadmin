@extends('layouts.admin')
@section('title', 'Payments')
@section('pageheading')
    <h3 class="font-weight-bold">Payments</h3>
@endsection
@section('content')

    <style>
        table {
            table-layout: fixed;
        }

        td {
                white-space: normal;
                word-break: break-word;
        }

        .dot {
            height: 20px;
            width: 20px;
            min-width:20px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
        }

        .dot.SUCCESS {
            background-color: rgb(3, 187, 3);
        }

        .dot.CANCELLED,
        .dot.FAILED {
            background-color: rgb(206, 14, 14);
        }

        .dot.PENDING {
            background-color: rgb(223, 169, 32);
        }
    </style>

    <div class="container-fluid">
        @if (Session::has('success'))
            <div class="alert alert alert-info alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <div class="btn-group mb-4 d-flex align-items-center">
                <form action="{{route('admin.payments_export_reports')}}" method="post">
                    @csrf
                    <input type="hidden" name="q" value="{{request()->q}}">
                    <input type="hidden" name="status" value="{{request()->status}}">
                    <input type="hidden" name="type" value="main">
                    <input type="hidden" name="file_type" value="pdf">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="label label-success"><i class="fas fa-table"></i> Export PDF</span> 
                    </button>
                </form>
                <form action="{{route('admin.payments_export_reports')}}" method="post" class="ml-2">
                    @csrf
                    <input type="hidden" name="q" value="{{request()->q}}">
                    <input type="hidden" name="status" value="{{request()->status}}">
                    <input type="hidden" name="type" value="main">
                    <input type="hidden" name="file_type" value="excel">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="label label-danger"><i class="fas fa-file-excel"></i> Export Excel</span> 
                    </button>
                </form>
            </div>
                    @include('admin.payments._filters')
                    <table id="dataTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Local Ref</th>
                                <th>Payment Gateway Ref</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->id }}</td>
                                    <td>{{ isset($payment->user) ? $payment->user->email : 'N/A' }}</td>
                                    <td>{{ Str::title($payment->type) }}</td>
                                    <td>{{ $payment->currency.' '.$payment->amount }}</td>
                                    <td>{{ Str::title($payment->payment_method) }}</td>
                                    <td>{{ $payment->local_ref_id }}</td>
                                    <td>{{ $payment->remote_id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="dot {{ $payment->status }} mr-1"></span>
                                            <span class="text-nowrap">{{ $payment->status }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger ml-1" data-toggle="modal"
                                            data-target="#editContent{{ $payment->id }}">
                                            Edit
                                        </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editContent{{ $payment->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editContent{{ $payment->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editContent{{ $payment->id }}Label">Update
                                                    status</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('admin.payments.update') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <p>
                                                            Payment ID: <b>{{ $payment->id }}</b>
                                                        </p>
                                                        <p>
                                                            Current status:
                                                            <span class="dot {{ $payment->status }} mr-1"></span>
                                                            <b>{{ $payment->status }}</b>
                                                        </p>
                                                        <select name="status" class="form-control">
                                                            <option value="PENDING"
                                                                {{ $payment->status == 'PENDING' ? 'selected' : '' }}>Pending
                                                            </option>
                                                            <option value="SUCCESS"
                                                                {{ $payment->status == 'SUCCESS' ? 'selected' : '' }}>Success
                                                            </option>
                                                            <option value="CANCELLED"
                                                                {{ $payment->status == 'CANCELLED' ? 'selected' : '' }}>
                                                                Cancelled</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-end">
                                                    <input type="hidden" name="payment_id" value="{{ $payment->id }}">
                                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3 d-flex justify-content-end">
                        {{$payments->appends(Request::query())->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('scripts')
    <script>
        // $(document).ready(function() {
        //      $('#dataTable').DataTable({
        //         iDisplayLength: 100,
        //     });
        // });
    </script>
@stop
