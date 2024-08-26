<section class="lazy slider home_banner blog_slider" data-sizes="50vw">
   @foreach($slider as $blogs)
   <div>
      <div class="inner_group">
         @if(Auth::user())
         <a class="blog_image" href="{{url("blog/$blogs->id/details")}}">
            <?php 
               if(strpos("$blogs->content_image","https")!==false)
               {
               
               ?>  
            <img src="{{ !empty($blogs->content_image) ? asset($blogs->content_image) :  asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy " referrerpolicy="no-referrer" style="width:1349px;height: 540px;">
            <?php }else{ ?>
            <img src="{{ !empty($blogs->content_image) ? asset("storage/".$blogs->content_image) :  asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy " referrerpolicy="no-referrer"  style="width:1349px;height: 540px;">
            <?php } ?>
            <div class="banner_content">
               {{-- 
               <p class="banner_date"><span class="breaking_news">Breaking News</span>{{$blogs->created_at->format('Y-m-d')}}</p>
               --}}
               <p class="banner_text">{{$blogs->title}}</p>
            </div>
         </a>
         @else
         <a class="blog_image" href="{{route('login')}}">
            <?php 
               if(strpos("$blogs->content_image","https")!==false)
               {
               
               ?>  
            <img src="{{ !empty($blogs->content_image) ? asset($blogs->content_image) :  asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy " referrerpolicy="no-referrer" style="width:1349px;height: 540px;">
            <?php }else{ ?>
            <img src="{{ !empty($blogs->content_image) ? asset("storage/".$blogs->content_image) :  asset('assets/frontend/img/ts1.jpg') }}" class="img-fluid lazy " referrerpolicy="no-referrer"  style="width:1349px;height: 540px;">
            <?php } ?>
            {{-- <img src="{{ asset('assets/frontend/img/banner.jpg') }}" class="img-fluid lazy "> --}}
            <div class="banner_content">
               {{-- 
               <p class="banner_date"><span class="breaking_news">Breaking News</span>{{$blogs->created_at->format('Y-m-d')}}</p>
               --}}
               <p class="banner_text">{{$blogs->title}}</p>
            </div>
         </a>
         @endif
      </div>
   </div>
   @endforeach 
</section>