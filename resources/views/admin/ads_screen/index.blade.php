@extends('layouts.admin')
@section('title', 'AdScreen')
@section('pageheading')
    Manage AdScreen
@endsection
@section('content')
    <div class="container-fluid">
        <div id="alert" class="alert-success new-window" data-message="my message">
        </div>
        <div class="row">
            <div class="col-lg-12 mb-5">
              
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="dataTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ad Name</th>

                                <th>Screen Name</th>

                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                          
                                @foreach ($ads_screen as $adsData)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @if($adsData->type == "full_ads")
                                        <td>{{ "Full Page Ad" }}</td>
                                        @endif
                                         
                                        @if($adsData->type == "banner_ads")
                                        <td>{{ "Banner Ad" }}</td> 
                                        @endif

                                        @if($adsData->type == "medium_ads")
                                        <td>{{ "Medium Ad" }}</td> 
                                        @endif

                                        <td>{{ $adsData->name }}</td>     
                                          <td>
                                            <input data-id="{{$adsData->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $adsData->status ? 'checked' : '' }}>
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
            // $('#dataTable').DataTable();
        });
    </script>
    <script>
  @if(Session::has('message'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.warning("{{ session('warning') }}");
  @endif
</script>
    <script>
  $(function() {
    $('.toggle-class').change(function() {
        // alert();
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var screen_id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{url('admin/changeScreenStatus')}}',
            data: {'status': status, 'screen_id': screen_id},
            success: function(data){
              // console.log(data.success);
             // toastr.success(data.message);
             //  window.location.reload();
              toastr.options.timeOut = 5000;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.success(data.message);
                       window.location.reload();
                // setTimeout(function() {
                // $('#alert').fadeOut('fast');
                //     }, 3000);
            }
        });
    })
  })
</script>
@stop
