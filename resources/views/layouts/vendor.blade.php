<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ config('app.name', 'Graphic Newsplus') }}</title>
    <link rel="resource" type="application/l10n" href="{{URL::asset('pdf/web/locale/locale.properties')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Favicon  -->
    <link href="{{ asset('favicon-mag.png') }}" rel="icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- jQuery Datatable Style -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/jquery.dataTables.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/adminlte.min.css') }}">
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/custom/vendor.css') }}">
    <!-- Pdf Css -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/pdf-turn.css') }}">

    @include('layouts._css')

    <style type="text/css">
      button.btn.btn-danger.mag-delete {
        margin-left: 5px;
    }
      .layout-fixed .main-sidebar {
      background: #212121;
      font-family: 'Poppins', sans-serif !important;
      }
      .layout-fixed .wrapper .sidebar {
      padding: 0;}
      [class*=sidebar-dark] .brand-link, [class*=sidebar-dark] .brand-link .pushmenu {
      color: #fff;
      }
      [class*=sidebar-dark-] .sidebar .nav-item a {
      color: #fff;
      font-weight: 500;
      font-size: 16px;
      width: 100% !important;
      padding: 24px;
      border-radius: 0;
      margin: 0 !important;
      border-bottom: 1px solid #666666;
      }
      .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
      background: rgb(255 255 255 / 10%);
      box-shadow: none;
      }
      [class*=sidebar-dark-] .sidebar a i {
      width: 28px !important;
      text-align: left !important;
      }
      [class*=sidebar-dark] .brand-link, [class*=sidebar-dark] .user-panel {
      border-bottom: 1px solid #fff;
      }
      [class*=sidebar-dark] .brand-link span.brand-text {
      font-size: 16px;
      }
      .bg-info {
      background: #ca0a0a!important;
      }
      .box{
      color: ##ffffff;
      padding: 20px;
      display: none;
      margin-top: 20px;
      }
      .pdf{ background: #ffffff; }
      .epub{ background: #ffffff; }
      .xml{ background: #ffffff; }
      label{ margin-right: 15px; }
      input.parsley-success,
      select.parsley-success,
      textarea.parsley-success {
      /*color: #468847;*/
      /*background-color: #DFF0D8;*/
      /*border: 1px solid #D6E9C6;*/
      }
      input.parsley-error,
      select.parsley-error,
      textarea.parsley-error {
      /*  color: #dc3545;
      background-color: #F2DEDE;
      border: 1px solid #EED3D7;*/
      }
      .parsley-errors-list {
      margin: 2px 0 3px;
      padding: 0;
      list-style-type: none;
      font-size: 0.9em;
      line-height: 0.9em;
      opacity: 0;
      color: #dc3545;
      transition: all .3s ease-in;
      -o-transition: all .3s ease-in;
      -moz-transition: all .3s ease-in;
      -webkit-transition: all .3s ease-in;
      }
      .parsley-errors-list.filled {
      opacity: 1;
      }
      /*for epub style*/
      body {
      margin: 0;
      background: #fafafa;
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      color: #333;
      }
      #navigation {
      width: 300px;
      position: absolute;
      overflow: auto;
      top: 60px;
      left: 1000px
      }
      #navigation.fixed {
      position: fixed;
      }
      #navigation h1 {
      width: 200px;
      font-size: 16px;
      font-weight: normal;
      color: #777;
      margin-bottom: 10px;
      }
      #navigation h2 {
      font-size: 14px;
      font-weight: normal;
      color: #B0B0B0;
      margin-bottom: 20px;
      }
      #navigation ul {
      padding-left: 18px;
      margin-left: 0;
      margin-top: 12px;
      margin-bottom: 12px;
      }
      #navigation ul li {
      list-style: decimal;
      margin-bottom: 10px;
      color: #cccddd;
      font-size: 12px;
      padding-left: 0;
      margin-left: 0;
      }
      #navigation ul li a {
      color: #ccc;
      text-decoration: none;
      }
      #navigation ul li a:hover {
      color: #777;
      text-decoration: underline;
      }
      #navigation ul li a.active {
      color: #000;
      }
      #viewer {
      overflow: hidden;
      width: 800px;
      margin: 402px 12px 12px 582px;
      /*background: url('ajax-loader.gif') center center no-repeat;*/
      }
      #viewer .epub-view {
      background: white;
      box-shadow: 0 0 4px #ccc;
      /*margin: 10px;*/
      /*padding: 40px 80px;*/
      }
      #main {
      position: absolute;
      top: 50px;
      left: 50px;
      width: 800px;
      z-index: 2;
      transition: left .15s cubic-bezier(.55, 0, .2, .8) .08s;
      }
      #main.open {
      left: 0;
      }
      #pagination {
      text-align: center;
      margin-left: 80px;
      /*padding: 0 50px;*/
      }
      .arrow {
      margin: 14px;
      display: inline-block;
      text-align: center;
      text-decoration: none;
      color: #ccc;
      }
      .arrow:hover {
      color: #777;
      }
      .arrow:active {
      color: #000;
      }
      #prev {
      float: left;
      }
      #next {
      float: right;
      }
      #toc {
      /*display: block;*/
      display: none;
      margin: 10px auto;
      }
      /*end*/  
    </style>
    @yield('styles')
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      @section('navbar')
      @include('layouts.partials.vendor.navbar')
      @show
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      @section('sidebar')
        @if (Auth::user()->isSuperAdmin())
          @include('layouts.partials.admin.main_sidebar')
        @else
          @include('layouts.partials.vendor.main_sidebar')
        @endif
      @show
      <!-- /.main sidebar -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">
                  @section('pageheading')
                  Dashboard
                  @show
                </h1>
              </div>
              <!-- /.col -->
              {{-- 
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
              </div>
              <!-- /.col --> --}}
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
          @yield('content')
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      @section('footer')
      @include('layouts.partials.vendor.footer')
      @show
      @section('footer_sidebar')
      @include('layouts.partials.vendor.footer_sidebar')
      @show
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    {{-- PDF Flip --}}
    <script src="{{ URL::asset('pdf/build/pdf.js') }}"></script>
    <script src="{{ URL::asset('pdf/web/viewer.js') }}"></script>
    {{-- <script src="{{ URL::asset('pdf/web/jquery-3.4.1.min.js') }}"></script> --}}
    <script src="{{ URL::asset('pdf/web/turn.min.js') }}"></script>
    <script src="{{ URL::asset('js/pdf-turn.js') }}"></script>
    <script src="{{ URL::asset('pdf/web/debugger.js') }}"></script>
    <script src="{{ URL::asset('pdf/build/pdf.worker.js') }}"></script>
    {{-- end --}}
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <!-- Sweet Alert 2 -->
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/backend/js/adminlte.min.js') }}"></script>
    <!-- Magazine Validation-->
    <script src="{{ URL::asset('js/magazinevalidation.js') }}"></script>
    <!-- Newspaper Validation-->
    <script src="{{ URL::asset('js/newspapervalidation.js') }}"></script>
    <!-- Epub viewer custom js -->
    <script src="{{ URL::asset('js/epubviewer.js') }}"></script>
    <!-- Parsley -->
    <script src="https://cdn.tutorialjinni.com/parsley.js/2.9.2/parsley.js"></script>
    <!-- Epub Viewer -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/epubjs/dist/epub.min.js"></script>
    <script>
      $(document).ready(function() {
          var Toaster = Swal.mixin({
              toast: true,
              position: 'top',
              showConfirmButton: false,
              timer: 5000,
              timerProgressBar: true,
              didOpen: function(toast) {
                  toast.addEventListener('mouseenter', Swal.stopTimer);
                  toast.addEventListener('mouseleave', Swal.resumeTimer);
                  toast.addEventListener('click', Swal.close);
              }
          });
      
          @if (Session::has('success'))
              Toaster.fire({
              icon: 'success',
              title: "{{ Session::pull('success') }}"
              });
          @elseif( Session::has('error') )
              Toaster.fire({
              icon: 'error',
              title: "{{ Session::pull('error') }}"
              });
          @elseif( Session::has('info') )
              Toaster.fire({
              icon: 'info',
              title: "{{ Session::pull('info') }}"
              });
          @endif
      
      });
    </script>
    @yield('scripts')

    @include('layouts._js')
    
  </body>
</html>