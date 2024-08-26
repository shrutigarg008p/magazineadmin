@extends('layouts.admin')
@section('title', 'Magazines')
@section('pageheading')
    Magazines - Update
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Magazine</h3>
                    </div>
                    <form action="{{ route('admin.magazines.update', ['magazine' => $magazine]) }}" method="post"
                        enctype="multipart/form-data" data-parsley-validate id="form">
                        @csrf
                        @method('put')
                        <div class="card-body row">
                            <div class="form-group col-6">
                                <label for="title">Title*</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $magazine->title) }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="price">Price*</label>
                                {{--<input type="number" step="any" name="price" class="form-control @error('price') is-invalid @enderror"
                                    value="{{ old('price', $magazine->price) }}" pattern="[0-9]>">--}}

                                <input type="number" step="any" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $magazine->price) }}" >

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="copyright_owner">Copyright Owner/Author*</label>
                                <input type="text" name="copyright_owner"
                                    class="form-control @error('copyright_owner') is-invalid @enderror"
                                    value="{{ old('copyright_owner', $magazine->copyright_owner) }}">
                                @error('copyright_owner')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="edition_number">Edition Number/serial number/ISBN*</label>
                                <input type="text" name="edition_number"
                                    class="form-control @error('edition_number') is-invalid @enderror"
                                    value="{{ old('edition_number', $magazine->edition_number) }}">
                                @error('edition_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="tags">Tags*
                                    <span class="text-muted">(Topics related to your magazine)</span>
                                </label>
                                <input class="form-control @error('tags') is-invalid @enderror" type="text" id="tags"
                                    name="tags" value="{{ old('tags', $magazine->tags_string) }}"
                                    placeholder="enter comma (,) separated tags. eg: sports, sports news">
                                @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="category_id">Category*</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id"
                                    id="category_id">
                                    <option value="">-- choose category --</option>
                                    @forelse($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $magazine->category->id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="publication_id">Publication*</label>
                                <select class="form-control @error('publication_id') is-invalid @enderror"
                                    name="publication_id" id="publication_id">
                                    <option value="">-- choose publication --</option>
                                    @forelse($publications as $publication)
                                        <option value="{{ $publication->id }}"
                                            {{ old('publication_id', $magazine->publication->id) == $publication->id ? 'selected' : '' }}>
                                            {{ $publication->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('publication_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="published_date">Published Date*</label>
                                <input class="form-control @error('published_date')is-invalid @enderror" type="date"
                                    id="published_date" name="published_date"
                                    value="{{ old('published_date', $magazine->published_date->format('Y-m-d')) }}">
                                @error('published_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <img src="{{ asset("storage/{$magazine->thumbnail_image}") }}"
                                    alt="{{ $magazine->title }}">
                            </div>
                            <div class="form-group col-6">
                                <label for="thumbnail_image">
                                    Upload Thumbnail Image*
                                    <span class="text-muted">[File must be jpg or png and the dimension will be
                                        (187x245)
                                        pixels]</span>
                                </label>
                                <input type="file" class="form-control-file @error('thumbnail_image') is-invalid @enderror"
                                    name="thumbnail_image" id="thumbnail_image" accept="image/jpg,image/jpeg,image/png">
                                @error('thumbnail_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <img src="{{ asset("storage/{$magazine->cover_image}") }}"
                                    alt="{{ $magazine->title }}" class="img-fluid">
                            </div>
                            <div class="form-group col-6">
                                <label for="cover_image">
                                    Upload Cover Image*
                                    <span class="text-muted">[File must be jpg or png and the dimension will be
                                        (521x686)
                                        pixels]</span>
                                </label>
                                <input type="file" class="form-control-file @error('cover_image') is-invalid @enderror"
                                    name="cover_image" id="cover_image" accept="image/jpg,image/jpeg,image/png">
                                @error('cover_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                             <div class="form-group col-6">
                                <label for="short_description">Short Description*</label>
                                <textarea name="short_description"
                                    class="form-control @error('short_description') is-invalid @enderror"
                                    rows="5">{{ old('short_description', $magazine->short_description) }}</textarea>
                                @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                @if($magazine->file_type == "pdf")
                                <h1>PDF FILE</h1>
                                @else
                                <h1>EPUB FILE</h1>
                                @endif
                                <iframe src="{{ asset("storage/{$magazine->file}") }}" frameBorder="0" scrolling="auto" height="100%" width="100%"></iframe>
                            </div>
                            {{--<div class="form-group">
                                <label for="file">
                                    Upload Magazine File*
                                    <span class="text-muted">[File must be PDF]</span>
                                </label>
                                <input type="file" class="form-control-file @error('file') is-invalid @enderror" name="file"
                                    id="file" accept="application/pdf">
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>--}}

                            <div class="form-group col-6">
                                <h5>Please Select One</h5>
                                <label><input type="radio" name="file_type" value="pdf"> pdf</label>
                                <br>
                                <label><input type="radio" name="file_type" value="epub"> epub</label>  <br>
                                {{-- <label><input type="radio" name="file_type" value="xml">Xml</label>  <br>  --}}
                            </div>


                            <div class="pdf box col-12">
                             <div class="form-group" >
                                <label for="file">
                                    Upload Magazine File*
                                    <span class="text-muted">[File must be PDF]</span>
                                </label>
                                {{--
                                    <input type="file" class="form-control-file " name="file" id="filepdf"  data-parsley-error-message="Please upload pdf file only"  accept="application/pdf" > 
                                --}}
                                <input type="file" class="form-control-file " name="pdf_file" id="filepdf"  data-parsley-error-message="Please upload pdf file only"  accept="application/pdf" onchange="PdfFileType(this.form.pdf_file.value, ['.pdf'])" >
                                <span id="err_pdf" style="color:#dc3545;font-size: 0.9em;"></span> 

                                {{--<input type="file" class="form-control-file @error('file') is-invalid @enderror" name="file"
                                    id="file" accept="application/pdf">
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror--}}
                                       
                              </div>
                            </div>

                        <div class="epub box col-12">

                            {{--<div class="form-group">
                                    <label for="epub_description">File Content*</label>

                                    <textarea name="epub_description" id="epub_description"  data-parsley-error-message="Please enter description" class="form-control"  rows="5"></textarea>

                                    <textarea name="epub_description"
                                    class="form-control @error('epub_description') is-invalid @enderror"
                                    rows="5">{{ old('epub_description') }}</textarea>
                                    @error('epub_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                --}}

                                <div class="form-group" >
                                    <label for="file">
                                        Upload Magazine File*
                                        <span class="text-muted"></span>
                                    </label>

                                    <input type="file" class="form-control-file " name="epub_file" id="fileepub" accept="application/epub" data-parsley-error-message="Please upload epub only" onchange="EpubFileType(this.form.epub_file.value, ['.epub'])" >
                                    <span id="err_epub" style="color:#dc3545;font-size: 0.9em;"></span>
                                     
                                     {{--<input type="file" class="form-control-file @error('file') is-invalid @enderror" name="file"
                                        id="file" accept="application/pdf">
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror--}}

                                </div>
                            </div>


                            <div class="xml box">

                                <div class="form-group">
                                    <label for="xml_description">File Content*</label>
                                    <textarea name="xml_description" id="xml_description" data-parsley-error-message="Please enter description" class="form-control" rows="5"></textarea>

                                    {{--<textarea name="xml_description" id="xml_description"
                                    class="form-control @error('xml_description') is-invalid @enderror"
                                    rows="5">{{ old('xml_description') }}</textarea>
                                    @error('xml_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    --}}
                                </div>
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
