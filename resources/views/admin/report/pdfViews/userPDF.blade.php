<?php 
ini_set("pcre.backtrack_limit", "500000000");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphic {{isset($content->title)?'- '.$content->title:''}}</title>
</head>
<body>
    <section class="about_magazine">
        <div class="container">
            <h1>Total users - {{$users->count()}}</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="dataTable" class="display table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Varified</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <th>status</th>
                                    @if ($type=='user')
                                        <th>Refer Code</th>
                                    @endif
                                    <th>Joined At</th>
                                    @if ($type=='vendor')
                                        <th>Vendor Status</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->count())
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div>{{ $user->first_name }}</div>
                                            </td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->verified==1)
                                                    <div class="badge badge-success">
                                                        Yes
                                                    </div>
                                                @else
                                                    <div class="badge badge-secondary">
                                                        No
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->country }}</td>
                                            <td>{{ $user->dob }}</td>
                                            <td>{{ $user->gender }}</td>
                                            <td>
                                                @if ($user->status==1)
                                                    <div class="badge badge-success">
                                                        Activated
                                                    </div>
                                                @else
                                                    <div class="badge badge-secondary">
                                                        De-activated
                                                    </div>
                                                @endif
                                            </td>
                                            @if ($type=='user')
                                                <td>{{ $user->refer_code }}</td>
                                            @endif
                                            <td>{{ $user->created_at }}</td>
                                            @if ($type=='vendor')
                                                <td>
                                                    @if ($user->vendor_verified==1)
                                                        <div class="badge badge-success">
                                                            Verified
                                                        </div>
                                                        @if($user->isVendorVerified()==1)
                                                            <div class="badge badge-success">
                                                                Approved
                                                            </div>
                                                        @else
                                                            <div class="badge badge-secondary">
                                                                Dis-Approved
                                                            </div>
                                                        @endif
                                                    @else
                                                        <div class="badge badge-secondary">
                                                            Not-Verified
                                                        </div>
                                                    @endif
                                                </td>
                                            @endif
                                            
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>





