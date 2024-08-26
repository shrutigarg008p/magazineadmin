@extends('layouts.admin')
@section('title', 'Gallery')
@section('pageheading')
    Gallery - Add New
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add New Gallery Image</h3>
                    </div>
                    <form action="{{ route('admin.galleries.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                @if($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                @endif
                                
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="form-group col-6">
                                <label for="title">Album Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-12 mb-3">
                                <label for="description">Album Description</label>
                                <textarea name="description" class="form-control @error('title') is-invalid @enderror" id="description" cols="10" rows="2" required>{{ old('title') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-group">
                                    <label for="cover_image">Cover Image (Min-width: 1000px)</label>
                                    <input type="file" class="file-check-size-res" data-min_width="1000" name="cover_image" required />
                                </div>
                            </div>
                            <div id="imagesContainer">
                                <h4 class="text-bold mb-3">Image Gallery</h4>

                                <div>
                                    <div class="form-group">
                                        <label for="image_title">Image (Min-width: 1000px)</label>
                                        <div class="input-group">
                                            <label class="input-group-text" for="inputGroupFile01">Upload Multiple Images</label>
                                            <input style="visibility:hidden" type="file" class="gallery-images form-control @error('image') is-invalid @enderror" id="inputGroupFile01" multiple required>
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="content-container">
                                    <div class="content-container-template" style="display:none;">
                                        <div class="mt-4">
                                            <div class="form-group">
                                                <label for="image_title">Image Title</label>
                                                <input type="text" name="image_title[]" class="form-control" placeholder="Image Title" required>
                                            </div>
                                            <div class="form-group mb-2">
                                                <img height="125" class="img_display" width="125" src="" />
                                                <input type="file" class="img_input" name="image[]" required>
                                            </div>
                                        </div>
                                        <hr />
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
<script>
    function addMore(){
        let divcount = $(`#imagesContainer`).length;
        $content = `<div class="my-5">
                        <div class="form-group">
                            <label for="image_title">Image Title</label>
                            <input type="text" name="image_title[]" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="image_description">Image Description</label>
                            <textarea name="image_description[]" class="form-control @error('title') is-invalid @enderror" cols="10" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image_title">Image (Resolution: 900 x 1200 px)</label>
                            <div class="input-group">
                                <input type="file" name="image[]" class="form-control" id="inputGroupFile01">
                                <label class="input-group-text" for="inputGroupFile01">Upload</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image_title"> </label>
                            <div class="input-group">
                                <button type="button" class="btn btn-sm btn-success" onclick="addMore()">Add More</button>
                            </div>
                        </div>
                    </div>`;
        $(`#imagesContainer`).append($content);
        console.log(divcount);
    }

    const gallery_image_upload = $("input.gallery-images");
    const container = $(".content-container");
    const template = $(".content-container-template").clone();

    function _get_template(img, file) {
        const dt = new DataTransfer();
        dt.items.add(file);

        const clone = template.clone();
        clone.find(".img_display").attr("src", img).show();
        clone.find(".img_input")[0].files = dt.files;
        clone.show();

        return clone;
    }

    const min_width = 1000;

    const _URL = window.URL || window.webkitURL;

    gallery_image_upload.change(function() {

        const files = this.files;

        if( files && files.length ) {
            container.html("");

            Array.prototype.slice.apply(files)
                .forEach(function(file) {
                    const image = new Image();

                    $(image).on("load", function() {
                        if (this.width < min_width) {
                            alert("Invalid image width! for '"+file.name+"'. Minimum Required: " + min_width +
                                "px. Provided: " + this.width + "px");
                        } else {
                            container.append(
                                _get_template(this.src, file)
                            );
                        }
                    });

                    image.src = _URL.createObjectURL(file);
                });
        }
    });
</script>
@stop
