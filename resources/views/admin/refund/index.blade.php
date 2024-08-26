@extends('layouts.admin')
@section('title', 'Refunds')
@section('pageheading')
    Refunds Requests
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
             <div class="btn-group mb-4 d-flex align-items-center">
                <form action="{{route('admin.refund_export_reports')}}" method="post">
                    @csrf
                    <input type="hidden" name="email" value="{{request()->email}}">
                    <input type="hidden" name="type" value="main">
                    <input type="hidden" name="file_type" value="pdf">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="label label-success"><i class="fas fa-table"></i> Export PDF</span> 
                    </button>
                </form>
                <form action="{{route('admin.refund_export_reports')}}" method="post" class="ml-2">
                    @csrf
                    <input type="hidden" name="email" value={{request()->email}}>
                    <input type="hidden" name="type" value="main">
                    <input type="hidden" name="file_type" value="excel">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="label label-danger"><i class="fas fa-file-excel"></i> Export Excel</span> 
                    </button>
                </form>
            </div>
            
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="dataTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>For</th>
                                <th>Paid Amount</th>
                                <th>Refunded Amount</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($refunds as $refund)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $refund->user->first_name ??null }}<br/>
                                    {{ $refund->user->email ??null }}</td>
                                    <td>{{ $refund->entity_str }}</td>
                                    <td>{{ $refund->paid_amount }}</td>
                                    <td>{{ $refund->refund_amount }}</td>
                                    <th>{{ $refund->status_str }}</th>
                                    <th>{{ $refund->created_at->format('Y-m-d H:i') }}</th>
                                    <td>
                                        <div>
                                            @if (!$refund->can_be_refunded)
                                                {{ __('Refund cannot be initiated for PM: ' . $refund->payment->payment_method) }}
                                            @elseif (!$refund->isRefundInitiated())
                                                <button type="button" class="btn btn-sm btn-secondary refund_initiate_btn" data-toggle="modal"
                                                    data-target="#initiateRefundModal{{$refund->id}}">Initiate Refund</button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                @if (!$refund->isRefundInitiated())
                                    <div class="modal fade" id="initiateRefundModal{{$refund->id}}" tabindex="-1"
                                        aria-labelledby="initiateRefundModal{{$refund->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="initiateRefundModal{{$refund->id}}Label">Process Refund
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">x</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('admin.refund.process_refund') }}"
                                                        onsubmit="return confirm('Are you sure to refund this purchase (this action is undoable)?');">
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="hidden" name="refund_id" value="{{$refund->id}}">
                                                            <input type="number" name="refund_fee_percent" value=""
                                                                class="form-control"
                                                                placeholder="Refund Fee Percentage (optional)" />
                                                            <div><small>(You can specifiy how much do you want to deduct
                                                                    from original amount. Leave blank for full
                                                                    amount)</small></div>
                                                        </div>
                                                        <button type="submit" class="btn btn-sm btn-primary">
                                                            Initiate Refund
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
            $('#dataTable').DataTable({
                iDisplayLength: 100,
            });

            $(".refund_initiate_btn")
                .on("click", function() {
                    var refund_id = parseInt($(this).attr("data-refund_id"));

                    $("#modal_refund_id").val(refund_id);
                });
        });
    </script>
@stop
