<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ucwords($content_type)}} Listing</title>
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
            <h2>{{ucwords($content_type)}} Listing</h2>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="dataTable" class="display table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th>Discount</th>
                                    <th>Used Times</th>
                                    <th>Valid For</th>
                                    <th>User Id</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collection as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->discount }}</td>
                                        <td>{{ $item->used_times }}</td>
                                        <td>{{ $item->valid_for }}</td>
                                        <td>{{ $item->user_id }}</td>
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
