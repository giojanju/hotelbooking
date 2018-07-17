<div class="swiper-container">
    <div class="swiper-wrapper">
        <!-- <div class="swiper-slide" style="background-image: url('https://i.ytimg.com/vi/QX4j_zHAlw8/maxresdefault.jpg')"></div> -->
       	@if($_sliders->count())
       	 	@foreach($_sliders as $slider)	
       	 		<div class="swiper-slide" style="background-image: url('{{ asset($slider->getFirstMediaUrl()) }}')"></div>
       	 	@endforeach
       	@endif
    </div>

    <div class="swiper-pagination"></div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>