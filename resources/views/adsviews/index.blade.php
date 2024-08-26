@extends('layouts.admin')
@section('title', 'Ads')
@section('pageheading')
    Manage Ads
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="flex">
                    <a href="{{ route('admin.ads.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="dataTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ads Type</th>
                                <th>Preffered Type</th>
                                <th>Custom Banner</th>
                                <th>Custom Banner Name</th>
                                <th>Custom Medium </th>
                                <th>Custom Medium Name</th>
                                <th>Custom Full </th>
                                <th>Custom Full Name</th>
                                <th>Google Ad Id</th>
                                <th>Google Banner ID</th>
                                <th>Google Medium ID</th>
                                <th>Google Full ID</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                                @foreach ($ads as $adsData)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $adsData->ads_type }}</td>
                                        <td>{{ $adsData->preffered_type }}</td>
                                        <td>
                                            @if($adsData->c_banner_ads)
                                            <img src="{{ asset("storage/{$adsData->c_banner_ads}") }}"
                                                alt="{{ $adsData->id }}" width="80" height="50">
                                            @else
                                            
                                            @endif    
                                        </td>
                                        <td>{{ $adsData->c_banner_ads_name }}</td>
                                        <td>
                                            @if($adsData->c_medium_ads)
                                            <img src="{{ asset("storage/{$adsData->c_medium_ads}") }}"
                                                alt="{{ $adsData->id }}" width="80" height="50">
                                            @else
                                            @endif
                                        </td>
                                        <td>{{ $adsData->c_medium_ads_name }}</td>
                                        <td>
                                            @if($adsData->c_full_ads)
                                            <img src="{{ asset("storage/{$adsData->c_full_ads}") }}"
                                                alt="{{ $adsData->id }}" width="80" height="50">
                                            @else
                                            @endif
                                        </td>
                                        <td>{{ $adsData->c_full_ads_name }}</td>
                                        <td>{{ $adsData->g_ads_id }}</td>
                                        <td>{{ $adsData->g_banner_ads }}</td>
                                        <td>{{ $adsData->g_medium_ads }}</td>
                                        <td>{{ $adsData->g_full_ads }}</td>
                                       
                                      
                                    </tr>
                                @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@stop
