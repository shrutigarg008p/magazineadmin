@extends('layouts.admin')
@section('title', 'System Users')
@section('pageheading')
    Users Edit
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add New System User</h3>
                    </div>
                    <form action="{{ route('admin.users.storesystemuser') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="card-body row">
                            <div class="form-group col-6">
                                <label for="full_name">Full Name</label>
                                <input type="text" class=" form-control col-12 @error('full_name') is-invalid @enderror" placeholder="Full Name*" value="{{ old('full_name') }}" name ="full_name" autocomplete="false">
                                @error('full_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                {{-- <input type="text" class="form-control" value="{{ $user->name }}" readonly> --}}
                            </div>
                            <div class="form-group col-6">
                                <label for="email">Email Address</label>
                                <input type="text" name ="email"  class=" form-control @error('email') is-invalid @enderror" placeholder="E-mail*" value="{{ old('email') }}" autocomplete="off">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @else
                                    <span class="valid-feedback" role="alert">
                                    </span>
                                @enderror
                                {{-- <input type="email" class="form-control" value="{{ $user->email }}" readonly> --}}
                            </div>
                            
                            
                            <div class="form-group col-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" class=" form-control @error('password') is-invalid @enderror" placeholder="Password*" autocomplete="false">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @else
                                    <span class="valid-feedback" role="alert">
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class=" form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password*" name="password_confirmation" autocomplete="false">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @else
                                    <span class="valid-feedback" role="alert">
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="password">Select Role</label>
                                <select name="role" class="form-control">
                                    <option value="">Select User Role</option>
                                    <option value="admin">ADMIN</option>
                                    <option value="reporter">REPORTER</option>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <h3>Select User Permission</h3>
                                
                                <div class="input_group row">
                                    @forelse ($permissions as $permission)
                                        <div class="btn-group-toggle col-2 mt-3" data-toggle="buttons">
                                            <label class="btn btn-outline-secondary">
                                                <input type="checkbox" name="permission[]" value="{{$permission->id}}"> {{ucwords($permission->name)}}
                                            </label>
                                        </div>
                                    @empty
                                        
                                    @endforelse
                                    
                                </div>
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
@section('scripts')
@stop
