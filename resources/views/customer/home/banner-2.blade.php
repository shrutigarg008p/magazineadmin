@php
$banners = \App\Models\Banner::all();
@endphp
<section class="lazy slider home_banner blog_slider" data-sizes="50vw">
    @foreach ($banners as $banner)
        <div>
            <div class="inner_group">
                <a class="blog_image" href="{{ $banner->url ?? 'javascript:void(0);' }}">
                    <!--<img src="{!! $banner->image? url(Storage::url($banner->image)): 'https://via.placeholder.com/1391x640.png?text=Graphic+News+Plus' !!}"-->
                    <!--    alt="banner-image" class="img-fluid lazy " referrerpolicy="no-referrer" style="width:1349px;height: 540px;">-->
                    <img src="{{ $banner->image? url(Storage::url($banner->image)): 'https://via.placeholder.com/1391x640.png?text=Graphic+News+Plus' }}"
                        alt="banner-image" class="img-fluid lazy " referrerpolicy="no-referrer" style="width:100%;height: 540px;">
                    <div class="banner_content">
                        <p class="banner_text">{{ $banner->title }}</p>
                        @if ($banner->short_description)
                            <p>{{ $banner->short_description }}</p>
                        @endif
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</section>
