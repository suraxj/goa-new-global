
<section class="testi-area-2 space overflow-hidden" id="testi-sec">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title text-theme th_fade_anim"><img src="/web-assets/img/icon/subtitle-icon1-1.svg"
                    alt="img" />Testimonials</span>
            <h2 class="sec-title th_fade_anim">
                <span class="th-text-perspective">Students Say’s About us!</span>
            </h2>
        </div>
        <div class="testi-slider2 slider-area">
            <div class="swiper th-slider has-shadow" id="testiSlide2"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}},"autoHeight": "true"}'>
                <div class="swiper-wrapper">

                    @foreach ($testimonial as $text)
                        <div class="swiper-slide th_fade_anim">
                            <div class="testi-card2">

                                <div class="box-icon">
                                    <img src="/web-assets/img/icon/quote2.svg" alt="icon" />
                                </div>

                                <h3 class="box-title">
                                    {{ Str::limit($text->content, 40) }}
                                </h3>

                                <p class="box-text">
                                    {{ $text->content }}
                                </p>

                                <div class="testi-review-wrap">
                                    <span class="testi-card_review">
                                        @for ($i = 0; $i < $text->rating; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </span>

                                    <span class="rating-title">
                                        {{ $text->rating }} / 5
                                    </span>
                                </div>

                                <div class="testi-card-profile">
                                    <div class="box-thumb">
                                        <img class="testimonial-img img-fluid" src="/{{ $text->image }}"
                                            alt="{{ $text->name }}"
                                            style="height: 40px; width: 40px; object-fit: cover; border-radius: 50%;"
                                            onerror="this.onerror=null; this.src='/web-assets/img/default-avatar.svg';">
                                    </div>


                                    <div class="media-left">
                                        <h4 class="testi-card_name">{{ $text->name }}</h4>
                                        <span class="testi-card_desig">
                                            {{ $text->course->name ?? 'Student' }}
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <button data-slider-prev="#testiSlide2" class="slider-arrow style3 slider-prev">
                <i class="far fa-arrow-left"></i>
            </button>
            <button data-slider-next="#testiSlide2" class="slider-arrow style3 slider-next">
                <i class="far fa-arrow-right"></i>
            </button>
        </div>
    </div>
</section>
