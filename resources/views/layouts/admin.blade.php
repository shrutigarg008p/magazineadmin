<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'Graphic Newsplus') }}</title>
    <!-- Google Font: Source Sans Pro -->
    {{-- 
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    --}}
    <!-- Favicon  -->
    <link href="{{ asset('favicon-mag.png') }}" rel="icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- jQuery Datatable Style -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/jquery.dataTables.min.css') }}"> <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/custom/admin.css') }}">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">    

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.0/css/buttons.dataTables.min.css" type="text/css"  />


    @include('layouts._css')
   
    <style>
      .visible {
      /*  height: 3em;
        width: 10em;*/
        /*background: yellow;*/
      }
      .box{
      color: ##ffffff;
      padding: 20px;
      display: none;
      margin-top: 20px;
      }
      .googleads{ background: #ffffff; }
      .customads{ background: #ffffff; }
      .boxes{
      color: ##ffffff;
      padding: 20px;
      display: none;
      margin-top: 20px;
      }
      .app{ background: #ffffff; }
      .web{ background: #ffffff; }
      label{ margin-right: 15px; }
      .boxess{
      color: ##ffffff;
      padding: 20px;
      display: none;
      margin-top: 20px;
      }
      .app_banner{ background: #ffffff; }
      .app_small{ background: #ffffff; }
      .web_banner{ background: #ffffff; }
      .web_small{ background: #ffffff; }
      /*     .boxesss{
      color: ##ffffff;
      padding: 20px;
      display: none;
      margin-top: 20px;
      }
      .web_banner{ background: #ffffff; }
      .web_small{ background: #ffffff; }
      */
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
      body {
      font-family: "Nunito", Arial, Helvetica, sans-serif;
      }
    </style>
    @yield('styles')
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      @section('navbar')
      @include('layouts.partials.admin.navbar')
      @show
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      @section('sidebar')
      @include('layouts.partials.admin.main_sidebar')
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
                </h3>
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
      @include('layouts.partials.admin.footer')
      @show
      @section('footer_sidebar')
      @include('layouts.partials.admin.footer_sidebar')
      @show
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <!-- Sweet Alert 2 -->
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/backend/js/adminlte.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script> --}}
    <!-- Parsley -->
    <script src="https://cdn.tutorialjinni.com/parsley.js/2.9.2/parsley.js"></script>
     <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


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
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    @include('layouts._js')

    @include('common.keep_token_alive')
  </body>
</html>