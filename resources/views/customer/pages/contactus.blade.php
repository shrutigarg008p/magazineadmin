@extends('layouts.customer')
@section('title', 'Contact Us')

@section('content')
    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Contact Us</li>
            </ul>
        </div>
    </section>
    <section class="contact_wrapper">
        <div class="container">
            <h3 class="sidesection_heading">Contact Us</h3>
            <div class="am_text_group">
                <p class="am_text">
                <?php
                    $content = App\Models\Content::where('slug','contact-us')->first();
                    if(!empty($content)){
                       $contactus = $content->page_content;
                    }else{
                       $contactus = '';
                    }
                ?>  
               <?php  echo $contactus; ?></p>
                </p>
            </div>
            <h4 class="getintouch_heading">Get In Touch</h4>
            @php
            $user = Auth::user();
            // dd($user->email);
            @endphp
            <form method="POST" action="{{ route('contact-form.store') }}" class="contact_form">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                @if($user !="")
                                <input type="text" minlength="3" maxlength="35" name="name" class="custom_input @error('name') is-invalid @enderror"  placeholder="Full Name" value="{{$user->first_name . " " . $user->last_name}}">
                                @else
                                 <input type="text" minlength="3" maxlength="35"  name="name" class="custom_input @error('name') is-invalid @enderror"  placeholder="Full Name" value="">
                                @endif
                                 @error('name')
                                <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                @if($user !="")
                                <input type="email" maxlength="150" name="email" class="custom_input  @error('email') is-invalid @enderror" {{-- value="{{ old('email') }}" --}} placeholder="Email" value="{{$user->email}}">
                                @else
                                <input type="text" maxlength="150" name="email" class="custom_input  @error('email') is-invalid @enderror" {{-- value="{{ old('email') }}" --}} placeholder="Email" value="">
                                @endif
                                @error('email')
                                <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            
                            <div class="col-md-6">
                                <input type="tel"  min="0" minlength="10" maxlength="10" name="phone" class="custom_input @error('phone') is-invalid @enderror" placeholder="Phone*">
                                @error('phone')
                                <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                             
                            <div class="col-md-6">
                                   <input type="text" name="subject" class="custom_input @error('subject') is-invalid @enderror" placeholder="Subject">
                               {{--  <select name="" id="" class="custom_input">
                                    <option value="">Subject</option>
                                    <option value="">Magazine</option>
                                </select> --}}
                                @error('subject')
                                <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                             

                            <div class="col-md-12">
                                <textarea type="text" class="custom_input  @error('message') is-invalid @enderror" rows="4"name="message"
                                    placeholder="Feedback / Suggestion*"></textarea>
                                     @error('message')
                                    <span class="invalid-feedback" role="alert" style="margin-top: -0.75rem;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                           
                            <div class="col-md-12">
                                <button class="contact_submit_btn">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact_right">
                            <h3 class="sidesection_heading">Contact Info</h3>
                            <div class="contact_info_block">
                                <div class="ci_text_img">
                                    <img src="{{ asset('assets/frontend/img/icon-location.png') }}">
                                    <p class="ci_text">
                                        Graphic NewsPlus Team <br>
                                        Graphic Communications Group Ltd.<br>
                                        H/No. 3 Graphic Road - Adabraka<br>
                                        P.O Box GP 742<br>
                                        Accra - Ghana
                                    </p>
                                </div>
                                <div class="ci_text_img">
                                    <img src="{{ asset('assets/frontend/img/icon-phone.png') }}">
                                    <p class="ci_text">
                                        <a href="tel:+233559303481">
                                            +233 55 930 3481
                                        </a>
                                    </p>
                                </div>
                                <div class="ci_text_img">
                                    <img src="{{ asset('assets/frontend/img/icon-mail.png') }}">
                                    <p class="ci_text">
                                        <a href="mailto:support@graphicnewsplus.com">support@graphicnewsplus.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

   {{--  <section class="map_custom">
        <iframe width="100%" height="470" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
            src="https://maps.google.com/maps?width=100%25&amp;height=470&amp;hl=en&amp;q=kawukudi+(DCI%20Magazine)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
    </section> --}}
@endsection
