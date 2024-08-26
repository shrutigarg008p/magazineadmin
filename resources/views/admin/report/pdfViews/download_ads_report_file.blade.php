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
                <div class="table-responsive">
                    <table id="dataTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Ads Clicked</th>
                                <th>Magazines Read</th>
                                <th>Newspaper Read</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($activities as $key => $activity)
                            @php
                                $user = $activity['user'] ?? new \App\Models\User();
                                
                            @endphp
                            @if($user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <div>{{ $user->name }}</div>
                                    </td>
                                    <td>
                                        <div>{{ $user->email }}</div>
                                    </td>
                                    <td>{{ $activity['ads'] }} times</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#clickMagazineModal{{$key}}">
                                            <span class="label label-warning">Magazines</span>
                                            <span class="badge badge-info"> {{ $activity['magazine']['count'] }} </span> 
                                        </button>

                                        

                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#clickNewspaperModal{{$key}}">
                                            <span class="label label-success">Newspaper</span> 
                                            <span class="badge badge-info"> {{ $activity['newspaper']['count'] }} </span>
                                        </button>

                                  </td>
                                </tr>
                                @endif
                            @empty
                            <tr>
                                <th colspan="5">Data not available</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>
    
</body>
</html>





