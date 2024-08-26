<?php 
ini_set("pcre.backtrack_limit", "500000000");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Downloads Subscription Report</title>
</head>
<body>
    <section class="about_magazine">
        <div class="container">
            <div class="row">
                <h2 style="text-align: center">  Subscription Report  </h2>
                <div class="col-lg-12">
                    @if($type=="main")
                        <div class="table-responsive">
                            <table id="dataTable" class="display table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>No.Of Publictions</th>
                                        <th>No.Of Subscriptions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data->count())
                                        @foreach ($data as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div>{{ $user->title }}</div>
                                                </td>
                                                <td>{{ $user->type }}</td>
                                                <td>{{ ($user->status != 0)?"Active":"De-active" }}</td>
                                                <td style="text-align: center">
                                                    {{$user->publications()->count()}}
                                                </td>
                                                <td style="text-align: center">{{ $user->getUserSubscriptions()->where('pay_status',1)->count() }}</td>
                                                
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    @else
                    
                        <div class="table-responsive">
                            <table id="dataTable" class="display table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Phone</th>
                                        <th>Plan Price</th>
                                        <th>Start Date</th>
                                        <th>Expire Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data->count())
                                        @foreach ($data as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td style="text-align: center">
                                                    <div>{{ $user->user->name ?? null }}</div>
                                                </td>
                                                 <td style="text-align: center">
                                                    <div>{{ $user->user->email ?? null }}</div>
                                                </td>
                                                <td style="text-align: center">
                                                    <div>{{ $user->user->phone ?? null }}</div>
                                                </td>
                                                <td>{{ $user->purchased_at }} {{$user->user->my_currency ?? 'GHS'}}</td>
                                                <td>{{ $user->subscribed_at }}</td>
                                                <td>{{ $user->expires_at }}</td>
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





