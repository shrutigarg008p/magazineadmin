

@extends('layouts.admin')
@section('title', 'Change Password')
@section('pageheading')
    Change Password
@endsection
@section('content')
    <div class="container-fluid">
         @php
            $admin=Auth::user();
        @endphp
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Change Password</h3>
                    </div>
                    @if (session('stop'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('stop') }}
                        </div>
                    @endif
                    @if (session('done'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('done') }}
                        </div>
                    @endif
                     <form action="{{route('admin.changepassword')}}" method="post" >
                        @csrf
                        <input type="hidden" name="adminid" id="adminid" value="{{$admin['id']}}">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="current-password">Old Password*</label>
                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror"
                                    value="{{ old('current_password') }}">

                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                 @if(session()->has('msg'))
                                <div class="alert alert-danger">
                                  <h5 class="text-center">Invalid Current Password</h5>
                                </div>
                                 @endif
                            </div>
                        </div>
                         <div class="card-body">
                            <div class="form-group">
                                <label for="new_password">New Password*</label>
                                  <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror"
                                    value="{{ old('new_password') }}">

                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
