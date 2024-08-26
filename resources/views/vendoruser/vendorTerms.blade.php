<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vendor Registration - Graphic Newsplus</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/adminlte.min.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="login-logo col-12">
                <a href="{{ route('vendor.index') }}">Graphic Newsplus VENDOR Terms</a>
            </div>
            <!-- /.login-logo -->
            <div class="card col-12">
                <div class="card-body">
                    <div class="text-center">
                        @if(isset($content->page_content))
                            @php echo $content->page_content; @endphp
                        @endif
                        <p>
                            <a onclick="window.history.back()" class="btn btn-sm btn-danger">Go Back</a>
                        </p>
                    </div>
                
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
    
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets//js/adminlte.min.js') }}"></script>
</body>

</html>
