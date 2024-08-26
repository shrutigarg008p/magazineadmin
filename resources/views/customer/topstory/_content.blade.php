@php
    $user_blog_subscription = isset($user_blog_subscription) && $user_blog_subscription;
    $content = $resource->content;

    if( !$user_blog_subscription && $resource && $resource->is_premium ) {
        $content = \strip_tags($content);

        $content = \strlen($content) > 200
            ? \substr($content,0,200)."..." : $content;
    }
@endphp

<style>
    .md_text_start h1,
    .md_text_start h2,
    .md_text_start h3,
    .md_text_start h4,
    .md_text_start h5,
    .md_text_start h6 {
        font-size: 1.2rem !important;
    }
    .md_text_start img {
        max-width: 100%!important;
    }
</style>

<div class="md_text_start">

    <div>
        {{$resource->short_description}}
    </div>

    <hr class="my-3">

    <div id="blog-detail-content">
        {!!$content!!}
    </div>

    @if (!$user_blog_subscription && $resource && $resource->is_premium)
        <div class="mb-4">
            <div class="d-flex justify-content-center align-items-center">
                <a href="{{route('all_plans', ['tab' => 'PR','resource' => $resource->id])}}" class="btn btn-md btn-danger w-100">
                    There's more <br>
                    <b>Buy Subscription To Read Full Story</b>
                </a>
            </div>
        </div>
    @endif
</div>