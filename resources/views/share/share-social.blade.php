<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Share Social Media Button</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
    <style type="text/css">
        li{
            list-style: none;
            background: #e2e2e2;
            margin-left: 5px;
            text-align: center;
            border-radius:5px;
        }
        li span{
            font-size: 20px;
        }
        ul li{
            display: inline-block;
            padding: 10px 10px 5px;
        }
        #social-links{
            float: left;
        }
        a.social-button {
            color: #000;
        }
    </style>
</head>
<body style="background: #8ab4e8;">
    <div class="row mt-5">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header bg-success text-white">
                    {{-- <h5>Laravel 8 Share Social Media Button</h5> --}}
                </div>
                <div class="card-body">
                    <strong class="float-left pt-2">Social Media : </strong>
                    {!! $socialShare !!}
                </div>
            </div>
        </div>
    </div>
</body>
</html>