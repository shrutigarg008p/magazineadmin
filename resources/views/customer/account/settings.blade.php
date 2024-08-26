@extends('layouts.customer')
@section('title', 'Account Setting')

@section('content')
    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Settings</li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb -->

    <!-- my account -->
    <section class="setting_page">
        <div class="container">
            <h3 class="sidesection_heading">Settings</h3>
            <div class="my_pro_group">
                <div class="my_pro_heading">Notification</div>
                <div class="setting_inner">
                    <div class="setting_inner_group">
                        <div class="setting_inner_heading">Allow Notifications </div>
                        <div class="setting_right">
                            <label class="setting_switch">
                                <input class="setting_check" type="checkbox" checked="checked">
                                <span class="setting_slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="setting_inner_group">
                        <div class="setting_inner_heading">Font Size </div>
                        <div class="setting_right">
                            <ul class="font_size_setting">
                                <li><span>XS</span></li>
                                <li><span>S</span></li>
                                <li><span class="active">M</span></li>
                                <li><span>L</span></li>
                                <li><span>XL</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="setting_inner_group b_b_0">
                        <div class="setting_inner_heading">Change Password </div>
                        <div class="setting_right">
                            <button class="setting_change_pass">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my_pro_group">
                <div class="my_pro_heading">Downloads</div>
                <div class="setting_inner">
                    <div class="setting_inner_group">
                        <div class="setting_inner_heading">Allow Downloads On Mobile Data? </div>
                        <div class="setting_right">
                            <label class="setting_switch">
                                <input class="setting_check" type="checkbox" checked="checked">
                                <span class="setting_slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="setting_inner_group b_b_0">
                        <div class="setting_inner_heading">Set Storage Location </div>
                        <div class="setting_right">
                            <button class="setting_set_btn">Set</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my_pro_group">
                <div class="my_pro_heading">Legal</div>
                <div class="setting_inner">
                    <div class="setting_inner_group">
                        <div class="setting_inner_heading">Privacy Policy</div>
                        <div class="setting_right">
                            <button class="setting_set_btn">Read More</button>
                        </div>
                    </div>
                    <div class="setting_inner_group">
                        <div class="setting_inner_heading">Policies and Licenses </div>
                        <div class="setting_right">
                            <button class="setting_set_btn">Read More</button>
                        </div>
                    </div>
                    <div class="setting_inner_group b_b_0">
                        <div class="setting_inner_heading">Courtesies from GDPR and other laws</div>
                        <div class="setting_right">
                            <button class="setting_set_btn">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my_pro_group">
                <div class="my_pro_heading">Preferences</div>
                <div class="my_pro_inner my_pro_inner_checkbox">
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Business
                            <input type="checkbox" checked="checked">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Fashion
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Children
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Travel
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Lifestyle
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Automotive
                            <input type="checkbox" checked="checked">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Women's Interest
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Technology
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">News
                            <input type="checkbox" checked="checked">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Men's Interest
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Education
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Photography
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Entertainment
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Men's Magazines
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Computer & Mobile
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Bridal
                            <input type="checkbox" checked="checked">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Newspaper
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Celebrity
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Art
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Politics
                            <input type="checkbox" checked="checked">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Home
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Health
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Sports
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                    <div class="input_group input_group_checkbox">
                        <label class="checkbox_container">Property
                            <input type="checkbox">
                            <span class="checkbox_checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="subs_pcbtn_group">
                <button class="subs_pay_now_btn">Save</button>
                <button class="subs_cancel_btn">Cancel</button>
            </div>
        </div>
    </section>

    @include('customer.account.partials.footer')
@endsection
