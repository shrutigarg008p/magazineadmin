<?php 
ini_set("pcre.backtrack_limit", "500000000");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Downloads Report</title>
</head>
<body>
    <section class="about_magazine">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if($type=="main")
                        <div class="table-responsive">
                            <table id="dataTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>For</th>
                                <th>Paid Amount</th>
                                <th>Refunded Amount</th>
                                <th>Status</th>
                                <th>Created At</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($refunds as $refund)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $refund->user->first_name ??null }}<br/>
                                    {{ $refund->user->email ??null }}</td>
                                    <td>{{ $refund->entity_str }}</td>
                                    <td>{{ $refund->paid_amount }}</td>
                                    <td>{{ $refund->refund_amount }}</td>
                                    <td>{{ $refund->status_str }}</td>
                                    <td>{{ $refund->created_at->format('Y-m-d H:i') }}</td>
                                   
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                        </div>
                    @else
                    
                        <div class="table-responsive">
                            <table id="dataTable" class="display table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Publisher</th>
                                        <th>Copyright Owner</th>
                                        <th>Price</th>
                                        <th>Published Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users->count())
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div>{{ $user->title }}</div>
                                                </td>
                                                <td>{{ $user->category->name }}</td>
                                                <td>{{ $user->publication->name }}</td>
                                                <td>{{ $user->copyright_owner }}</td>
                                                <td>{{ $user->price }}</td>
                                                <td>{{ date('Y-m-d',strtotime($user->published_date)) }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>





