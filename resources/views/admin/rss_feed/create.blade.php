@extends('layouts.admin')
@section('title', 'Rss Feed')
@section('pageheading')
    Rss Feed - Create
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <form action="{{ route('admin.rss_feed_mgt.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="url">URL*</label>
                                <input type="text" name="url" class="form-control @error('url') is-invalid @enderror"
                                    value="{{ old('url') }}">
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_id">
                                    Blog Category*
                                </label>
                                @php
                                    $old_category_id = old('category_id');
                                @endphp
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{($old_category_id == $category->id) ? 'selected':''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <legend class="col-form-label font-weight-bold">All fetched posts will be part of</legend>
                                <div class="form-check form-check">
                                    <input class="form-check-input" type="checkbox"
                                        name="promoted" id="promoted" value="1">
                                    <label class="form-check-label" for="promoted">
                                        Promoted Content
                                    </label>
                                </div>
                                <div class="form-check form-check">
                                    <input class="form-check-input" type="checkbox"
                                        name="top_story" id="top_story" value="1">
                                    <label class="form-check-label" for="top_story">
                                        Top Stories
                                    </label>
                                </div>
                                <div class="form-check form-check">
                                    <input class="form-check-input" type="checkbox"
                                        name="banner_slider" id="banner_slider" value="1">
                                    <label class="form-check-label" for="banner_slider">
                                        Top Banner Slider
                                    </label>
                                </div>
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
@stop
