@extends('layouts.admin')
@section('title', 'Magazines')
@section('pageheading')
    Magazines - Add New
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add New Magazine</h3>
                    </div>
                    <form action="{{ route('admin.magazines.store') }}" method="post" enctype="multipart/form-data" data-parsley-validate id="form" >
                        @csrf
                        <div class="card-body row">
                            <div class="form-group col-6">
                                <label for="title">Title*</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="price">Price*</label>
                                <input type="number" step="any" name="price" class="form-control @error('price') is-invalid @enderror"
                                    value="{{ old('price') }}">
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
                                    value="{{ old('copyright_owner') }}">
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
                                    value="{{ old('edition_number') }}">
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
                                <input class="form-control @error('tags')is-invalid @enderror" type="text" id="tags"
                                    name="tags" value="{{ old('tags') }}"
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
                                            {{ old('category_id') === $category->id ? 'selected' : '' }}>
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
                                            {{ old('publication_id') === $publication->id ? 'selected' : '' }}>
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
                                    id="published_date" name="published_date" value="{{ old('published_date') }}">
                                @error('published_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                    rows="5">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-6" style="display: none;">
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
                            </div>

                            {{-- <div class="form-group">
                                <h5>Please Select One</h5>
                                <div class="form-control-file @error('file_type') is-invalid @enderror">
                                <label><input type="radio" name="file_type" value="pdf"> pdf</label>
                                <br>
                                </div>

                                <div id="test" class="form-control-file @error('file_type') is-invalid @enderror">
                                <label><input type="radio" name="file_type" value="epub"> epub</label>  <br>
                                
                                 </div>
                                @error('file_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}


                            <div class="form-group col-6">
                                <h5>Please Select One</h5>

                                <div class="form-check">
                                    <input type="radio" name="file_type" class="form-check-input pdfval @error('file_type') is-invalid @enderror" value="pdf" {{old('file_type') == 'pdf' ? 'checked' : ''}}>
                                    <label class="form-check-label"style="color:black;" >pdf</label>
                                </div>

                                <div class="form-check">
                                    <input type="radio" name="file_type" class="form-check-input epubval @error('file_type') is-invalid @enderror" value="epub" {{old('file_type') == 'epub' ? 'checked' : ''}}>
                                    <label class="form-check-label" style="color:black;">epub</label>
                                   
                                    @error('file_type')
                                        <span id="pdfepubval" class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                              
                                </div>
                            
                            </div>



                            <div class="pdf box col-6">
                             <div class="form-group" >
                                <label for="file">
                                    Upload Magazine File*
                                    <span class="text-muted"></span>
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

                        <div class="epub box col-6">

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
                           {{--  <span id="radioVal" style="display: none;color:#dc3545;font-size: 0.9em;"></span> --}}


                            <div class="xml box col-6">

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

                        <div class="epub-create col-6">
                            

                            @include('vendoruser.epub-create')
                              
                              <!-- Modal -->
                            <div class="modal fade" id="createEpub" tabindex="-1" aria-labelledby="createEpubLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="createEpubLabel">Create ePub</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    </div>
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

@section('styles')
    <style>
        .modal-fullscreen {
            width: 100vw;
            max-width: none;
            height: 100%;
            margin: 0;
        }
        .modal-fullscreen .modal-content {
            height: 100%;
            border: 0;
            border-radius: 0;
        }
        .modal-fullscreen .modal-header {
            border-radius: 0;
        }
        .modal-fullscreen .modal-body {
            overflow-y: auto;
        }
    </style>
@endsection