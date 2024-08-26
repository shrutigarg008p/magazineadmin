@extends('layouts.admin')
<!-- @section('title', 'Adds') -->
@section('content')
      <div class="container">
        <div class="dash_tabs">
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'appads')" id="defaultOpen">App Ads</button>
                <button class="tablinks" onclick="openCity(event, 'webads')">Web Ads</button>
            </div>

            <div id="appads" class="tabcontent">
            <form action="{{ route('admin.adds.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="tabcontent_block">
                    <h1 class="ads_common_heading">Preffered Ads</h1>
                    <div class="google_custom_ads">
                        <h2 class="gca_heading">Google Ads</h2>
                        <label class="switch">
                            <input type="checkbox" class="app_goog_checkme" name="app_google" value="Google" >
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="google_custom_ads">
                        <h2 class="gca_heading">Custom Ads</h2>
                        <label class="switch">
                            <input type="checkbox" class="app_custom_checkme" name="app_custom" value="Custom">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <input type="hidden" name="ad_type" id="ad_type" value="">
                </div>
                {{-- google --}}
                <div class="goog  goog_block">
                    <div class="tabcontent_block ">
                        <div class="ads_input_group">
                            <h2 class="gca_heading">Ad ID</h2>
                            <div class="custom_input_input">
                                <input type="text" name="app_ad_id"  id="app_ad_id"  class="custom_input" placeholder="Please Enter">
                            </div>
                        </div>

                        <div class="ads_input_group">
                            <h2 class="gca_heading">Banner ID</h2>
                            <div class="custom_input_input">
                                <input type="text" name="app_banner_id" id="app_banner_id" class="custom_input" placeholder="Please Enter">
                            </div>
                        </div>

                        <div class="ads_input_group">
                            <h2 class="gca_heading">Medium ID </h2>
                            <div class="custom_input_input">
                                <input type="text" name="app_medium_id" id="app_medium_id" class="custom_input" placeholder="Please Enter">
                            </div>
                       </div>

                       <div class="ads_input_group">
                            <h2 class="gca_heading">Full ID</h2>
                            <div class="custom_input_input">
                                <input type="text" name="app_full_id" id="app_full_id" class="custom_input" placeholder="Please select">
                            </div>
                       </div>
                    </div>
                </div>
                <!-- end -->
                <div class="custom  custom_block" >

                    <div class="tabcontent_block">
                        <h1 class="ads_common_heading">Banner Ads</h1>
                        <div class="ads_input_group">
                            <h2 class="gca_heading">Upload Image</h2>
                            <div class="upload_btn_wrapper">
                                Please select
                                <button class="btn_upload">Upload</button>
                                <input type="file" name="app_banner_ad" id="app_banner_ad"/>
                            </div>
                             <div class="col-md-12 mb-2">
                              <img id="preview-image-app-banner" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                  alt="preview image" style="max-height: 250px;">
                          </div>
                            <p class="dmnt_type"><span>Dimensions:</span> 720 px X 100 px</p>
                            <p class="dmnt_type"><span>File type allowed:</span>  jpeg, jpg, png.</p>
                        </div>
                        <div class="ads_input_group">
                            <h2 class="gca_heading">Add Name</h2>
                            <div class="custom_input_input">
                                <input type="text" name="app_banner_ad_name" id="app_banner_ad_name"class="custom_input" placeholder="Please select">
                            </div>
                        </div>
                    </div>
                    <div class="tabcontent_block">
                        <h1 class="ads_common_heading">Medium Ads</h1>
                        <div class="ads_input_group">
                            <h2 class="gca_heading">Upload Image</h2>
                            <div class="upload_btn_wrapper">
                                Please select
                                <button class="btn_upload">Upload</button>
                                <input type="file" name="app_medium_ad" id="app_medium_ad" />
                            </div>
                            <img id="preview-image-app-medium" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                  alt="preview image" style="max-height: 250px;">
                            <p class="dmnt_type"><span>Dimensions:</span> 720 px X 100 px</p>
                            <p class="dmnt_type"><span>File type allowed:</span>  jpeg, jpg, png.</p>
                        </div>
                        <div class="ads_input_group">
                            <h2 class="gca_heading">Add Name</h2>
                            <div class="custom_input_input">
                                <input type="text" name="app_medium_ad_name" id="app_medium_ad_name"  class="custom_input" placeholder="Please select">
                            </div>
                        </div>
                    </div>
                    <div class="tabcontent_block no_border">
                        <h1 class="ads_common_heading">Full Page Ads</h1>
                        <div class="ads_input_group">
                            <h2 class="gca_heading">Upload Image</h2>
                            <div class="upload_btn_wrapper">
                                Please select
                                <button class="btn_upload">Upload</button>
                                <input type="file" name="app_full_ad" id="app_full_ad" />
                            </div>
                            <img id="preview-image-app-full" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                  alt="preview image" style="max-height: 250px;">
                            <p class="dmnt_type"><span>Dimensions:</span> 720 px X 100 px</p>
                            <p class="dmnt_type"><span>File type allowed:</span>  jpeg, jpg, png.</p>
                        </div>
                        <div class="ads_input_group">
                            <h2 class="gca_heading">Add Name</h2>
                            <div class="custom_input_input">
                                <input type="text" name="app_full_ad_name" id="app_full_ad_name"class="custom_input" placeholder="Please select">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="footer_btns" style="display:none">
                        <button class="ads_btn_cancel">Cancel</button>
                        <button class="ads_btn_save">Save</button>
                </div>
            </form>
            </div>

            <div id="webads" class="tabcontent">
            <form action="{{ route('admin.adds.store') }}" enctype="multipart/form-data" method="post">
                 @csrf
                <div class="tabcontent_block">
                    <h1 class="ads_common_heading">Preffered Ads</h1>
                    <div class="google_custom_ads">
                        <h2 class="gca_heading">Google Ads</h2>
                        <label class="switch">
                            <input type="checkbox" class="web_goog_checkme" name="web_google" value="Google">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="google_custom_ads">
                        <h2 class="gca_heading">Custom Ads</h2>
                        <label class="switch">
                            <input type="checkbox" class="web_custom_checkme" name="web_custom" value="Custom">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <input type="hidden" name="web_ad_type" id="web_ad_type" value="">

                </div>
                {{-- google --}}
                <div class="googs  web_goog_block">
                    <div class="tabcontent_block ">
                        <div class="ads_input_group">
                            <h2 class="gca_heading">Ad ID</h2>
                            <div class="custom_input_input">
                                <input type="text" name="web_ad_id"  id="web_ad_id"  class="custom_input" placeholder="Please Enter">
                            </div>
                        </div>

                        <div class="ads_input_group">
                            <h2 class="gca_heading">Banner ID</h2>
                            <div class="custom_input_input">
                                <input type="text" name="web_banner_id" id="web_banner_id" class="custom_input" placeholder="Please Enter">
                            </div>
                        </div>

                        <div class="ads_input_group">
                            <h2 class="gca_heading">Medium ID </h2>
                            <div class="custom_input_input">
                                <input type="text" name="web_medium_id" id="web_medium_id" class="custom_input" placeholder="Please Enter">
                            </div>
                       </div>

                       <div class="ads_input_group">
                            <h2 class="gca_heading">Full ID</h2>
                            <div class="custom_input_input">
                                <input type="text" name="web_full_id" id="web_full_id" class="custom_input" placeholder="Please select">
                            </div>
                       </div>
                    </div>
                </div>
                <!-- end -->
                <div class="customs  web_custom_block">
                    <div class="tabcontent_block">
                        <h1 class="ads_common_heading">Banner Ads</h1>
                        <div class="ads_input_group">
                            <h2 class="gca_heading">Upload Image</h2>
                            <div class="upload_btn_wrapper">
                                Please select
                                <button class="btn_upload">Upload</button>
                                <input type="file" name="web_banner_ad" id="web_banner_ad" />
                            </div>
                            <img id="preview-image-web-banner" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                  alt="preview image" style="max-height: 250px;">
                            <p class="dmnt_type"><span>Dimensions:</span> 720 px X 100 px</p>
                            <p class="dmnt_type"><span>File type allowed:</span>  jpeg, jpg, png.</p>
                        </div>
                        <div class="ads_input_group">
                            <h2 class="gca_heading">Add Name</h2>
                            <div class="custom_input_input">
                                <input type="text" name="web_banner_ad_name"id="web_banner_ad_name" class="custom_input" placeholder="Please select">
                            </div>
                        </div>
                    </div>
                    <div class="tabcontent_block">
                        <h1 class="ads_common_heading">Medium Ads</h1>
                        <div class="ads_input_group">
                            <h2 class="gca_heading">Upload Image</h2>
                            <div class="upload_btn_wrapper">
                                Please select
                                <button class="btn_upload">Upload</button>
                                <input type="file" name="web_medium_ad" id="web_medium_ad"  class="form-control-file @error('web_medium_ad') is-invalid @enderror"
                                    value="{{ old('web_medium_ad') }}" />
                                 @error('web_medium_ad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <img id="preview-image-web-medium" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                  alt="preview image" style="max-height: 250px;">
                            <p class="dmnt_type"><span>Dimensions:</span> 720 px X 100 px</p>
                            <p class="dmnt_type"><span>File type allowed:</span>  jpeg, jpg, png.</p>
                        </div>
                        <div class="ads_input_group">
                            <h2 class="gca_heading">Add Name</h2>
                            <div class="custom_input_input">
                                <input type="text" name="web_medium_ad_name"id="web_medium_ad_name" class="custom_input" placeholder="Please select">
                            </div>
                        </div>
                    </div>
                    <div class="tabcontent_block no_border">
                        <h1 class="ads_common_heading">Full Page Ads</h1>
                        <div class="ads_input_group">
                            <h2 class="gca_heading">Upload Image</h2>
                            <div class="upload_btn_wrapper">
                                Please select
                                <button class="btn_upload">Upload</button>
                                <input type="file" name="web_full_ad" id="web_full_ad" />
                            </div>
                            <img id="preview-image-web-full" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                  alt="preview image" style="max-height: 250px;">
                            <p class="dmnt_type"><span>Dimensions:</span> 720 px X 100 px</p>
                            <p class="dmnt_type"><span>File type allowed:</span>  jpeg, jpg, png.</p>
                        </div>
                        <div class="ads_input_group">
                            <h2 class="gca_heading">Add Name</h2>
                            <div class="custom_input_input">
                                <input type="text" name="web_full_ad_name"id="web_full_ad_name"class="custom_input" placeholder="Please select">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="web_footer_btns" style="display:none">
                    <button class="ads_btn_cancel">Cancel</button>
                    <button class="ads_btn_save">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (e) {
 
   
   $('#app_banner_ad').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-app-banner').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });

   $('#app_medium_ad').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-app-medium').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });

   $('#app_full_ad').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-app-full').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });


   $('#web_banner_ad').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-web-banner').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });

   $('#web_medium_ad').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-web-medium').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });

   $('#web_full_ad').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-web-full').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
</script>
<script type="text/javascript">
    $(".app_goog_checkme").click(function(event) {
        // alert();
            var x = $(this).is(':checked');
            alert(x);
            if (x == true) {
                $('.goog_block').css('display','block');
                $('.footer_btns').css('display' ,'block');
                // $(this).parents(".tabcontent").find('.goog').hide();
            }
            else{
                $('.goog_block').css('display','none');
                $('.footer_btns').css('display' ,'none');

                // $(this).parents(".tabcontent").find('.custom').show();
            }
        });

       $(".app_custom_checkme").click(function(event) {
        alert();
            var x = $(this).is(':checked');
            alert(x);
            if (x == true) {
                $('.custom_block').css('display','block');
                $('.footer_btns').css('display' ,'block');
                // $('.goog').css('display' ,'none');
                // $(this).parents(".tabcontent").find('.goog').hide();
            }
            else{
                $('.custom_block').css('display','none');
                $('.footer_btns').css('display' ,'none');

                // $(this).parents(".tabcontent").find('.custom').show();
            }
        });

        $(".web_goog_checkme").click(function(event) {
           var x = $(this).is(':checked');
            alert(x);
            if (x == true) {
                $('.web_goog_block').css('display','block');
                $('.web_footer_btns').css('display' ,'block');
                // $(this).parents(".tabcontent").find('.goog').hide();
            }
            else{
                $('.web_goog_block').css('display','none');
                $('.web_footer_btns').css('display' ,'none');

                // $(this).parents(".tabcontent").find('.custom').show();
            }
        });
        $(".web_custom_checkme").click(function(event) {
             var x = $(this).is(':checked');
            alert(x);
            if (x == true) {
                $('.web_custom_block').css('display','block');
                $('.web_footer_btns').css('display' ,'block');
                // $('.goog').css('display' ,'none');
                // $(this).parents(".tabcontent").find('.goog').hide();
            }
            else{
                $('.web_custom_block').css('display','none');
                $('.web_footer_btns').css('display' ,'none');

                // $(this).parents(".tabcontent").find('.custom').show();
            }
        });
</script>
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            var ads_type=document.getElementById("ad_type");
              ads_type.value = cityName;

              var webads_type=document.getElementById("web_ad_type");
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


@endsection