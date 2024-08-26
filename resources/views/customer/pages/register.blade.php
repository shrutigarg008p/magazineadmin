@extends('layouts.customer')
@section('title', 'Register')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/intlTelInput.min.css') }}">
    <style>
        .iti--allow-dropdown {
            width: 100%;
            margin-bottom: 20px;
        }

        .iti__flag {
            height: 15px;
            box-shadow: 0px 0px 1px 0px #888;
            background-image: url("{{ url('flags.png') }}");
            background-repeat: no-repeat;
            background-color: #DBDBDB;
            background-position: 20px 0;
        }

        @media (-webkit-min-device-pixel-ratio: 2),
        (min-resolution: 192dpi) {
            .iti__flag {
                background-image: url("{{ url('flags@2x.png') }}");
            }
        }
        #fail {
            display: none;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        input.customcaptcha {
            border: 1px solid #ca0a0a;
            width: 50px;
            height: 30px;
            text-align: center;
            font-weight: lighter;
            font-size: 14px;
        }

        button {
            color: #FFF;
            background: #fcbaba;
            cursor: pointer;
            transition: background .5s ease-in-out;
        }

        button:hover:enabled {
            background: #303030;
        }

        button:disabled {
            opacity: .5;
            cursor: default;
        }
        i#toggle_rcpwd,i#toggle_rpwd{margin: -53px -98px 29px 343px;}
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('js/intlTelInput.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var $ = $ || jQuery;

            var $input = $("#telephone_input");

            var iti = intlTelInput($input.get(0), {
                initialCountry: "gh"
            });

            $input.on("blur", function() {
                $("#telephone_input_real").val(
                    iti.getSelectedCountryData().dialCode + $input.val()
                );
            });
        });
    </script>
@endsection

@section('content')
    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{ url('customer') }}">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Register</li>
            </ul>
        </div>
    </section>
    <section class="register_page">
        <div class="container">
            <div class="Register_border_wrapper">
                <div class="text-center">
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
                <h3 class="sidesection_heading">Create Graphic NewsPlus account</h3>
                <form action="{{ route('customer.user.store') }}" method="post" class="contact_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" class="custom_input @error('full_name') is-invalid @enderror"
                                placeholder="Full Name*" value="{{ old('full_name') }}" name="full_name" minlength="3"
                                maxlength="35">
                            @error('full_name')
                                <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input type="email" name="email" class="custom_input @error('email') is-invalid @enderror"
                                placeholder="E-mail*" value="{{ old('email') }}" maxlength="150">
                            @error('email')
                                <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="telephone_input" type="tel"
                                class="custom_input  @error('phone') is-invalid @enderror" placeholder="0551484843"
                                min="0" value="{{ old('phone') }}" {{-- maxlength="10" --}}>
                            <input id="telephone_input_real" type="hidden" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{--  <div class="date_pick_icon">
                                <input class="date_pick_right @error('dob') is-invalid @enderror"
                            placeholder="Date of birth*" value="{{ old('dob') }}" type="text" id="geburtsdatum1" name="geburtsdatum1" maxlength="" onfocus="loadInputText()" onClick="this.select(); " name="dob">
                            </div> --}}
                            <input class="date_pick_right @error('dob')is-invalid @enderror" type="date" id="dob"
                                name="dob" value="{{ old('dob') }}" placeholder="Date Of Birth*">

                            @error('dob')
                                <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input type="password" name="password"
                                class="custom_input @error('password') is-invalid @enderror" placeholder="Password*"
                                id="r-pass" minlength="8">
                            <i id="toggle_rpwd" class="fa fa-fw fa-eye-slash field_icon"></i>
                            {{-- @error('password')
                            <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror --}}

                            <input type="password" class="custom_input @error('password_confirmation') is-invalid @enderror"
                                placeholder="Confirm Password*" name="password_confirmation" id="rc-pass" minlength="8">
                            <i id="toggle_rcpwd" class="fa fa-fw fa-eye-slash field_icon"></i>

                            {{-- @error('password_confirmation')
                            <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror --}}

                            {{-- <input type="text" class="custom_input @error('country') is-invalid @enderror" placeholder="Country*"
                            value="{{ old('country') }}" name ="country" >
                            @error('country')
                            <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror --}}


                            <select name="country" id="country"
                                class="custom_input @error('country') is-invalid @enderror">
                                <option value="">Select Country</option>
                                @foreach ($countries as $country => $value)
                                    @if ($value == 'Ghana')
                                        <option value="{{ $country }}" selected>{{ $value }}</option>
                                    @else
                                        <option value="{{ $country }}">{{ $value }}</option>
                                    @endif
                                @endforeach

                            </select>

                            @error('country')
                                <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input type="text" class="custom_input " placeholder="Referral Code - Optional" name="refer_code"
                                value="{{ Request::query('refer_code') }}" minlength="8" maxlength="8">
                            <select name="referred_from" id="referred_from" class="custom_input ">
                                <option value="">How did you hear about us?</option>

                                @foreach ($heard_froms as $heard_from)
                                    <option value="{{ $heard_from->title }}">{{ $heard_from->title }}</option>
                                @endforeach

                                <option value="Others">Others</option>
                            </select>

                            <div class="icheck-primary" style="text-align:left;">
                                <input type="checkbox" id="terms" name="terms" value="agree"
                                    class=" @error('terms') is-invalid @enderror">

                                {{-- <input type="checkbox" id="terms" name="terms" value="agree"
                                    class="custom_input @error('terms')is-invalid @enderror"> --}}
                                <label for="terms">
                                    I agree to the <a href="{{ url('terms') }}">Terms and Conditions</a>
                                </label>
                                {{-- @error('terms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>



                            {{--  <select name="" id="" class="custom_input">
                                <option value="">Select Country</option>
                                <option value="">Magazine</option>
                            </select> --}}
                            <label>To continue, please solve the following equation:</label>
                            <p id="question" class="mb-2"></p>
                            <span id="fail" class="text-danger">Captcha verification failed!</span>
                            <button class="register_next_btn">Next</button>
                            <a href="{{ route('login') }}" class="existing_user_login_btn">Existing User? Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        var total;

        function getRandom() {
            return Math.ceil(Math.random() * 20);
        }

        function createSum() {
            var randomNum1 = getRandom(),
                randomNum2 = getRandom();
            total = randomNum1 + randomNum2;
            $("#question").html(randomNum1 + " + " + randomNum2 + " = "+'<input id="ans" class="customcaptcha" type="text">');
            $("#ans").val('');
            checkInput();
        }

        function checkInput() {
            var input = $("#ans").val(),
                slideSpeed = 200,
                hasInput = !!input,
                valid = hasInput && input == total;
            $('button[class=register_next_btn]').prop('disabled', !valid);
            $('#fail').toggle(hasInput && !valid);
        }

        $(document).ready(function() {
            //create initial sum
            createSum();
            // On "reset button" click, generate new random sum
            $('button[type=reset]').click(createSum);
            // On user input, check value
            $("#ans").keyup(checkInput);
        });
    </script>
