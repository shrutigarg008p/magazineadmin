@extends('layouts.vendor')
@section('title', 'NewsPaper')
@section('pageheading')
    Newspaper - Add New
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add New Newspaper</h3>
                    </div>
                    <form action="{{ route('vendor.newspapers.store') }}" method="post" class="submit-via-ajax" enctype="multipart/form-data"data-parsley-validate id="form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="price">Price*</label>
                                <input type="number" step="any" name="price" class="form-control @error('price') is-invalid @enderror"
                                    value="{{ old('price') }}">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="copyright_owner">Copyright Owner/Author*</label>
                                <input type="text" name="copyright_owner"
                                    class="form-control @error('copyright_owner') is-invalid @enderror"
                                    value="{{ old('copyright_owner') }}" required>
                                @error('copyright_owner')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="edition_number">Edition Number/serial number/ISBN*</label>
                                <input type="text" name="edition_number"
                                    class="form-control @error('edition_number') is-invalid @enderror"
                                    value="{{ old('edition_number') }}" required>
                                @error('edition_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tags">Tags*
                                    <span class="text-muted">(Topics related to your newspaper)</span>
                                </label>
                                <input class="form-control @error('tags')is-invalid @enderror" type="text" id="tags"
                                    name="tags" value="{{ old('tags') }}"
                                    placeholder="enter comma (,) separated tags. eg: sports, sports news" required>
                                @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- @if (Auth::user()->isAdmin())
                            <div class="form-group">
                                <label for="apple_product_id">Apple product id*</label>
                                <input type="text" name="apple_product_id"
                                    class="form-control @error('apple_product_id') is-invalid @enderror"
                                    placeholder="It must be unique"
                                    value="{{ old('apple_product_id') }}" required>
                                @error('apple_product_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @endif --}}
                            <div class="form-group">
                                <label for="category_id">Category*</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id"
                                    id="category_id" required>
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
                            <div class="form-group">
                                <label for="publication_id">Publication*</label>
                                <select class="form-control @error('publication_id') is-invalid @enderror"
                                    name="publication_id" id="publication_id" required>
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
                            <div class="form-group">
                                <label for="published_date">Published Date*</label>
                                <input class="form-control @error('published_date')is-invalid @enderror" type="date"
                                    id="published_date" name="published_date" value="{{ old('published_date') }}" required>
                                @error('published_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="blog_post_linking_date">Posts publishing date for linking (if not provided, Published Date will be used)</label>
                                <input class="form-control @error('blog_post_linking_date')is-invalid @enderror" type="date"
                                    id="blog_post_linking_date" name="blog_post_linking_date"
                                    value="{{ old('blog_post_linking_date') }}">
                                @error('blog_post_linking_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cover_image">
                                    Upload Cover Image*
                                    <span class="text-muted">[File must be jpg or png and the dimension will be
                                        (1000x1200)
                                        pixels]</span>
                                </label>
                                <input type="file" class="form-control-file @error('cover_image') is-invalid @enderror"
                                    name="cover_image" id="cover_image" accept="image/jpg,image/jpeg,image/png" required>
                                @error('cover_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="is_free" name="is_free" value="1">
                                    <label for="is_free">
                                        Is newspaper free
                                    </label>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="grid_view" name="grid_view" value="1">
                                    <label for="grid_view">
                                        Make a grid
                                    </label>
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <label for="">Send notification to</label>
                                <div class="form-check">
                                    <input type="radio" id="to_notification_all" name="to_notification" class="form-check-input pdfval @error('to_notification') is-invalid @enderror" value="all">
                                    <label class="form-check-label" for="to_notification_all">All</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="to_notification_sub" name="to_notification" class="form-check-input epubval @error('to_notification') is-invalid @enderror" value="sub" checked>
                                    <label class="form-check-label" for="to_notification_sub">Subscribed Users Only</label>
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="short_description">Short Description*</label>
                                <textarea name="short_description"
                                    class="form-control @error('short_description') is-invalid @enderror"
                                    rows="5" required>{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group" style="display:none">
                                <label for="file">
                                    Upload Newspaper File*
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

                               {{--  <div class="form-group">
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


                             <div class="form-group">
                                <h5>Newspaper Type:</h5>

                                <div class="form-check">
                                    <input type="radio" name="file_type" class="form-check-input pdfval @error('file_type') is-invalid @enderror" value="pdf" {{old('file_type') == 'pdf' ? 'checked' : ''}}>
                                    <label class="form-check-label"style="color:black;" >pdf</label>
                                </div>

                                <div class="form-check">
                                    <input type="radio" name="file_type" class="form-check-input epubval @error('file_type') is-invalid @enderror" value="epub" {{old('file_type') == 'epub' ? 'checked' : ''}}>
                                    <label class="form-check-label" style="color:black;">epub</label>
                              
                                </div>

                                {{-- <div class="form-check">
                                    <input type="radio" name="file_type" class="form-check-input pdfval @error('file_type') is-invalid @enderror" value="grid" {{old('file_type') == 'grid' ? 'checked' : ''}}>
                                    <label class="form-check-label"style="color:black;" >grid layout</label>

                                    @error('file_type')
                                        <span id="pdfepubval" class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
                            
                            </div>



                            <div class="pdf box">
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

                         <div class="epub box">

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

                        @include('vendoruser.epub-create')
                        
                        <div class="card-footer">
                            <div class="error_box my-3"></div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
