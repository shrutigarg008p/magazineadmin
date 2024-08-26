@extends('layouts.admin')
@section('title', 'Blogs')
@section('pageheading')
    Blogs - Add New
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add New Blog Post</h3>
                    </div>
                    <form action="{{ route('admin.blogs.store') }}" method="post" enctype="multipart/form-data">
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
                                <label for="blog_category_id">Category*</label>
                                <select class="form-control @error('blog_category_id') is-invalid @enderror"
                                    name="blog_category_id" id="blog_category_id">
                                    <option value="">-- choose category --</option>
                                    @forelse($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('blog_category_id') === $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('blog_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tags">Tags
                                    <span class="text-muted">(Topics related to your Blog post)</span>
                                </label>
                                <input class="form-control @error('tags')is-invalid @enderror" type="text" id="tags"
                                    name="tags" value="{{ old('tags') }}"
                                    placeholder="enter comma (,) separated tags. eg: sports, sports news">
                                @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <textarea name="short_description"
                                    class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Content*</label>
                                <textarea name="content" id="contentText" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content_image">
                                    Upload Cover Image [Min File dimension: 1000x1200 px]*
                                    {{-- <span class="text-muted">[File must be jpg or png and the dimention will be
                                        (275x275)
                                        pixels]</span> --}}
                                </label>
                                <input type="file" class="form-control-file @error('content_image') is-invalid @enderror"
                                    name="content_image" id="content_image" accept="image/jpg,image/jpeg,image/png" required>
                                @error('content_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="thumbnail_image">
                                    Upload Thumbnail Image [Min File dimension: 440x276 px]*
                                </label>
                                <input type="file" class="form-control-file @error('thumbnail_image') is-invalid @enderror"
                                    name="thumbnail_image" id="thumbnail_image" accept="image/jpg,image/jpeg,image/png" required>
                                @error('thumbnail_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="promoted" name="promoted" value="1">
                                    <label for="promoted">
                                        Mark as a Promoted Content
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="top_story" name="top_story" value="1">
                                    <label for="top_story">
                                        Mark as a Top Story Content
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="is_premium" name="is_premium" value="1">
                                    <label for="is_premium">
                                        Does article require subscription?
                                    </label>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="use_for_slider" name="use_for_slider" value="1">
                                    <label for="use_for_slider">
                                        Use for slider
                                    </label>
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="push_notification" name="push_notification" value="1" checked>
                                    <label for="push_notification">
                                        Push Notification
                                    </label>
                                </div>
                            </div>
                            {{-- <div class="form-group slider_image_wrapper" style="display:none;">
                                <label for="slider_image">
                                    Upload Slider Image [Min File dimension: 916x486 px]*
                                    {{-- <span class="text-muted">[File must be jpg or png and the dimention will be
                                        (275x275)
                                        pixels]</span> -- }}
                                </label>
                                <input type="file" class="form-control-file @error('slider_image') is-invalid @enderror"
                                    name="slider_image" id="slider_image" accept="image/jpg,image/jpeg,image/png">
                                @error('slider_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
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

        $(document).ready(function() {
            // var slider_image_wrapper = $(".slider_image_wrapper");
            // var use_for_slider = $("#use_for_slider");

            // use_for_slider.change(function() {
            //     var checked = use_for_slider.is(":checked");

            //     slider_image_wrapper.toggle(checked);
            //     slider_image_wrapper.find("input").prop("required", checked);
            // });
        });
    </script>
@stop
