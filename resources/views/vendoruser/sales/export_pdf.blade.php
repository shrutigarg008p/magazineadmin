<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directly sold items <{{Auth::user() ? Auth::user()->email : '-'}}></title>
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
            <h2>Directly sold items <{{Auth::user() ? Auth::user()->email : '-'}}></h2>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="dataTable" class="display table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Unit Sold</th>
                                    <th>Publication</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collection as $p_content)
                                    <tr>
                                        <td>{{ $p_content->id }}</td>
                                        <td>{{ $p_content->type  }}</td>
                                        <td>{{ $p_content->title }}</td>
                                        <td>{{ $p_content->price }}</td>
                                        <td>{{ $p_content->category->name }}</td>
                                        <td>{{ $p_content->users_who_bought_count }}</td>
                                        <td>{{ $p_content->publication->name }}</td>
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
