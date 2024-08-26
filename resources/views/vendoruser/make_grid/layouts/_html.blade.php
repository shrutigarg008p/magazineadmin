<div class="mt-2 mb-4">
    <h2>{{ $content->type }}: <b>{{ $content->title }} [ {{ $content->id }} ]</b></h2>
</div>

<h5>Fill the layout for <b>Slide {{ $slide }}</b></h5>

@if ($errors->any())
    <div class="my-5 text-danger">
        @foreach ($errors->toArray() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error[0] ?? '' }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    </div>
@endif

<form action="{{ route('vendor.content_make_grid') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="slide" value="{{ $slide }}">
    <input type="hidden" name="type" value="{{ $type }}">
    <input type="hidden" name="content" value="{{ $content_id }}">
    <input type="hidden" name="layout" value="{{$layout}}">

    <div class="my-5 md28-layout" style="max-width:{{ $screenWidth }}px;min-height:{{ $screenHeight }}px;">
        <div class="md28-layout-wrapper md28-layout-{{$layout}}">
            @foreach ($sections as $section => $data)
                @php
                    $order = $data['order'];
                    $coords = $order . '_' . $data['coords'];
                    $data_requied = isset($data['data_requied']) && $data['data_requied'];
                    
                    $minWidth = floor($maxWidth / (4 - ($data['crossAxis'] - 1)));
                    $minHeight = floor($maxHeight / (6 - ($data['mainAxis'] - 1)));
                    
                    $grid = $gridBlocks->where('order', $order)->first();
                    $grid = $grid ? $grid : new \App\Models\ContentGridView();
                @endphp

                <input type="hidden" name="order[{{ $coords }}]" value="{{ $order }}">
                <div style="min-height:{{ floor($minHeight / 2) }}px;background-image:url('{{$grid->thumbnail_image}}')"
                    class="md28-layout-item md28-layout-{{$layout}}-section-{{ $section }}">
                    <div>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#fillLayoutModal{{ $section }}">
                            Update Section: {{ $section }}
                        </button>
                    </div>

                    <div class="modal fade" id="fillLayoutModal{{ $section }}" tabindex="-1" role="dialog"
                        aria-labelledby="fillLayoutModalLabel{{ $section }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Section: {{ $section }}</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <b>Please Note:</b>
                                        <p>
                                            Updating <b>title, description and cover image</b> is important otherwise detail page might not open properly inside the app
                                        </p>
                                        <p>
                                            If you do not want a detail page for this block, simply upload a thumbnail image and leave the rest empty
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" class="form-control"
                                            name="block_title[{{ $coords }}]" value="{{$grid->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="block_description[{{ $coords }}]" cols="30" rows="10"
                                            class="form-control ckeditor">{{$grid->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Thumbnail [ Minimum Resolution (in pixels): {{ $minWidth }}px
                                            x {{ $minHeight }}px ]</label>
                                        <input data-min_width="{{ $minWidth }}"
                                            data-min_height="{{ $minHeight }}" type="file"
                                            name="block_thumbnail_image[{{ $coords }}]"
                                            data-wrap_target=".md28-layout-{{$layout}}-section-{{ $section }}"
                                            class="file-check-size-res form-file">
                                        @if (isset($grid->thumbnail_image))
                                            <p><b>Uploaded File: <a href="{{$grid->thumbnail_image}}" target="_blank">{{basename($grid->thumbnail_image)}}</a></b></p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cover [ Minimum Resolution (in pixels): 900px x 1200px ]</label>
                                        <input data-min_width="900" data-min_height="100" type="file"
                                            name="block_cover_image[{{ $coords }}]"
                                            class="form-file file-check-size-res">
                                        @if (isset($grid->cover_image))
                                            <p><b>Uploaded File: <a href="{{$grid->cover_image}}" target="_blank">{{basename($grid->cover_image)}}</a></b></p>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-5 d-flex align-items-center">
            <button type="submit" name="submit_type" value="new_slide" class="btn btn btn-primary">
                <i class="fas fa-plus"></i>
                Save and add new slide
            </button>
            <button type="submit" name="submit_type" value="finish" class="btn btn btn-primary ml-2">
                <i class="fas fa-check"></i>
                Save and finish
            </button>
            @if (intval($slide) > 1)
                <button type="submit" name="submit_type" value="cancel" class="btn btn btn-primary ml-2"
                    onclick="return confirm('Are you sure you want to cancel?');">
                    <i class="fas fa-times"></i>
                    Cancel
                </button>
            @endif
        </div>
    </div>
    <input type="hidden" name="from_grid_listing" value="{{intval(Request::query('from_grid_listing'))}}">
</form>
