 <div class="space-top overflow-hidden brand-area-4 pb-5">
     <div class="container">
         <div class="brand-wrap1 text-center">
             <h3 class="brand-wrap-title th_fade_anim">
                 <span class="th-text-perspective gga-shimmer-text">Recognized & Approved Accreditations</span>
             </h3>
             <div class="swiper th-slider has-shadow" id="testiSlide2"
                 data-slider-options='{
    "loop": true,
    "speed": 3000,
    "autoplay": {
        "delay": 0,
        "disableOnInteraction": false
    },
    "freeMode": true,
    "freeModeMomentum": false,
    "breakpoints":{
        "0":{"slidesPerView":2,"spaceBetween":20},
        "576":{"slidesPerView":2,"spaceBetween":20},
        "768":{"slidesPerView":3,"spaceBetween":25},
        "992":{"slidesPerView":4,"spaceBetween":30},
        "1200":{"slidesPerView":5,"spaceBetween":30}
    },
    "autoHeight": true
}'>
                 <div class="swiper-wrapper">
                     @foreach ($approvals as $approval)
                         <div class="swiper-slide">
                             <a href="#" class="brand-box"><img src="/{{ $approval->image }}"
                                     alt="{{ $approval->name }}" onerror="this.onerror=null; this.src='/web-assets/img/default-course.svg';" /></a>
                         </div>
                     @endforeach

                 </div>
             </div>
         </div>
     </div>
 </div>
