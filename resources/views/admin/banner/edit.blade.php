@extends('layouts.admin')
@section('title', 'Update Banner')
@section('pageheading')
    Update Banner
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <form action="{{ route('admin.banner.update', ['id' => $banner->id]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ $banner->title }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="url">URL</label>
                                <input type="text" name="url" class="form-control @error('url') is-invalid @enderror"
                                    value="{{ $banner->url }}">
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc">Short Description</label>
                                
                                <textarea name="short_description"
                                    class="form-control @error('short_description') is-invalid @enderror">{{ $banner->short_description }}</textarea>
                                @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc">File</label>
                                
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-5 d-flex align-items-center justify-content-center">
                                <img height="380" width="960" id="preview-image" style="display:{{$banner->image ? 'block':'none'}}" src='{{ url(Storage::url($banner->image)) }}' alt="sdf">
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var $ = $ || jQuery;

            $("#image").change(function(e) {
                var file = this.files[0];
                if( file ) {
                    $("#preview-image").prop("src", URL.createObjectURL(file));
                    $("#preview-image").show();
                }
            });
        });
    </script>
@endsection