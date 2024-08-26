@extends('layouts.admin')
@section('title', 'Podcast')
@section('pageheading')
    Podcast - Add New
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add New Podcast</h3>
                    </div>
                    <form action="{{ route('admin.podcasts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="thumbnail_image">
                                    Upload Thumbnail Image*
                                    <span class="text-muted">(File must be jpg or png and the dimension will be
                                        (120x120)
                                        pixels)</span>
                                </label>
                                <input type="file" class="form-control-file @error('thumbnail_image') is-invalid @enderror"
                                    name="thumbnail_image" id="thumbnail_image" accept="image/jpg,image/jpeg,image/png">
                                @error('thumbnail_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="podcast_file">
                                    Upload Podcast File*
                                    <span class="text-muted">[Audio file must be mp3 and size upto 20MB]</span>
                                </label>
                                <input type="file" class="form-control-file @error('podcast_file') is-invalid @enderror"
                                    name="podcast_file" id="podcast_file" accept="audio/mpeg">
                                @error('podcast_file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
@stop
