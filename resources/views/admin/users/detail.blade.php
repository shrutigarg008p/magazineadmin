@extends('layouts.admin')
@section('title', 'Users')
@section('pageheading')
    Users: {{ $user->email }}
@endsection

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card-no-bg my-1">
                    <div class="card-body">
                        <h4 class="card-title w-100 text-bold mb-2">
                            #{{ $user->id }}
                            {{ $user->first_name . ' ' . $user->last_name }}
                            @if ($user->verified)
                                <i class="fas fa-check-circle text-success"></i>
                                <small>Verified</small>
                            @else
                                <i class="fas fa-times-circle text-danger"></i>
                                <small>Not Verified</small>
                            @endif
                        </h4>
                        <h6 class="card-subtitle text-muted">{{ $user->email }}</h6>
                    </div>
                </div>
                <div class="card-no-bg my-1">
                    <div class="card-body">
                        <h4 class="card-title w-100 text-bold mb-2">Phone</h4>
                        <h6 class="card-subtitle">{{ $user->phone }}</h6>
                    </div>
                </div>
                <div class="card-no-bg my-1">
                    <div class="card-body">
                        <h4 class="card-title w-100 text-bold mb-2">Role</h4>
                        <h6 class="card-subtitle">{{ \ucwords($user->role_name) }}</h6>
                    </div>
                </div>
                <div class="card-no-bg my-1">
                    <div class="card-body">
                        <h4 class="card-title w-100 text-bold mb-2">Heard From</h4>
                        <h6 class="card-subtitle">{{ \ucwords($user->referred_from ?? 'Not provided') }}</h6>
                    </div>
                </div>

                <div class="card-no-bg my-1">
                    <div class="card-body">
                        <h4 class="card-title w-100 text-bold mb-2">Subscriptions</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Plan</th>
                                    <th scope="col">Plan Type</th>
                                    <th scope="col">Plan Duration</th>
                                    <th scope="col">Is Family</th>
                                    <th scope="col">Referral Code</th>
                                    <th scope="col">Subscribed At</th>
                                    <th scope="col">Expires At</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Via Referral</th>
                                    <th scope="col">Cancel Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscriptions as $subscription)
                                @php
                                    $duration = $subscription->duration ?? [];
                                @endphp
                                <tr>
                                    <td>{{ $subscription->value }}</td>
                                    <td>{{ $subscription->type }}</td>
                                    <td>{{ $duration['value'] ?? '-' }}</td>
                                    <td>{{ $subscription->family ? 'Yes':'No' }}</td>
                                    <td>{{ $subscription->referral_code }}</td>
                                    <td>{{ $subscription->subscribed }}</td>
                                    <td>{{ $subscription->expired }}</td>
                                    <td>{{ $subscription->payment_method }}</td>
                                    <td>{{ $subscription->via_referral }}</td>
                                    <td>{{ $subscription->cancel_status ?? '-' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-no-bg my-1">
                    <div class="card-body">
                        <h4 class="card-title w-100 text-bold mb-2">Bought Magazines</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Publication</th>
                                    <th scope="col">Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->bought_magazines as $bought_magazine)
                                <tr>
                                    <td>{{ $bought_magazine->id }}</td>
                                    <td>{{ $bought_magazine->title }}</td>
                                    <td>{{ $bought_magazine->publication->name }}</td>
                                    <td>{{ $bought_magazine->category->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-no-bg my-1">
                    <div class="card-body">
                        <h4 class="card-title w-100 text-bold mb-2">Bought Newspapers</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Publication</th>
                                    <th scope="col">Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->bought_newspapers as $bought_newspaper)
                                <tr>
                                    <td>{{ $bought_newspaper->id }}</td>
                                    <td>{{ $bought_newspaper->title }}</td>
                                    <td>{{ $bought_newspaper->publication->name }}</td>
                                    <td>{{ $bought_newspaper->category->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
