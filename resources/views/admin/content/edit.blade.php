@extends('layouts.admin')
@section('title', $content->title)
@section('pageheading')
    {{$content->title}} - Update
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update {{$content->title}}</h3>
                    </div>
                    <form action="{{route('admin.content_manager.update',['content_manager'=>$content])}}"
                        method="post">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $content->title) }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="page_content">Content*</label>
                                <textarea id="tiny_basic" name="page_content" class="form-control @error('page_content') is-invalid @enderror">{{ old('page_content', $content->page_content) }}</textarea>
                                @error('page_content')
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
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script> --}}
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    {{-- <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js' referrerpolicy='origin'></script> --}}
    <script>
        // tinymce.init({ selector: 'textarea#tiny_basic' });
        // ClassicEditor
        // .create( document.querySelector( '#tiny_basic' ) )
        // .catch( error => {
        //     console.error( error );
        // } );
        // $(document).ready(function() {
        //     $('#dataTable').DataTable();
        // });
        CKEDITOR.replace( 'tiny_basic' );
    </script>
@stop
