@extends('layouts.customer')
@section('title', 'My Profile')

@section('content')
    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">My Profile</li>
            </ul>
        </div>
    </section>
    <!-- my account -->
    <section class="my_profile">
      <div class="container">
        <div class="my_pro_group">
            {{-- <div class="my_pro_heading">My Profile</div> --}}

            <form action="{{ route('profile-store') }}"  method="post"  class="contact_form">
                    @csrf
                <div class="my_pro_inner">
                    <div class="input_group">
                        <label for="" class="input_heading">Name: </label>
                       <input type="text" class="custom_input @error('full_name') is-invalid @enderror" placeholder="Full Name*"
                            value="{{ auth()->user() ? auth()->user()->first_name . " ".auth()->user()->last_name : null}}" name ="full_name" readonly >
                            @error('full_name')
                            <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="input_group">
                        <label for="" class="input_heading">Email: </label>
                        <input type="text" value="{{auth()->user() ? auth()->user()->email : null}}" class="custom_input @error('email') is-invalid @enderror" name="email" placeholder="Email" readonly>
                         @error('email')
                        <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input_group">
                        <label for="" class="input_heading">Phone: </label>
                        <input type="tel" step="any" name="phone" class="custom_input @error('phone') is-invalid @enderror" placeholder="Phone number" value="{{ auth()->user() ? auth()->user()->phone : null}}" {{auth()->user()->phone ? 'readonly':''}}>
                        @error('phone')
                        <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                     <div class="input_group">
                        <label for="" class="input_heading date_pick_right">Date Of Birth: </label>
                       <input class="custom_input @error('dob')is-invalid @enderror" type="date"
                        id="dob" name="dob" value="{{ auth()->user() ? auth()->user()->dob  : null}}" placeholder="Date Of Birth*">
                        @error('dob')
                        <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                     <div class="input_group">
                        <label for="" class="input_heading">Gender: </label>

                        <select name="gender" id="gender" class="custom_input @error('gender') is-invalid @enderror">
                            <option value="">Select</option>
                            @if($user = auth()->user())
                                <option value="m" {{$user->gender == 'm' ? 'selected':''}} >Male</option> 
                                <option value="f" {{$user->gender == 'f' ? 'selected':''}}>Female</option> 
                                <option value="o" {{$user->gender == 'o' ? 'selected':''}}>Other</option>
                            @endif
                        </select>

                        @error('gender')
                            <div>
                                <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>
                        @enderror
                    </div>

                    <div class="input_group">
                        <label for="" class="input_heading">Country: </label>
                         <select name="country" id="country" class="custom_input @error('country') is-invalid @enderror">
                        @foreach ($countries as $country=>$value)
                        @if($value == "Ghana")
                            <option value="{{ $country }}" selected>{{ $value }}</option>

                        @else
                          <option value="{{ $country }}" >{{ $value }}</option>  
                        @endif
                        @endforeach
                                  

                        </select>
                    </div>
                    <div class="subs_pcbtn_group">
                        <button class="subs_pay_now_btn">Update</button>
                        {{-- <button class="subs_cancel_btn">Cancel</button> --}}
                    </div>
                   {{--  <div class="input_group">
                        <label for="" class="input_heading">Font Size: </label>
                        <select name="" id="" class="custom_input">
                            <option value="">S</option>
                            <option value="">M</option>
                            <option value="">L</option>
                        </select>
                    </div>
                </div> --}}
                    </div>
            </form>
        </div>
           
        <div class="my_pro_group">
            <div class="my_pro_heading">Password Change</div>
            <form action="{{ route('changePassword') }}"  method="post"  class="contact_form">
                @csrf
                <div class="my_pro_inner">
                    <div class="input_group">
                        <label for="" class="input_heading">Old Password: </label>
                          <input type="password" name="old_password" class="custom_input @error('old_password') is-invalid @enderror" placeholder="Old Password" value="{{ old('old_password') }}" autocomplete="new-password">
                                  
                        @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input_group">
                        <label for="" class="input_heading">New Password: </label>
                        <input type="password" name="new_password"
                                    class="custom_input @error('new_password') is-invalid @enderror"
                                    placeholder="New Password" value="{{ old('new_password') }}"
                                    autocomplete="new-password">
                                   
                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input_group">
                        <label for="" class="input_heading">Confirm Password: </label>
                       <input type="password" name="new_password_confirmation"
                                    class="custom_input @error('new_password_confirmation') is-invalid @enderror"
                                    placeholder="New Password Confirmation" value="{{ old('new_password_confirmation') }}"
                                    autocomplete="new-password">
                               
                        @error('new_password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="subs_pcbtn_group">
                    <button class="subs_pay_now_btn">Update</button>
                    {{-- <button class="subs_cancel_btn">Cancel</button> --}}
                </div>
                </div>
            </form>
        </div>

        <div class="my_pro_group">
            <div class="my_pro_heading">Preferences</div>
            <form action="{{ route('savePreferences') }}" method="post"  class="contact_form">
                @csrf
                <div class="my_pro_inner">
                    <div class="input_group row">
                        @forelse ($prefs as $pref)
                            <div class="btn-group-toggle col-2 mt-3" data-toggle="buttons">
                                @if(!empty($selected_pref) && in_array($pref->id,$selected_pref))
                                    <label class="btn btn-outline-secondary active">
                                        <input type="checkbox" name="pref[]" checked value="{{$pref->id}}"> {{$pref->name}}
                                    </label>
                                @elseif (empty($selected_pref))
                                    <label class="btn btn-outline-secondary active">
                                        <input type="checkbox" name="pref[]" checked value="{{$pref->id}}"> {{$pref->name}}
                                    </label>
                                @else
                                    <label class="btn btn-outline-secondary @if( in_array($pref->id,$selected_pref)) active @endif">
                                        <input type="checkbox" name="pref[]" value="{{$pref->id}}"> {{$pref->name}}
                                    </label>
                                @endif
                            </div>
                        @empty
                            
                        @endforelse
                        
                    </div>
                    
                    
                    <div class="subs_pcbtn_group">
                    <button class="subs_pay_now_btn">Save Preferences</button>
                </div>
                </div>
            </form>
        </div>
        
        </div>
    </section>
    @include('customer.account.partials.footer')
@endsection
