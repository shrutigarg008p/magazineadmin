@extends('layouts.admin')
@section('title', 'Blogs')
@section('pageheading')
    Blogs - Update
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Blog Post</h3>
                    </div>
                    <form action="{{ route('admin.blogs.update', ['blog' => $blog]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $blog->title) }}">
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
                                            {{ old('blog_category_id', $blog->blog_category_id) === $category->id ? 'selected' : '' }}>
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
                                    name="tags" value="{{ old('tags', $blog->tags_string) }}"
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
                                    class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description', $blog->short_description) }}</textarea>
                                @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Content*</label>
                                <textarea name="content" id="contentText" class="form-control @error('content') is-invalid @enderror">{{ old('content', $blog->content) }}</textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <img class="img-fluid"
                                    src="{{ (\strpos($blog->content_image, 'http') === 0) ? $blog->content_image : asset("storage/{$blog->content_image}") }}"
                                    alt="{{ $blog->title }}" />
                            </div>
                            <div class="form-group">
                                <label for="content_image">
                                    Upload Cover Image [Min File dimension: 1000x1200 px]*
                                </label>
                                <input type="file" class="form-control-file @error('content_image') is-invalid @enderror"
                                    name="content_image" id="content_image" accept="image/jpg,image/jpeg,image/png">
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
                                    name="thumbnail_image" id="thumbnail_image" accept="image/jpg,image/jpeg,image/png">
                                @error('thumbnail_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="promoted" name="promoted" value="1"
                                        {{ $blog->promoted == 1 ? 'checked' : '' }}>
                                    <label for="promoted">
                                        Mark as a Promoted Content
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="top_story" name="top_story" value="1"
                                        {{ $blog->top_story == 1 ? 'checked' : '' }}>
                                    <label for="top_story">
                                        Mark as a Top Story Content
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="is_premium" name="is_premium" value="1"
                                        {{ $blog->is_premium == 1 ? 'checked' : '' }}>
                                    <label for="is_premium">
                                        Does article require subscription?
                                    </label>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="use_for_slider" name="use_for_slider" value="1"
                                        {{ ($blog->slider_image || $errors->any()) ? 'checked' : '' }}>
                                    <label for="use_for_slider">
                                        Use for slider
                                    </label>
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="push_notification" name="push_notification" value="1">
                                    <label for="push_notification">
                                        Push Notification
                                    </label>
                                </div>
                            </div>
                            {{-- <div class="form-group slider_image_wrapper" style="display:{{($blog->slider_image || $errors->any()) ? 'block':'none'}};">
                                <label for="slider_image">
                                    Upload Slider Image [Min File dimension: 916x486 px]*
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
        // });
    });
</script>
@stop
