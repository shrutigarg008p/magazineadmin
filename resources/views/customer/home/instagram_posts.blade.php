<div class="container">
    <div class="heading_arrow_group">
         <a href="{{url('instagram')}}">
        <h1 class="common_heading link_list">Instagram Feed</h1>
    </a>
        <a href="{{url('instagram')}}"><img src="{{ asset('assets/frontend/img/icon-next.png') }}" alt=""></a>
    </div>
    <section class="regular slider  insta_slider mb-4">
        @forelse ($instadata as $feed)
            <div>
                <a class="insta_image" href="{{$feed->permalink}}" target="blank">
                    <div class="instagram_box">
                        <img src="{{ $feed->media_url }}" class="img-fluid lazy ">
                    </div>
                </a>
            </div>
        @empty
            @php
                $images = ['g1.jpg', 'g2.jpg', 'g3.jpg'];
                $boxes = 12;
            @endphp
            
            @for ($i = 0; $i < $boxes; $i++)
                <div>
                    <a class="insta_image" href="https://www.instagram.com/graphic.com.gh" target="blank">
                        <div class="instagram_box">
                            <img src="{{ asset('assets/frontend/img/'.$images[array_rand($images)]) }}" class="img-fluid lazy ">
                        </div>
                    </a>
                </div>
            @endfor
            
        @endforelse
        
    </section>
</div>
