@extends('layouts.admin')
<!-- @section('title', 'Ads') -->
@section('content')
    @php
    $web_ad_pages = ['home', 'content_detail', 'blog_detail'];
    @endphp
    <div class="container">
        <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div>
        <div class="dash_tabs">
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'appads')" id="defaultOpen">App Ads</button>
                <button class="tablinks" onclick="openCity(event, 'webads')">Web Ads</button>
            </div>
            <div id="appads" class="tabcontent">
                <form id="form1" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="tabcontent_block">
                        <div id="ads_div">
                            <label>
                                <h5>Ads Show/Off</h5>
                            </label>
                            <input data-id="" class="toggle-class" type="checkbox" data-onstyle="success"
                                data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive"
                                {{ $appgoogle->is_enable ? 'checked' : '' }}>
                        </div>
                        <h1 class="ads_common_heading">Preffered Ads</h1>
                        <div class="row">
                            <div class="col-md-6  border-right">
                                <div class="google_custom_ads App">
                                    <h2 class="gca_heading">Google Ads</h2>
                                    <label class="m_8898_switch">
                                        <input type="radio" name="app_google" id="app_google" value="Google"
                                            {{ $appgoogle->enable_ads ? 'checked' : '' }}>
                                        <span class="m_8898_slider round"></span>
                                    </label>
                                    @if (isset($appgoogle->id))
                                        <input type="hidden" name="gid" value="{{ $appgoogle->id }}">
                                    @else
                                        <input type="hidden" name="gid" value="">
                                    @endif
                                    @if (isset($appcustom->id))
                                        <input type="hidden" name="cid" value="{{ $appcustom->id }}">
                                    @else
                                        <input type="hidden" name="cid" value="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="google_custom_ads App">
                                    <h2 class="gca_heading">Custom Ads</h2>
                                    <label class="m_8898_switch">
                                        {{-- <input type="radio" class="app_custom_checkme" name="app_google" value="Custom"> --}}
                                        <input type="radio" name="app_google" id="app_google" value="Custom"
                                            {{ $appcustom->enable_ads ? 'checked' : '' }}>
                                        <span class="m_8898_slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="Google boxes">
                            <div class="goog  goog_block">
                                <div class="tabcontent_block ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ads_input_group">
                                                <h2 class="gca_heading">Ad ID</h2>
                                                <div class="custom_input_input">
                                                    <?php 
                              if(isset($appgoogle->g_ads_id)){
                              ?>
                                                    <input type="text" name="app_ad_id" id="app_ad_id"
                                                        class="custom_input" placeholder="Please Enter"
                                                        value="{{ $appgoogle->g_ads_id }}">
                                                    {{-- <input type="text" name="app_ad_id" class="form-control @error('app_ad_id') is-invalid @enderror" value="{{ old('app_ad_id') }}"> --}}
                                                    @error('app_ad_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <?php }
                              else{
                              ?>
                                                    <input type="text" name="app_ad_id" id="app_ad_id"
                                                        class="custom_input" placeholder="Please Enter" value="">
                                                    {{-- <input type="text" name="app_ad_id" class="form-control @error('app_ad_id') is-invalid @enderror" value="{{ old('app_ad_id') }}"> --}}
                                                    @error('app_ad_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <?php }
                              ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ads_input_group">
                                                <h2 class="gca_heading">Banner ID Android</h2>
                                                <div class="custom_input_input">
                                                    <?php 
                              if(isset($appgoogle->g_banner_ads)){
                              
                              ?>
                                                    <input type="text" name="app_banner_id" id="app_banner_id"
                                                        class="custom_input" placeholder="Please Enter"
                                                        value="{{ $appgoogle->g_banner_ads }}">
                                                    <?php }
                              else{
                              ?>
                                                    <input type="text" name="app_banner_id" id="app_banner_id"
                                                        class="custom_input" placeholder="Please Enter" value="">
                                                    <?php }
                              ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ads_input_group">
                                                <h2 class="gca_heading">Medium ID Android </h2>
                                                <div class="custom_input_input">
                                                    <?php 
                              if(isset($appgoogle->g_medium_ads)){
                              
                              ?>
                                                    <input type="text" name="app_medium_id" id="app_medium_id"
                                                        class="custom_input" placeholder="Please Enter"
                                                        value="{{ $appgoogle->g_medium_ads }}">
                                                    <?php }
                              else{
                              ?>
                                                    <input type="text" name="app_medium_id" id="app_medium_id"
                                                        class="custom_input" placeholder="Please Enter" value="">
                                                    <?php }
                              ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ads_input_group">
                                                <h2 class="gca_heading">Full ID Android</h2>
                                                <div class="custom_input_input">
                                                    <?php 
                              if(isset($appgoogle->g_full_ads)){
                              
                              ?>
                                                    <input type="text" name="app_full_id" id="app_full_id"
                                                        class="custom_input" placeholder="Please select"
                                                        value="{{ $appgoogle->g_full_ads }}">
                                                    <?php } 
                              else{
                              ?>
                                                    <input type="text" name="app_full_id" id="app_full_id"
                                                        class="custom_input" placeholder="Please select" value="">
                                                    <?php }
                              ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ios --}}

                                    <div class="row">
                                        {{-- <div class="col-md-6"> --}}
                                        {{-- <div class="ads_input_group">
                        <h2 class="gca_heading">Ad ID</h2>
                        <div class="custom_input_input">
                           <?php 
                              if(isset($appgoogle->g_ads_id)){
                              ?>
                           <input type="text" name="app_ad_id"  id="app_ad_id"  class="custom_input" placeholder="Please Enter" value="{{$appgoogle->g_ads_id}}" >
                         
                           @error('app_ad_id')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           <?php }
                              else{
                              ?>
                           <input type="text" name="app_ad_id"  id="app_ad_id"  class="custom_input" placeholder="Please Enter" value="" >
                       
                           @error('app_ad_id')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           <?php }
                              ?>
                        </div>
                     </div> --}}
                                        {{-- </div> --}}
                                        <div class="col-md-6">
                                            <div class="ads_input_group">
                                                <h2 class="gca_heading">Banner ID IOS</h2>
                                                <div class="custom_input_input">
                                                    <?php 
                              if(isset($appgoogle->g_banner_ads_ios)){
                              
                              ?>
                                                    <input type="text" name="app_banner_id_ios" id="app_banner_id_ios"
                                                        class="custom_input" placeholder="Please Enter"
                                                        value="{{ $appgoogle->g_banner_ads_ios }}">
                                                    <?php }
                              else{
                              ?>
                                                    <input type="text" name="app_banner_id_ios" id="app_banner_id_ios"
                                                        class="custom_input" placeholder="Please Enter" value="">
                                                    <?php }
                              ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ads_input_group">
                                                <h2 class="gca_heading">Medium ID IOS</h2>
                                                <div class="custom_input_input">
                                                    <?php 
                              if(isset($appgoogle->g_medium_ads_ios)){
                              
                              ?>
                                                    <input type="text" name="app_medium_id_ios" id="app_medium_id_ios"
                                                        class="custom_input" placeholder="Please Enter"
                                                        value="{{ $appgoogle->g_medium_ads_ios }}">
                                                    <?php }
                              else{
                              ?>
                                                    <input type="text" name="app_medium_id_ios" id="app_medium_id_ios"
                                                        class="custom_input" placeholder="Please Enter" value="">
                                                    <?php }
                              ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ads_input_group">
                                                <h2 class="gca_heading">Full ID IOS</h2>
                                                <div class="custom_input_input">
                                                    <?php 
                              if(isset($appgoogle->g_full_ads_ios)){
                              
                              ?>
                                                    <input type="text" name="app_full_id_ios" id="app_full_id_ios"
                                                        class="custom_input" placeholder="Please select"
                                                        value="{{ $appgoogle->g_full_ads_ios }}">
                                                    <?php } 
                              else{
                              ?>
                                                    <input type="text" name="app_full_id_ios" id="app_full_id_ios"
                                                        class="custom_input" placeholder="Please select" value="">
                                                    <?php }
                              ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    {{--  --}}
                                </div>
                                <div class="footer_btns">
                                    {{-- <button class="ads_btn_cancel">Cancel</button> --}}
                                    <button class="ads_btn_save" id="btn_submit1">Save</button>
                                </div>
                            </div>
                        </div>
                        <div class="Custom boxes">
                            <div class="custom  custom_block">

                                <div class="tabcontent_block">
                                    <h1 class="ads_common_heading">Banner Ads</h1>
                                    <div class="row">
                                        <div class="col-md-6">
                                            @if (isset($appcustom->c_banner_ads))
                                                <div class="form-group">
                                                    <img src="{{ asset("storage/{$appcustom->c_banner_ads}") }}"
                                                        alt="{{ $appcustom->id }}" width="250" height="150">
                                                </div>
                                            @else
                                            @endif
                                            <div class="ads_input_group">
                                                <h2 class="gca_heading">Upload Image</h2>
                                                <div class="upload_btn_wrapper">
                                                    Please select
                                                    <button class="btn_upload">Upload</button>
                                                    <input type="file" name="c_banner_ads" id="app_banner_add"
                                                        class="form-control-file @error('c_banner_ads') is-invalid @enderror"
                                                        value="{{ old('c_banner_ads') }}" />
                                                </div>
                                                <div class="img-error" id="c_banner_ads"></div>
                                                <p class="dmnt_type"><span>Dimensions:</span> 720 px X 100 px</p>
                                                <p class="dmnt_type"><span>File type allowed:</span> jpeg, jpg, png.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-4">
                                            <img id="preview-image-app-banner"
                                                src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                                alt="preview image" style="max-height: 125px; max-width:450px ;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ads_input_group">
                                                <h2 class="gca_heading">Add Name</h2>
                                                <div class="custom_input_input">
                                                    @if (isset($appcustom->c_banner_ads_name))
                                                        <div class="form-group">
                                                            <input type="text" name="app_banner_ad_name"
                                                                id="app_banner_ad_name" class="custom_input"
                                                                placeholder="Please select"
                                                                value="{{ $appcustom->c_banner_ads_name }}">
                                                        </div>
                                                    @else
                                                        <input type="text" name="app_banner_ad_name" id="app_banner_ad_name"
                                                            class="custom_input" placeholder="Please select" value="">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ads_input_group">
                                                <h2 class="gca_heading">Add Url</h2>
                                                <div class="custom_input_input">
                                                    @if (isset($appcustom->banner_ads_url))
                                                        <div class="form-group">
                                                            <input type="text" name="banner_ads_url" id="banner_ads_url"
                                                                class="custom_input" placeholder="Please select"
                                                                value="{{ $appcustom->banner_ads_url }}">
                                                        </div>
                                                    @else
                                                        <input type="text" name="banner_ads_url" id="banner_ads_url"
                                                            class="custom_input" placeholder="Please select" value="">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        @foreach ($web_ad_pages as $web_ad_page)
                                            <label for="banner{{ $web_ad_page }}">
                                                <input type="checkbox" id="banner{{ $web_ad_page }}"
                                                    name="web_page_ad[{{ $web_ad_page }}][banner]" {{ (isset($web_ads_screens[$web_ad_page]) && in_array('banner', $web_ads_screens[$web_ad_page])) ? 'checked':'' }} />
                                                <span>{{ Str::headline($web_ad_page) }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tabcontent_block">
                                    <h1 class="ads_common_heading">Medium Ads</h1>
                                    <div class="row">
                                        <div class="col-md-6">
                                            @if (isset($appcustom->c_medium_ads))
                                                <div class="form-group">
                                                    <img src="{{ asset("storage/{$appcustom->c_medium_ads}") }}"
                                                        alt="{{ $appcustom->id }}" width="250" height="150">
                                                </div>
                                            @else
                                            @endif
                                            <div class="ads_input_group">
                                                <h2 class="gca_heading">Upload Image</h2>
                                                <div class="upload_btn_wrapper">
                                                    Please select
                                                    <button class="btn_upload">Upload</button>
                                                    <input type="file" name="c_medium_ads" id="app_medium_add"
                                                        class="form-control-file @error('c_medium_ads') is-invalid @enderror"
                                                        value="{{ old('c_medium_ads') }}" />
                                                    @error('c_medium_ads')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="img-error" id="c_medium_ads"></div>
                                                <p class="dmnt_type"><span>Dimensions:</span> 720 px X 100 px</p>
                                                <p class="dmnt_type"><span>File type allowed:</span> jpeg, jpg, png.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-4">
                                            <img id="preview-image-app-medium"
                                                src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                                alt="preview image" style="max-height: 125px;max-width:450px ">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ads_input_group">
                                                <h2 class="gca_heading">Add Name</h2>
                                                <div class="custom_input_input">
                                                    @if (isset($appcustom->c_medium_ads_name))
                                                        <div class="form-group">
                                                            <input type="text" name="app_medium_ad_name"
                                                                id="app_medium_ad_name" class="custom_input"
                                                                placeholder="Please select"
                                                                value="{{ $appcustom->c_medium_ads_name }}">
                                                        </div>
                                                    @else
                                                        <input type="text" name="app_medium_ad_name" id="app_medium_ad_name"
                                                            class="custom_input" placeholder="Please select" value="">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ads_input_group">
                                                <h2 class="gca_heading">Add Url</h2>
                                                <div class="custom_input_input">
                                                    @if (isset($appcustom->medium_ads_url))
                                                        <div class="form-group">
                                                            <input type="text" name="medium_ads_url" id="medium_ads_url"
                                                                class="custom_input" placeholder="Please select"
                                                                value="{{ $appcustom->medium_ads_url }}">
                                                        </div>
                                                    @else
                                                        <input type="text" name="medium_ads_url" id="medium_ads_url"
                                                            class="custom_input" placeholder="Please select" value="">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        @foreach ($web_ad_pages as $web_ad_page)
                                            <label for="medium_ad{{ $web_ad_page }}">
                                                <input type="checkbox" id="medium_ad{{ $web_ad_page }}"
                                                    name="web_page_ad[{{ $web_ad_page }}][medium_ad]" {{ (isset($web_ads_screens[$web_ad_page]) && in_array('medium_ad', $web_ads_screens[$web_ad_page])) ? 'checked':'' }}>
                                                <span>{{ Str::headline($web_ad_page) }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tabcontent_block no_border">
                                    <h1 class="ads_common_heading">Full Page Ads</h1>
                                    <div class="row">
                                        <div class="col-md-6">
                                            @if (isset($appcustom->c_full_ads))
                                                <div class="form-group">
                                                    <img src="{{ asset("storage/{$appcustom->c_full_ads}") }}"
                                                        alt="{{ $appcustom->id }}" width="250" height="150">
                                                </div>
                                            @else
                                            @endif
                                            <div class="ads_input_group">
                                                <h2 class="gca_heading">Upload Image</h2>
                                                <div class="upload_btn_wrapper">
                                                    Please select
                                                    <button class="btn_upload">Upload</button>
                                                    <input type="file" name="c_full_ads" id="app_full_add"
                                                        class="form-control-file @error('c_full_ads') is-invalid @enderror"
                                                        value="{{ old('c_full_ads') }}" />
                                                    @error('c_full_ads')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="img-error" id="c_full_ads"></div>
                                                <p class="dmnt_type"><span>Dimensions:</span> 720 px X 100 px</p>
                                                <p class="dmnt_type"><span>File type allowed:</span> jpeg, jpg, png.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-4">
                                            <img id="preview-image-app-full"
                                                src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                                alt="preview image" style="max-height: 125px;max-width:450px ">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ads_input_group">
                                                <h2 class="gca_heading">Add Name</h2>
                                                <div class="custom_input_input">
                                                    @if (isset($appcustom->c_full_ads_name))
                                                        <div class="form-group">
                                                            <input type="text" name="app_full_ad_name" id="app_full_ad_name"
                                                                class="custom_input" placeholder="Please select"
                                                                value="{{ $appcustom->c_full_ads_name }}">
                                                        </div>
                                                    @else
                                                        <input type="text" name="app_full_ad_name" id="app_full_ad_name"
                                                            class="custom_input" placeholder="Please select" value="">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ads_input_group">
                                                <h2 class="gca_heading">Add Url</h2>
                                                <div class="custom_input_input">
                                                    @if (isset($appcustom->full_ads_url))
                                                        <div class="form-group">
                                                            <input type="text" name="full_ads_url" id="full_ads_url"
                                                                class="custom_input" placeholder="Please select"
                                                                value="{{ $appcustom->full_ads_url }}">
                                                        </div>
                                                    @else
                                                        <input type="text" name="full_ads_url" id="full_ads_url"
                                                            class="custom_input" placeholder="Please select" value="">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        @foreach ($web_ad_pages as $web_ad_page)
                                            <label for="full_page{{ $web_ad_page }}">
                                                <input type="checkbox" id="full_page{{ $web_ad_page }}"
                                                    name="web_page_ad[{{ $web_ad_page }}][full_page]" {{ (isset($web_ads_screens[$web_ad_page]) && in_array('full_page', $web_ads_screens[$web_ad_page])) ? 'checked':'' }}>
                                                <span>{{ Str::headline($web_ad_page) }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <input type="hidden" name="ad_type" id="ad_type" value="">
                                <div class="footer_btns mb-2">
                                    {{-- <button class="ads_btn_cancel">Cancel</button> --}}
                                    <button class="ads_btn_save" id="btn_submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="webads" class="tabcontent">
                <form id="form2" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="tabcontent_block">
                        {{-- <h1 class="ads_common_heading">Preffered Ads</h1> --}}
                        <div class="row">
                            <div class="col-md-6  border-right">
                                {{-- <div class="google_custom_ads">
<h2 class="gca_heading">Google Ads</h2>
<label class="m_8898_switch">
<input type="radio" class="web_goog_checkme" name="web_google" value="google">
<span class="m_8898_slider round"></span>
</label>

</div> --}}
                                <?php
   if(isset($webcustom->id)){
   
   ?>
                                <input type="hidden" name="wwid" value="{{ $webcustom->id }}">
                                <?php }   
   else{
   ?>
                                <input type="hidden" name="wwid" value="">
                                <?php }
   ?>
                            </div>
                            {{-- <div class="col-md-6">
<div class="google_custom_ads">
<h2 class="gca_heading">Custom Ads</h2>
<label class="m_8898_switch">
<input type="radio" class="web_custom_checkme" name="web_google" value="custom">
<span class="m_8898_slider round"></span>
</label>
</div>
</div> --}}
                        </div>
                        {{-- <div class="google box"> --}}
                        {{-- <div class="goog  goog_block"> --}}
                        <div class="tabcontent_block ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="ads_input_group">
                                        <h2 class="gca_heading">Adsense ID</h2>
                                        <div class="custom_input_input">
                                            @if ($webcustom->g_ads_id)
                                                <input type="text" name="web_ad_id" id="web_ad_id" class="custom_input"
                                                    placeholder="Please Enter" value="{{ $webcustom->g_ads_id }}">
                                                {{-- @else --}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            </div>
                        </div>
                        <div class="footer_btns">
                            {{-- <button class="ads_btn_cancel">Cancel</button> --}}
                            <button class="ads_btn_save" id="btn_submit21">Save</button>
                        </div>
                        <input type="hidden" name="web_ad_type" id="web_ad_type" value="">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e) {

            $('.App input[type="radio"]').click(function() {
                var inputValueAppAd = $(this).attr("value");
                var targetBoxApp = $("." + inputValueAppAd);
                $(".boxes").not(targetBoxApp).hide();
                $(targetBoxApp).show();
            });

            $('input[type="radio"]').click(function() {
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });

            $('#app_banner_add').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-app-banner').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

            $('#app_medium_add').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-app-medium').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

            $('#app_full_add').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-app-full').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });


            $('#web_banner_add').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-web-banner').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

            $('#web_medium_add').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-web-medium').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

            $('#web_full_add').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-web-full').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>
    <script>
        function openCity(evt, cityName) {
            // alert(cityName);
            var i, tabcontent, tablinks;
            var ads_type = document.getElementById("ad_type");
            ads_type.value = cityName;

            var webads_type = document.getElementById("web_ad_type");
            webads_type.value = cityName;

            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#btn_submit").click(function(e) {

                e.preventDefault();

                let formData = new FormData(document.getElementById('form1'));

                $.ajax({
                    url: "{{ route('admin.ads.store') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // alert(response);
                        window.location = '{{ route('admin.ads.index') }}';
                    },
                    error: function(response) {
                        console.log(response);
                        $('#c_banner_ads').text(response.responseJSON.errors.c_banner_ads);
                        $('#c_medium_ads').text(response.responseJSON.errors.c_medium_ads);
                        $('#c_full_ads').text(response.responseJSON.errors.c_full_ads);
                    }
                });

            });



            $("#btn_submit1").click(function(e) {

                e.preventDefault();

                let formData = new FormData(document.getElementById('form1'));
                console.log(formData);

                var ids = $('#gid').val();
                // alert(ids);
                // debugger;

                $.ajax({
                    url: "{{ route('admin.ads.store') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        window.location = '{{ route('admin.ads.index') }}';
                    },
                    error: function(response) {
                        console.log(response);
                        $('#app_banner_ad').text(response.responseJSON.errors.app_banner_ad);
                        $('#app_medium_ad').text(response.responseJSON.errors.app_medium_ad);
                        $('#app_full_ad').text(response.responseJSON.errors.app_full_ad);
                    }
                });

            });

            $("#btn_submit2").click(function(e) {

                e.preventDefault();

                let formData = new FormData(document.getElementById('form2'));
                console.log(formData);

                // var _token = $("input[name='_token']").val();
                // var app_ad_id = $("input[name='app_ad_id']").val();
                // var app_banner_id = $("input[name='app_banner_id']").val();
                // var app_medium_id = $("input[name='app_medium_id']").val();
                // var app_full_id = $("input[name='app_full_id']").val();
                // var app_banner_ad =$("input[name='app_banner_ad']").val();
                // var app_medium_ad =$("input[name='app_medium_ad']").val();
                // var app_full_ad =$("input[name='app_full_ad']").val();
                // var app_banner_ad_name =$("input[name='app_banner_ad_name']").val();
                // var app_medium_ad_name =$("input[name='app_medium_ad_name']").val();
                // var app_full_ad_name =$("input[name='app_full_ad_name']").val();


                $.ajax({
                    url: "{{ route('admin.ads.store') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // alert(response);
                        window.location = '{{ route('admin.ads.index') }}';
                    },
                    error: function(response) {
                        console.log(response);
                        $('#c_banner_ads_1').text(response.responseJSON.errors.c_banner_ads);
                        $('#c_medium_ads_2').text(response.responseJSON.errors.c_medium_ads);
                        $('#c_full_ads_3').text(response.responseJSON.errors.c_full_ads);
                    }
                });

            });

            $("#btn_submit21").click(function(e) {

                e.preventDefault();

                let formData = new FormData(document.getElementById('form2'));
                console.log(formData);

                // var _token = $("input[name='_token']").val();
                // var app_ad_id = $("input[name='app_ad_id']").val();
                // var app_banner_id = $("input[name='app_banner_id']").val();
                // var app_medium_id = $("input[name='app_medium_id']").val();
                // var app_full_id = $("input[name='app_full_id']").val();
                // var app_banner_ad =$("input[name='app_banner_ad']").val();
                // var app_medium_ad =$("input[name='app_medium_ad']").val();
                // var app_full_ad =$("input[name='app_full_ad']").val();
                // var app_banner_ad_name =$("input[name='app_banner_ad_name']").val();
                // var app_medium_ad_name =$("input[name='app_medium_ad_name']").val();
                // var app_full_ad_name =$("input[name='app_full_ad_name']").val();


                $.ajax({
                    url: "{{ route('admin.ads.store') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // alert(response);
                        window.location = '{{ route('admin.ads.index') }}';
                    },
                    error: function(response) {
                        console.log(response);
                        $('#web_banner_ad').text(response.responseJSON.errors.web_banner_ad);
                        $('#web_medium_ad').text(response.responseJSON.errors.web_medium_ad);
                        $('#web_full_ad').text(response.responseJSON.errors.web_full_ad);
                    }
                });

            });
            // function printErrorMsg (msg) {
            //     $(".print-error-msg").find("ul").html('');
            //     $(".print-error-msg").css('display','block');
            //     $.each( msg, function( key, value ) {
            //         $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            //     });
            // }
        });
    </script>
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                // alert();
                var status = $(this).prop('checked') == true ? 1 : 0;
                // alert(status); 

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ url('admin/changeShowStatus') }}',
                    data: {
                        'status': status
                    },
                    success: function(data) {
                        // console.log(data.success);
                        // toastr.success(data.message);
                        //  window.location.reload();
                        toastr.options.timeOut = 5000;
                        toastr.options.positionClass = 'toast-top-right';
                        toastr.success(data.message);
                        window.location.reload();
                        // setTimeout(function() {
                        // $('#alert').fadeOut('fast');
                        //     }, 3000);
                    }
                });


            })
        })
    </script>
@endsection
