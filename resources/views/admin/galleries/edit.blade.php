@extends('layouts.admin')
@section('title', 'Gallery')
@section('pageheading')
    Gallery - Update
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Gallery Image</h3>
                    </div>
                    <form action="{{ route('admin.galleries.update', ['gallery' => $gallery]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
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
                                    value="{{ old('title', $gallery->title) }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-12 mb-3">
                                <label for="description">Album Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="10" rows="2">{{ old('description', $gallery->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-group">
                                    @if ( $gallery->cover_image )
                                        <div class="mb-2">
                                            <img src="{{ asset("storage/{$gallery->cover_image}") }}" height="120" width="120">
                                        </div>
                                    @endif
                                    <label for="cover_image">Cover Image (Min-width: 1000px)</label>
                                    <input type="file" class="file-check-size-res" data-min_width="1000" name="cover_image" />
                                </div>
                            </div>
                            <div id="imagesContainer">
                                <h4 class="text-bold mb-3">Image Gallery</h4>
                                @forelse ($gallery->gallary_images as $image)
                                    <input type="hidden" name="image_ids[]" value="{{$image->id}}">
                                    <div>
                                        <div class="form-group">
                                            <label for="image_title">Image Title</label>
                                            <input type="text" name="image_title[]" class="form-control" value="{{$image->title}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="image_title">Image (Min-width: 1000px)</label>
                                            <div class="input-group">
                                                <input type="file" name="image[]" class="form-control" id="inputGroupFile01">
                                                <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                            </div>
                                        </div>
                                        @if ($image->image && !empty($image_src = asset("storage/{$image->image}")))
                                        <div class="form-group">
                                            <a href="{{$image_src}}" target="_blank">
                                                <img src="{{$image_src}}" alt="{{$image->title}}" width="75px" heigth="75px">
                                                View image in new tab
                                            </a>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="image_title"> </label>
                                            <div class="input-group">
                                                <button type="button" class="btn btn-sm btn-success" onclick="addMore()">Add More</button>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    
                                @endforelse
                                
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
                        <div class="form-group ">
                            <label for="image_title">Image Title</label>
                            <input type="text" name="image_title[]" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label for="image_title">Image (Min-width: 1000px)</label>
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
</script>
@stop
