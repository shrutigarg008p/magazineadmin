@extends('layouts.admin')
@section('title', 'RSS Feed Links')
@section('pageheading')
    RSS Feed Links
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="flex">
                    <a href="{{ route('admin.rss_feed_mgt.create') }}" class="btn btn-sm btn-primary">
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
                                <th>Url</th>
                                <th>Category</th>
                                <th>Last Synced</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rss_feeds as $rss_feed)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $rss_feed->url }}</td>
                                    <td>{{ $rss_feed->blog_category->name }}</td>
                                    <td>{{ $rss_feed->last_synced }}</td>
                                    <td>{{ $rss_feed->created_at }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <form method="post"
                                                action="{{ route('admin.rss_feed_mgt.destroy', ['rss_feed_mgt' => $rss_feed]) }}"
                                                onsubmit="return confirm('Are you sure to delete this link?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    {{__('Remove Link')}}
                                                </button>
                                            </form>
                                            <form class="ml-1" method="post"
                                                action="{{ route('admin.rss_feed_mgt.resync', ['rss_feed_mgt' => $rss_feed]) }}"
                                                onsubmit="return confirm('Are you sure? This process might take some time.');">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    {{ __('ReSync Posts') }}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
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
            $('#dataTable').DataTable({
                   dom: 'Bfrtip',
                   buttons: [
                      {
                         extend: 'excel',
                         text: 'Export Data',
                         className: 'btn btn-default',
                         exportOptions: {
                            columns: [0,1,2,3,4]
                         }
                      }
                   ]
            });
        });
    </script>
@stop
