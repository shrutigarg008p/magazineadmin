<div class="my-5 md28-layout" style="max-width:{{ $screenWidth }}px;min-height:{{ $screenHeight }}px;">
    <div class="md28-layout-wrapper border-white md28-layout-{{ $layout }}">
        @foreach ($sections as $section => $data)
            @php
                $order = $data['order'];
                $coords = $order . '_' . $data['coords'];
                $data_requied = isset($data['data_requied']) && $data['data_requied'];
                
                $minWidth = floor($maxWidth / (4 - ($data['crossAxis'] - 1)));
                $minHeight = floor($maxHeight / (6 - ($data['mainAxis'] - 1)));

                $grid = $gridBlocks->where('order', $order)->first();
                $grid = $grid ? $grid : new \App\Models\ContentGridView();

                $isValid = !empty($grid->cover_image);
            @endphp

            <div style="min-height:{{ floor($minHeight / 2) }}px;background-image:url('{{ $grid->thumbnail_image }}')"
                class="{{ $isValid ? 'grid-detail-btn':'' }} md28-layout-item md28-layout-{{ $layout }}-section-{{ $section }}">
                
                <div class="grid-detail-content" style="display:none;">
                    <div class="row flex-column justify-content-center align-items-center">
                        <img src="{{ $grid->cover_image }}" class="img-fluid" alt="{{ $grid->title }}" style="max-height:480px;">
                        <h1 class="my-4">{{ $grid->title }}</h1>
                        <div class="mb-3">
                            {!! $grid->description !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
