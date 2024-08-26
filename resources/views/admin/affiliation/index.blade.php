@extends('layouts.admin')
@section('title', 'Affiliations')
@section('pageheading')
    Affiliations
@endsection
@section('content')
@php
    $qRole = Request::query('role');
@endphp
    <style>
        @media (min-width: 576px){
            .modal-dialog {
                max-width: 500px;
                margin: 1.75rem auto;
            }
        }
    </style>
    <div class="container-fluid">

        <div class="row mb-4">
            <div class="col-12">
                <p class="text-bold">By Role</p>
                <form action="" method="get">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4">
                                <select name="role" class="form-control" onchange="return this.form.submit();">
                                    <option value="">All</option>
                                    <option value="user" {{ $qRole == 'user'?'selected':'' }}>User</option>
                                    <option value="company" {{ $qRole == 'company'?'selected':'' }}>Company</option>
                                </select>      
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
       <div class="btn-group mb-4 d-flex align-items-center">
                <form action="{{route('admin.affiliations_exports_file')}}" method="post">
                    @csrf
                    <input type="hidden" name="role" value="{{request()->role}}">
                    <input type="hidden" name="type" value="main">
                    <input type="hidden" name="file_type" value="pdf">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="label label-success"><i class="fas fa-table"></i> Export PDF</span> 
                    </button>
                </form>
                <form action="{{route('admin.affiliations_exports_file')}}" method="post" class="ml-2">
                    @csrf
                    <input type="hidden" name="role" value={{request()->role}}>
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
                                <th>ID</th>
                                <th>Name</th>
                                <th>RoleName</th>
                                <th>Email</th>
                                <th>Referral Code</th>
                                <th>
                                    <div>Referred To</div>
                                    <small style="font-size:0.65rem">
                                        No. of users this user has referred to
                                    </small>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <span class="badge badge-primary">
                                            {{ $user->role_name }}
                                        </span>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->refer_code }}</td>
                                    <td>
                                        <div class="d-flex">
                                            {{ intval($user->referred_to_count) }}
                                            <a href="#" class="ml-3" data-toggle="modal" data-target="#usersListModal{{$user->id}}"><u>Users</u></a>
                                        </div>
                                        <div class="modal fade" id="usersListModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="usersListModal{{$user->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="usersListModal{{$user->id}}Label">
                                                    <b>{{$user->name}}</b> referred to:
                                                  </h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive h-100">
                                                        <table class="table">
                                                            <thead>
                                                              <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Email</th>
                                                                <th scope="col">Status</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($user->referred_to as $referred_to_user)
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
                                        </div>
                                    </td>
                                </tr>
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
                
            });
        });
    </script>
@stop
