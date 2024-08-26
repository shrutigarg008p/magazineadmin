@extends('layouts.admin')
@section('title', 'Video')
@section('pageheading')
    Video - Update
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Video</h3>
                    </div>
                    <form action="{{ route('admin.videos.update', ['video' => $video]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $video->title) }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                @if ($video->thumbnail_image)
                                    <img src="{{ asset("storage/{$video->thumbnail_image}") }}"
                                        alt="{{ $video->id }}" width="250">
                                @else
                                    <img src="{{ asset('assets/frontend/img/default_video_image.png') }}"
                                        alt="{{ $video->id }}" width="250">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="thumbnail_image">
                                    Upload Thumbnail Image (optional)
                                    <span class="text-muted">(File must be jpg or png and the dimension will be
                                        (375x240)
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
                                <label for="video_link">Video Link* <span class="text-muted">(For eg. youtube
                                        link:https://www.youtube.com/watch?v=example)</span></label>
                                <input type="text" name="video_link"
                                    class="form-control @error('video_link') is-invalid @enderror"
                                    value="{{ old('video_link', $video->video_link) }}">
                                @error('video_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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
