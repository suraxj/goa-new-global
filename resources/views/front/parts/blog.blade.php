
<section class="space bg-smoke2 overflow-hidden" id="blog-sec">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center align-items-center">
            <div class="col-lg-7">
                <div class="title-area text-lg-start text-center">
                    <span class="sub-title th_fade_anim"><img src="/web-assets/img/icon/subtitle-icon1-1.svg"
                            alt="img" />NEWS & BLOGS</span>
                    <h2 class="sec-title th_fade_anim">
                        <span class="th-text-perspective">Our Latest News & Blog</span>
                    </h2>
                </div>
            </div>
            <div class="col-auto">
                <div class="sec-btn th_fade_anim">
                    <a href="/blog" class="th-btn">VIEW ALL BLOG <svg class="ms-2" width="16" height="14"
                            viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.5264 0C7.5264 0.6962 8.21633 1.738 8.9138 2.61293C9.81193 3.7394 10.8838 4.72347 12.1137 5.4748C13.0351 6.0374 14.154 6.57747 15.0528 6.57747M7.5264 13.1712C7.5264 12.475 8.21633 11.4332 8.9138 10.5583C9.81193 9.43187 10.8838 8.44773 12.1137 7.6964C13.0351 7.1338 14.154 6.59373 15.0528 6.59373M15.0528 6.5856H0"
                                stroke="currentColor" stroke-width="1.5"></path>
                        </svg></a>
                </div>
            </div>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider has-shadow" id="blogSlider1"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}}, "autoHeight": "true"}'>

                <div class="swiper-wrapper">
                    @foreach ($blogs as $blog)
                        <div class="swiper-slide th_fade_anim th--hover-item shadow-sm p-3 rounded">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <a class="th--hover-img" href="/blog/{{ $blog->slug }}">
                                        <img src="/{{ $blog->image }}" alt="{{ $blog->alt }}" onerror="this.onerror=null; this.src='/web-assets/img/default-course.svg';" />
                                    </a>

                                    <a class="blog-date" href="#">
                                        {{ $blog->created_at->format('d') }}
                                        <span class="year">
                                            {{ $blog->created_at->format('M, Y') }}
                                        </span>
                                    </a>
                                </div>

                                <div class="blog-content">
                                   
                                    <h2 class="box-title">
                                        <a href="/blog/{{ $blog->slug }}">
                                            {{ Str::limit($blog->name, 60) }}
                                        </a>
                                    </h2>
                                                                <p>{{ Str::limit($blog->short_content, 80) }}</p>

                                    <a href="/blog/{{ $blog->slug }}" class="th-btn style4 btn-sm">
                                        READ MORE
                                        <svg class="ms-2" width="16" height="14" viewBox="0 0 16 14">
                                            <path
                                                d="M7.5264 0C7.5264 0.6962 8.21633 1.738 8.9138 2.61293C9.81193 3.7394 10.8838 4.72347 12.1137 5.4748C13.0351 6.0374 14.154 6.57747 15.0528 6.57747M7.5264 13.1712C7.5264 12.475 8.21633 11.4332 8.9138 10.5583C9.81193 9.43187 10.8838 8.44773 12.1137 7.6964C13.0351 7.1338 14.154 6.59373 15.0528 6.59373M15.0528 6.5856H0"
                                                stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
<!-- blog-post-area-end -->
