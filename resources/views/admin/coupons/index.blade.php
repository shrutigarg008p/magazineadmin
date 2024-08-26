@extends('layouts.admin')
@section('title', 'Coupons')
@section('pageheading')
    Manage Coupons
@endsection
@section('content')
<style>
    @media (min-width: 576px){
    .modal-dialog {
        max-width: 800px;
    }
    }
</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="flex">
                    <a href="{{ route('admin.coupon.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                    <a href="{{ route('vendor.export_listing_coupon', ['content_type' => 'coupon', 'filetype' => 'pdf']) }}" class="btn btn-sm btn-primary ml-3">
                        <i class="fas fa-table"></i> Export PDF
                    </a>
                    <a href="{{ route('vendor.export_listing_coupon', ['content_type' => 'coupon', 'filetype' => 'excel']) }}" class="btn btn-sm btn-primary ml-3">
                        <i class="fas fa-file-excel"></i> Export Excel
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="dataTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Coupon Code</th>
                                <th>User Name</th>
                                <th>Discount</th>
                                <th>Valid Till</th>
                                <th title="Remaining number of times it can be used">
                                    Remaining usage <br>
                                    <div class="text-xs">Remaining number of <br>times it can be used</div>
                                </th>
                                <th>Used By</th>
                                <th>Status</th>
                                <th>Created (Y-m-d)</th>
                                <!--<th>Expired On</th>-->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($coupons as $coupon)
                            @php

                            $codes_used_by_users = [];

                            if( $coupon->codes_used_by_users ) {

                                foreach( $coupon->codes_used_by_users as $codes_used_by_user ) {
                                    if( $codes_used_by_user->user && $codes_used_by_user->is_used ) {
                                        $codes_used_by_users[] = $codes_used_by_user->user;
                                    }
                                }
                            }
                            @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $coupon->code }}</td>
                                    <td>{{ $coupon->user ? $coupon->user->name : '-' }}</td>
                                    <td><b>{{ $coupon->discount}}</b>{{($coupon->type==1)?'%':' USD/GHS' }}</td>
                                    <td>{{$coupon->created_at->addDays($coupon->valid_for)->format('Y-m-d')}}</td>
                                    <td>{{$coupon->used_times}}</td>
                                    {{-- <td>{{($coupon->checkCode($coupon->code))?'Not Used':'Used/Expired'}}</td> --}}
                                    <td>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#couponUsedByModal{{$coupon->id}}">
                                            <b>{{count($codes_used_by_users)}}</b> user(s)
                                        </a>

                                        <div class="modal fade" id="couponUsedByModal{{$coupon->id}}" tabindex="-1" role="dialog" aria-labelledby="couponUsedByModal{{$coupon->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="couponUsedByModal{{$coupon->id}}Label">
                                                    Coupon <b>{{$coupon->code}}</b> used by
                                                  </h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <a href="{{ route('vendor.export_listing_user_coupon', ['content_type' => 'usercoupons', 'filetype' => 'excel','coupon_code'=>$coupon->code]) }}" class="btn btn-sm btn-primary ml-3">
                                                        <i class="fas fa-table"></i> Export Excel
                                                    </a>
                                                    <a href="{{ route('vendor.export_listing_user_coupon', ['content_type' => 'usercoupons', 'filetype' => 'pdf','coupon_code'=>$coupon->code]) }}" class="btn btn-sm btn-primary ml-3">
                                                        <i class="fas fa-table"></i> Export PDF
                                                    </a>
                                                    <div class="table-responsive h-100">
                                                    <table class="table modalTable">
                                                        <thead>
                                                          <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Status</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($codes_used_by_users as $referred_to_user)
                                                              <tr>
                                                                <th scope="row">{{$referred_to_user->id}}</th>
                                                                <td><a target="_blank" href="{{route('admin.users.show', ['user' => $referred_to_user->id])}}">{{$referred_to_user->first_name}}</a></td>
                                                                <td>{{$referred_to_user->email}}</td>
                                                                <td>
                                                                    @if ($referred_to_user->verified)
                                                                        <i class="fas fa-check-circle text-success"></i>
                                                                        <small>Verified</small>
                                                                    @else
                                                                        <i class="fas fa-times-circle text-danger"></i>
                                                                        <small>Not Verified</small>
                                                                    @endif
                                                                </td>
                                                              </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            </script>
                                        </div>
                                    </td>
                                    <td>{{$coupon->status}}</td>
                                    <td>{{$coupon->created_at->format('Y-m-d')}}</td>
                                     <!--<td>{{$coupon->created_at->addDays($coupon->valid_for)->format('Y-m-d')}}</td>-->
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ route('admin.coupon.edit', ['coupon' => $coupon]) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                            @empty
                                No data
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
