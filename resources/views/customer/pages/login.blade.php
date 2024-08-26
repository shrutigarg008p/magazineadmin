@extends('layouts.customer')
@section('title', 'Login')

@section('content')
    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Login</li>
            </ul>
        </div>
    </section>
    <section class="register_page">
        <div class="container">
            <div class="Register_border_wrapper">
                <div class="text-center">
                    {{-- @if (session('success'))
                        <em class="badge badge-success">{{ session('success') }}</em>
                    @else
                        <em class="badge badge-danger">{{ session('error') }}</em>
                    @endif --}}
                     @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
                    </div>
                    @endif 
                </div>
                <h3 class="sidesection_heading">Login to your account</h3>
                <form action="{{ route('customer.login') }}" method="post" class="contact_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text"name="email" class="custom_input @error('email')is-invalid @enderror" placeholder="Username" @if(Cookie::has('login_email')) value="{{Cookie::get('login_email')}} @endif">
                             @error('email')
                            <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="login_eye">
                                <img src="" id="toggle_pwd" class="fa fa-fw fa-eye-slash field_icon" alt="">
                                <input type="password" name="password" id="txtPassword" 
                                @if(Cookie::has('login_pass')) value="{{Cookie::get('login_pass')}}" @endif class="custom_input @error('password')is-invalid @enderror" placeholder="Password">
                               {{-- <span id="toggle_pwd" class="fa fa-fw fa-eye field_icon"></span> --}}
                               {{-- @error('password')
                               <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                   <strong>{{ $message }}</strong>
                               </span>
                               @enderror --}}
                            </div>
                            <div class="remember_forgot">

                                <div class="input_group_remember">
                                    <label class="checkbox_container">Remember me
                                        <input type="checkbox" @if(Cookie::has('login_email'))checked @endif name="remember">
                                        <span class="checkbox_checkmark"></span>
                                    </label>
                                </div>
                                <div class="forgot_password">
                                    <a href="{{ route('forgot_password') }}">Forgot password?</a>
                                </div>
                            </div>
                            <button class="register_next_btn">Login</button>
                            <div class="login_with_social">
                                <p class="lws_heading">Or Login using</p>
                                <ul class="login_social_icon">
                                    <li><a href=""><img src="{{ asset('assets/frontend/img/icon-l-facebook.png') }}"
                                                alt="" style="display:none"></a></li>
                                    <li><a href=""><img src="{{ asset('assets/frontend/img/icon-l-instagram.png') }}"
                                                alt="" style="display:none"></a></li>
                                    <li><a href=""><img src="{{ asset('assets/frontend/img/icon-l-twitter.png') }}"
                                                alt="" style="display:none"></a></li>
                                    <li><a href="{{route('google.login')}}"><img src="{{ asset('assets/frontend/img/google.png') }}"
                                                alt="" height="90" class="google-icon" style="margin-right:71px"></a></li>
                                    <li><a href=""><img src="{{ asset('assets/frontend/img/icon-l-apple.png') }}"
                                                alt=""style="display:none"></a></li>
                                </ul>
                            </div>
                            <a href="{{ route('register') }}" class="existing_user_login_btn">Don't have an account ? Sign
                                Up</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
