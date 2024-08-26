@extends('layouts.admin')
@section('title', 'Users')
@php
    $type = Request::query('type') ?? 'user';
@endphp
@section('pageheading')
    Create {{\ucwords($type)}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <form action="{{ route('admin.users.store') }}" method="post" autocomplete="off">
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
                                <label for="phone">Phone</label>
                                <input type="tel"  name="phone" class=" form-control @error('phone') is-invalid @enderror" placeholder="Phone Number*" min="0" value="{{ old('phone') }}" autocomplete="false">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @else
                                        <span class="valid-feedback" role="alert">
                                        </span>
                                    @enderror
                                {{-- <input type="email" class="form-control" value="{{ $user->email }}" readonly> --}}
                            </div>

                            @if ($type != 'company')
                            <div class="form-group col-6">
                                <label for="dob">Date of Birth</label>
                                <input class="date_pick_right form-control @error('dob')is-invalid @enderror" type="date"
                                    id="dob" name="dob" value="{{ old('dob') }}" placeholder="Date Of Birth*" autocomplete="false">

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @endif

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
                                <label for="country">Country</label>
                                <select name="country" id="country" class=" form-control @error('country') is-invalid @enderror">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country=>$value)
                                        @if($value == "Ghana")
                                            <option value="{{ $country }}" selected>{{ $value }}</option>
                                        @else
                                        <option value="{{ $country }}" >{{ $value }}</option>  
                                        @endif
                                    @endforeach

                                </select>

                                @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @else
                                    <span class="valid-feedback" role="alert">
                                    </span>
                                @enderror
                            </div>

                            @php
                                $_durations = [];
                            @endphp

                            @if ($type != 'company')
                            <div class="col-12">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="plan_id">Plan</label>
                                        <select name="plan_id" id="plan_id" class="form-control @error('plan_id') is-invalid @enderror">
                                            <option value="" selected>-- No Plan Selected --</option>
                                            @foreach ($plans as $plan)
                                                @php
                                                    $duration_str = '[]';
                                                    try {
                                                        $duration_str = $plan->durations->pluck('code')->unique()->values()->toJson();
                                                    } catch(\Exception $e) {}

                                                    foreach( $plan->durations as $duration ) {
                                                        $_durations[$duration->code] = $duration->value;
                                                    }
                                                @endphp
                                                <option value="{{ $plan->id }}" data-durations="{{$duration_str}}" >{{ $plan->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="plan_duration_id">Plan Duration</label>
                                        <select name="plan_duration_id" id="plan_duration_id" class="form-control @error('plan_duration_id') is-invalid @enderror">
                                            <option value="" selected disabled>-- Select Plan Duration --</option>
                                            @foreach ($_durations as $code => $duration)
                                                <option value="{{$code}}">{{$duration}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('admin.users.index')}}" class="btn btn-primary btn-cancel">Cancel</a>
                        </div>
                        <input type="hidden" name="user_role" value="{{$type}}">
                    </form>
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

            
            var plans = $("#plan_id");
            var plan_durations = $("#plan_duration_id");

            var plan_duration_options = plan_durations.find("option");

            plans.change(function() {
                var selected_option = plans.find(":selected");

                if( selected_option.length ) {
                    var durations = $(selected_option).attr("data-durations");
                    if( typeof durations === 'string' ) {
                        durations = JSON.parse(durations);
                    }

                    plan_duration_options.each(function() {
                        var option = $(this);
                        var inArray = $.inArray(option.val(), durations) > -1;

                        option.toggle( inArray );
                    });
                }

                plan_durations.prop("required", selected_option.val() !== "");
            });
        });
    </script>
@stop
