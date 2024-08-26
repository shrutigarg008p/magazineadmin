@extends('layouts.customer')
@section('title', 'Magazines')

@section('content')
    <!-- breadcrumb -->
    <section class="breadcrumb_group">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb_list"><a href="{{url('customer')}}">Home</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list"><a href="">News</a></li>
                <li class="breadcrumb_list">></li>
                <li class="breadcrumb_list">Politics</li>
            </ul>
        </div>
    </section>
    <!-- /.breadcrumb -->

    <div class="container">
        <div class="row">
            <!-- left side -->
            <div class="col-md-3">
                <div class="sidebar_border">
                    <h2 class="sedebar_heading">Categories</h2>
                    <ul class="sidebar_order">
                        <li class="sidebar_list">
                            <a href="">Business</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Lifestyle</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">News</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Entertainment</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Newspaper</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Home</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Fashion</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Automotive</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Men's Interest</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Men's Magazines</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Celebrity</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Health</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Children</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Women's Interest</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Education</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Computer & Mobile</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Art</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Sports</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Travel</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Technology</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Photography</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Bridal</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="" class="active">Politics</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Property</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Religious & Spiritual</a>
                        </li>
                        <li class="sidebar_list">
                            <a href="">Wedding</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- right side -->
            <div class="col-md-9">
                <div class="sidesection_right">
                    <h3 class="sidesection_heading">Politics</h3>
                    <div class="select_field_group">
                        <select name="" id="" class="publication">
                            <option value="">Select Publication</option>
                            <option value=""> Publication</option>
                        </select>
                        <div class="select_field_right">
                            <select name="" id="" class="publication">
                                <option value="">20 item</option>
                                <option value=""> 40 item</option>
                            </select>
                            <div class="date_pick_icon">
                                <input class="date_pick_right" type="text" id="geburtsdatum" name="geburtsdatum"
                                    placeholder="Search by date" maxlength="" onfocus="loadInputText()"
                                    onClick="this.select(); ">
                            </div>
                        </div>
                    </div>
                    <div class="magazines_with_price">
                        <div class="all_magazines">
                            <div class="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover" lass="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover" lass="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover" lass="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover" lass="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover" lass="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover" lass="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover" lass="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover" lass="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover" lass="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover" lass="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover" lass="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover" lass="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover" lass="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover" lass="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover" lass="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                        <div class="all_magazines">
                            <div class="btn_hover" lass="btn_hover">
                                <img src="{{ asset('assets/frontend/img/n5.jpg') }}" class="img-fluid lazy ">
                                <img src="{{ asset('assets/frontend/img/pdf.png') }}" class="news_pdf_icon">
                            </div>
                            <div class="magazine_name">Graphic Showbiz</div>
                            <div class="magazine_price">$15.00</div>
                            <div class="magazine_with_price_btns">
                                <a href="{{ route('news.show') }}">Read This Now</a>
                                <a class="btn_mwpd" href="#">Read Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="magazine_pagination">
                        <a href="#"><i class="fa fa-chevron-left"></i></a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#"><i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(function() {
            $('#geburtsdatum').datepicker({
                dateFormat: 'dd.mm.yy',
                changeYear: true,
                changeMonth: true,
                showAnim: 'slideDown',
                yearRange: '-120:+0',
            });

            $('#geburtsdatum').on('change', function() {
                const inputValue = $('#geburtsdatum').val();
                // split String of DE Format Date
                const dateParts = inputValue.split('.');
                // re-order dateParts
                const reformatDate = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);
                // Test Parts: console.log(dateParts[2], dateParts[1], dateParts[0]);
                // reformat date to UTC
                const inputValueUTC = Date.parse(reformatDate);
                const maxDate = Date.now();
                //const minDate = Date.now()-120;
                const minDate = new Date();
                minDate.setFullYear(minDate.getFullYear() - 120);

                // now comparing the reformated date with maxDate
                if (inputValueUTC > maxDate) {
                    // alert('Future dates are not allowed')
                    alert('Not Found');
                    $('#geburtsdatum').val('');
                } else if (!validDateFormat(inputValue)) {
                    // alert('Invalid Date Format')
                    alert('Not Found');
                    $('#geburtsdatum').val('');
                } else if (inputValueUTC < minDate) {
                    // date is not allowed to be less than 120 years from now
                    alert('Not Found')
                    $('#geburtsdatum').val('');
                }
            });
        });

        function validDateFormat(input) {
            var regEx = /^(0[1-9]|1\d|2\d|3[01])\.(0[1-9]|1[0-2])\.[12][0-9]{3}$/;
            //var regEx = /^(0[1-9]|1\d|2\d|3[01])\.(0[1-9]|1[0-2])\.(17|18|19|20)\d{2}$/;
            // var regEx = /^(0[1-9]|1\d|2\d|3[01])\.(0[1-9]|1[0-2])\.(19|20)\d{2} $/;


            return input.match(regEx) != null;
        }

        function loadInputText() {
            document.getElementById("geburtsdatum").value = "Search by date";
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/d3js/6.2.0/d3.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- datepicker -->
@endsection
