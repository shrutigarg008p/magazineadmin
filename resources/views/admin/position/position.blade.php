@extends('layouts.admin')
@section('title', 'Section Positions')
@section('pageheading')
    Manage Positions
@endsection
@section('content')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="flex">
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
                                <th>Title</th>
                                {{-- <th>Position </th> --}}
                                <th>Created At</th>
                                
                            </tr>
                        </thead>
                        <tbody  id="tablecontents">
                            @if ($posts->count())
                                @foreach ($posts as $post)
                                    <tr class="row1" data-id="{{ $post->id }}">
                                         <td class="pl-3"><i class="fa fa-sort"></i></td>
                                        <td>{{ $post->section }}</td>
                                        {{-- <td>{{ $post->position }}</td> --}}
                                         <td>{{ date('d-m-Y h:m:s',strtotime($post->created_at)) }}</td>
                                       
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         {{-- <h5> <button class="btn btn-success btn-sm" onclick="window.location.reload()">REFRESH</button> </h5> --}}
        <!-- /.row -->
    </div><!-- /.container-fluid -->
   <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript">
      $(function () {
        $("#dataTable").DataTable();
      // this is need to Move Ordera accordin user wish Arrangement
        $( "#tablecontents" ).sortable({
          items: "tr",
          cursor: 'move',
          opacity: 0.6,
          update: function() {
              sendPositonToServer();
          }
        });

        function sendPositonToServer() {
          var pos = [];
          var token = $('meta[name="csrf-token"]').attr('content');
        //   by this function User can Update hisOrders or Move to top or under
          $('tr.row1').each(function(index,element) {
            pos.push({
              id: $(this).attr('data-id'),
              position: index+1
            });
          });
        // the Ajax Post update 
          $.ajax({
            type: "POST", 
            dataType: "json", 
            url: "{{ url('admin/custom-sortable') }}",
                data: {
              pos: pos,
              _token: token
            },
            success: function(response) {
                if (response.status == "success") {
                  console.log(response);
                } else {
                  console.log(response);
                }
            }
          });
        }
      });
    </script>
@endsection
