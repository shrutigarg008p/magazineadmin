@section('styles')
<link href="{{ asset('epub_assets/css/quill.snow.css') }}" rel="stylesheet" />
<style>
    .modal-fullscreen{width:100vw;max-width:none;height:100%;margin:0}.modal-fullscreen .modal-content{height:100%;border:0;border-radius:0}.modal-fullscreen .modal-header{border-radius:0}.modal-fullscreen .modal-body{overflow-y:auto}
</style>
@append

@section('scripts')
    <template id="epub-page-template" style="display:none;">
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:epub="http://www.idpf.org/2007/ops">
            <head>
                <title>@{{title}}</title>
                <link rel="stylesheet" href="style.css" />
            </head>
            <body>@{{{body}}}</body>
        </html>
    </template>

    <script>
        var BASE_URL = "{{url('')}}";
        var BLOB_SERVER_URL = "{{route('save_epub_blob')}}";
        var CSRF_TOKEN = "{{csrf_token()}}";
    </script>

    <script src="{{asset('epub_assets/js/quill.js')}}"></script>
    <script src="{{asset('epub_assets/js/mode-markdown.js')}}"></script>
    <script src="{{asset('epub_assets/js/markdown.js')}}"></script>
    <script src="{{asset('epub_assets/js/markdown.html5.js')}}"></script>
    <script src="{{asset('epub_assets/js/markdown.gfm.js')}}"></script>
    <script src="{{asset('epub_assets/js/mustache.js')}}"></script>
    <script src="{{asset('epub_assets/js/uuid.js')}}"></script>
    <script src="{{asset('epub_assets/js/dataview.min.js')}}"></script>
    <script src="{{asset('epub_assets/js/jsziptools.min.js')}}"></script>
    <script src="{{asset('epub_assets/js/shortcut.js')}}"></script>
    <script src="{{asset('epub_assets/js/main.js')}}"></script>

    <script>
        const epubc_store = [];

        $(function() {

            const pages = $(".pages");

            // use inline styles
            var ColorClass = Quill.import('attributors/class/color');
            Quill.register(ColorClass, true);

            var SizeStyle = Quill.import('attributors/style/size');
            Quill.register(SizeStyle, true);

            var AlignStyle = Quill.import('attributors/style/align');
            Quill.register(AlignStyle, true);

            var FontAttributor = Quill.import('attributors/class/font');
            FontAttributor.whitelist = [
                'sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'
            ];
            Quill.register(FontAttributor, true);

            var BackgroundClass = Quill.import('attributors/class/background');
            Quill.register(BackgroundClass, true);


            var toolbarOptions = [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['blockquote', 'code-block'],
                ['bold', 'italic', 'underline', 'strike'],
                ['link', 'image'],
                [{ 'indent': '-1'}, { 'indent': '+1' }],
                [{ "direction": "rtl" }, { "align": [] }],
                [{ 'color': [] }, { 'background': [] }],
                ['clean']
            ];

            function _totalPages() {
                return pages.children().length;
            }

            function _resetPageNo() {
                pages.children()
                    .each(function(idx,el) {
                        const page = $(this);

                        page.find(".count")
                            .text( ++idx );
                    })
            }

            function _newEditor(el) {
                return new Quill(el, {
                    theme: 'snow',
                    modules: {
                        toolbar: toolbarOptions
                    }
                });
            }

            const pageTemplate = $(".page")
                .first().clone();

            $(".download").on("click", function() {
                exportToEpub();
            });

            _newEditor('.ww-editor');

            $(".add-section").on("click", function() {

                const counter = _totalPages();

                if( counter > 9 ) {
                    alert('Only 10 chapters can be added');
                    return;
                }

                const pageClone = pageTemplate.clone();

                const editor =
                    pageClone.find('.ww-editor').first();

                // increase page number
                pageClone.find(".count").text(
                    counter + 1
                );

                _newEditor(editor.get(0));

                pages.append(pageClone);
            });

            // remove page
            pages.on("click", ".remove-page",
                function() {
                    if( _totalPages() > 1 && confirm('Are you sure?') ) {
                        $(this).parents(".page")
                            .first().remove();

                        setTimeout(_resetPageNo, 50);
                    } else {
                        alert('At least one page is required!');
                    }
                });
        });
    </script>

@append

<div class="p-3 p-1">
    <input type="text" name="created_epub" id="created_epub" value="{{session('vendor_created_epub')??''}}" placeholder="Created Epub File" class="form-control" readonly>
</div>

<div class="epub-create p-3">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createEpub">
        Create ePub
    </button>

    <!-- Modal -->
    <div class="modal" id="createEpub" tabindex="-1" aria-labelledby="createEpubLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title" id="createEpubLabel">
                            <span class="text-bold">Create an ePub [Max 10 Pages]</span>
                        </h5>
                        <p class="small">Press esc to cancel (be careful, you will lose your work if you refresh)</p>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">

                            <div class="pages mt-2">
                                <div class="page my-4">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h3 class="text-bold">Page: <span class="count">1</span></h3>
                                        </div>
                                        <div class="col-sm-4 text-right">
                                            <a href="javascript:void(0)" class="remove-page text-danger">
                                                - Remove Page <span class="count">1</span>
                                            </a>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control page-title mb-2" placeholder="Title">
                                    <div class="ww-editor">
                                        <p>Page Content</p>
                                    </div>
                                </div>
                            </div>
        
                            <button type="button" class="add-section mt-3 btn btn-sm btn-primary">+ Add Page</button>
        
                            <hr /><hr />
        
                            <div class="meta mt-5">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" placeholder="Epub Title" id="title-input" class="my-2 form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="">Author</label>
                                    <input type="text" placeholder="Author" id="author-input" class="my-2 form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="">Cover Image</label>
                                    <input type="file" id="cover-input" class="form-control" />
                                </div>
                                <button type="button" class="download my-2 btn btn-lg btn-primary">
                                    Save File
                                </button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
