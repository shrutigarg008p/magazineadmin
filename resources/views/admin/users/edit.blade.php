@extends('layouts.admin')
@section('title', 'Users')
@php
    $type = Request::query('type') ?? 'user';
@endphp
@section('pageheading')
    Users Edit
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit User</h3>
                    </div>
                    
                    <form action="{{ route('admin.users.update', ['user' => $user]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="card-body row">
                            <div class="form-group col-6">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                            </div>
                            @if(in_array($user->role_name,[App\Models\User::VENDOR,App\Models\User::CUSTOMER]))
                                <div class="form-group col-6">
                                    <label for="phone">Phone</label>
                                    <input type="tel"  name="phone" class=" form-control @error('phone') is-invalid @enderror" placeholder="Phone Number*" min="0" value="{{ old('phone',$user->phone) }}" autocomplete="false">
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
                                <div class="form-group col-6">
                                    <label for="dob">Date of Birth</label>
                                    <input class="date_pick_right form-control @error('dob')is-invalid @enderror" type="date"
                                        id="dob" name="dob" value="{{ old('dob',$user->dob) }}" placeholder="Date Of Birth*" autocomplete="false">

                                        @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @else
                                            <span class="valid-feedback" role="alert">
                                            </span>
                                        @enderror
                                </div>
                                
                                <div class="form-group col-6">
                                    <label for="password_confirmation">Country</label>
                                    <select name="country" id="country" class=" form-control @error('country') is-invalid @enderror">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country=>$value)
                                            {{-- @if($value == "Ghana")
                                                <option value="{{ $country }}" selected>{{ $value }}</option>
                                            @else --}}
                                            <option value="{{ $country }}" @if($country==$user->country) selected @endif>{{ $value }}</option>  
                                            {{-- @endif --}}
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
                                <div class="form-group col-6">
                                    <legend class="col-form-label font-weight-bold">Status</legend>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_active" value="1"
                                            {{ $user->status === 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_blocked" value="0"
                                            {{ $user->status === 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_blocked">
                                            Blocked
                                        </label>
                                    </div>
                                </div>
                            @elseif (in_array($user->role_name,[App\Models\User::REPORTER,App\Models\User::ADMIN]))
                            @php
                                $oldpermission = $user->getAllPermissions()->pluck('id')->all();
                            @endphp
                                <div class="form-group col-6">
                                    <label for="password">Select Role</label>
                                    <select name="role" class="form-control">
                                        <option value="">Select User Role</option>
                                        <option value="admin" @if($user->isAdmin()) selected @endif>ADMIN</option>
                                        <option value="reporter" @if($user->isReporter()) selected @endif>REPORTER</option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <legend class="col-form-label font-weight-bold">Status</legend>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_active" value="1"
                                            {{ $user->status === 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_blocked" value="0"
                                            {{ $user->status === 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_blocked">
                                            Blocked
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <h3>Select User Permission</h3>
                                    
                                    <div class="input_group row">
                                        @forelse ($permissions as $permission)
                                            <div class="btn-group-toggle col-2 mt-3" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                    <input type="checkbox" name="permission[]" value="{{$permission->id}}" @if(in_array($permission->id,$oldpermission)) checked @endif > {{ucwords($permission->name)}}
                                                </label>
                                            </div>
                                        @empty
                                            
                                        @endforelse
                                        
                                    </div>
                                </div>
                            @endif
                            
                            @if ( $user->hasRole(\App\Models\User::CUSTOMER) )
                            <input type="hidden" name="type" value="user">
                            @else
                            <input type="hidden" name="type" value="vendor">
                            @endif
                            @php
                                $_durations = [];
                            @endphp
                            @if ( $user->hasRole(\App\Models\User::CUSTOMER) )
                            <h4>Add Subscriptions</h4>
                                
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Plan Name</th>
                                            <th>Plan Duration</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                            <tr>
                                                <td>
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
                                                </td>
                                                <td>
                                                    <select name="plan_duration_id" id="plan_duration_id" class="form-control @error('plan_duration_id') is-invalid @enderror">
                                                        <option value="" selected disabled>-- Select Plan Duration --</option>
                                                        @foreach ($_durations as $code => $duration)
                                                            <option value="{{$code}}">{{$duration}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                               
                                                <td><button type="button" class="btn btn-primary" id="add_subscription">+ Add</button></td>
                                            </tr>
                                      
                                    </tbody>
                                </table>
                            @endif
                            @if ( $user->hasRole(\App\Models\User::CUSTOMER) )
                                <h4>User's Subscriptions</h4>
                                
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Plan Name</th>
                                            <th>Starts At</th>
                                            <th>Ends At</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($my_subscriptions as $my_subscription)
                                            <tr>
                                                <td>{{$my_subscription->plan->title}}</td>
                                                <td>
                                                    <input type="text" class="form-control" value="{{$my_subscription->subscribed_at->format('Y/m/d')}}" readonly>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control onlydatepicker date-changeable" name="expires_at_update[{{$my_subscription->id}}]" value="{{$my_subscription->expires_at->format('Y/m/d')}}" readonly>
                                                </td>
                                                <td>{{$my_subscription->status_str}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update
                                {{ ucfirst($user->type_text) }}</button>
                            <a href="{{route('admin.users.index')}}" class="btn btn-primary btn-cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('scripts')
<script>
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
        
</script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();

            var edited = false;

            $(".date-changeable").change(function() {
                edited = true;
            });

            $("form").submit(function() {
                if( edited ) {
                    return confirm("Date change about to be committed. Are you sure?");
                }
            });
            
            $("#add_subscription").click(function(e){
                e.preventDefault();
                var plan_id = $("#plan_id").val();
                var plan_duration_id = $("#plan_duration_id").val();
                var data = "plan_id="+plan_id+"&plan_duration_id="+plan_duration_id+"&user={{ $user->id }}";
                var status = true;
                
                
                if(plan_duration_id=='' || plan_duration_id== null ){
                     Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Please select Plan Duration!',
                          
                        })
                        status =false;
                }
                
                if(plan_id=='' || plan_id== null ){
                    Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Please select Plan!',
                          
                        })
                      status =false;  
                }
                if(status){
                Swal.fire({
                          title: 'Are you sure?',
                          text: "You want to give subscription to this users. This action won't be revert back!",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes, Add it!'
                        }).then((result) => {
                          if (result.isConfirmed) {
                              $.ajax({
                                    url: "{{ route('admin.plans.addSubscriptions') }}",
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                    },
                                    data: data,
                                    type: 'get',
                                    dataType: 'json',
                                    
                                    success: function(data) {
                                        console.log(data);
                                       if(data==2){
                                          Swal.fire({
                                              icon: 'error',
                                              title: 'Oops...',
                                              text: "You can't add 7 day free plan because its already Added.",
                                              
                                            }) 
                                       }else if(data==0){
                                            Swal.fire({
                                               icon: 'error',
                                              title: 'Oops...',
                                              text: "Something Wrong !",
                                              
                                            }) 
                                       }
                                       else{
                                           Swal.fire(
                                          'Successfully!',
                                          'Subscriptions Added.',
                                          'success'
                                        )
                                        setTimeout(function(){ window.location.reload(); }, 2000);
                                       }
                                    
                                     
                                    },
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    
                                });
                            
                          }
                        })
                }
                
        
            });
            
        });
        
        
        
        
    </script>
@stop
