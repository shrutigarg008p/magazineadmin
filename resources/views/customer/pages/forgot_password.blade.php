@extends('layouts.customer')
@section('title', 'Forgot Password')

@section('content')
    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Forgot Password</li>
            </ul>
        </div>
    </section>
    <section class="register_page">
        <div class="container">
            <div class="Register_border_wrapper">
                <h3 class="sidesection_heading">Forgot your password?</h3>
                <p class="fp_subheading">@if ($message = Session::get('success'))
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
                    @endif </p>
                <form action="{{route('customer.forgotpassword')}}" class="contact_form" method="post"
                    enctype="multipart/form-data" class="form-horizontal style-form"   data-parsley-validate>
                    @csrf
                     @if($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                    <br />
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" class="custom_input" placeholder="Enter your account's email address " data-parsley-trigger="keyup" parsley-rangelength="[2,50]" name="email" id="email"  data-parsley-required data-parsley-error-message="Please Enter Email Address " placeholder="Email Address">
                            <button class="register_next_btn">Continue</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
