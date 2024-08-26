@extends('layouts.admin')
@section('title', 'Apple Price')
@section('pageheading')
    Apple Price - Add
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Apple Price</h3>
                    </div>
                    <form action="{{ route('admin.appleplan.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Price*</label>
                                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                                    value="">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="promoted" name="status" value="1">
                                    <label for="promoted">
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'contentText' );
</script>
@stop
