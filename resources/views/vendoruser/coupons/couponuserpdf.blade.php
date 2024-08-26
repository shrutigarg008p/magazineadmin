<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coupon {{ucwords($coupon_code)}} used by</title>
    <style>
        h2, table, th, td {
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        } table, th, td {
            border: 1px solid #c9c9c9;
            border-collapse: collapse;
        } th,td {
            padding: 6px;
            text-align: center;
        }
    </style>
</head>

<body>
    <section class="about_magazine">
        <div class="container">
            <h2>Coupon {{ucwords($coupon_code)}} used by</h2>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="dataTable" class="display table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collection as $item)
                                    <tr>
                                        <td>{{ $item->user_id }}</td>
                                        <td>{{ $item->first_name.' '.$item->last_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                         {{ ($item->verified == 1)?'Verified':'Not Verified' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
