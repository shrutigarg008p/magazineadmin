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
                                    <th>Price</th>
                                    <th>Uploaded By</th>
                                    <th>Is Free</th>
                                    <th>Category</th>
                                    <th>Publication</th>
                                    <th>Copyright Owner</th>
                                    <th>Edition Number</th>
                                    <th>Publication Date</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collection as $item)
                                @php
                                    $price = $item->type == 'newspaper'
                                        ? $item->publication->newspaper_price_ghs
                                        : $item->price;
                                @endphp
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $price }}</td>
                                        <td>{{ $item->vendor->email }}</td>
                                        <td>{{ ($item->is_free)?'Yes':'No' }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->publication->name }}</td>
                                        <td>{{ $item->copyright_owner }}</td>
                                        <td>{{ $item->edition_number }}</td>
                                        <td>{{ $item->published_date->format('Y/m/d') }}</td>
                                        <td>{{ $item->created_at->format('Y/m/d') }}</td>

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
