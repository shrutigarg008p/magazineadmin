<div class="container">
    <div class="heading_arrow_group">
         <a href="{{url('categories/listing')}}">
        <h1 class="common_heading link_list">Topics to Follow</h1>
    </a>
        <a href="{{url('categories/listing')}}"><img src="{{ asset('assets/frontend/img/icon-next.png') }}" alt=""></a>
    </div>
    <section class="regular slider newspaper_slider popular_cat_slider mb-4">

        <?php
        $colors = array('rose_c','aquamarine_c','skyblue_c','pantone_c','grey_c','blue_c');
        $i=0;
      
        ?>
        @foreach($categories as $catDatas)
        @if(Auth::user())
        <div>
            <a class="popular_cat_image" href="{{url("categories/$catDatas->id/details")}}">

                <div class="pcategories_box <?=$colors[$i]; ?>">
                    {{$catDatas->name}}
                </div>
            </a>
        </div>
        @else
         <a class="popular_cat_image" href="{{route('login')}}">

                <div class="pcategories_box <?=$colors[$i]; ?>">
                    {{$catDatas->name}}
                </div>
            </a>
        @endif
        <?php
        $i++;
        if(count($colors) == $i){
            $i=0;
        }
        ?>
        @endforeach
     
    </section>
</div>
