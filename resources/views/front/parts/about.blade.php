
<div class="overflow-hidden space overflow-hidden" id="about-sec">
    <div class="container">
        <div class="row gy-50 align-items-center">
            <div class="col-xl-5">
                <div class="img-box1">

                    <div class="img1 th--hover-item th_fade_anim" style="position: relative;">
                        <div class="thumb th--hover-img" data-displacement="/web-assets/img/imghover/fluid.jpg"
                            data-intensity="0.2">
                            <img class="img-cover" src="/{{ $about->image }}" alt="About Goa Global Academy" onerror="this.onerror=null; this.src='/web-assets/img/default-course.svg';">
                        </div>
                        <!-- Floating Stats Card -->
                        <div class="gga-float" style="position: absolute; bottom: 20px; right: -10px; background: rgba(15, 23, 42, 0.9); backdrop-filter: blur(10px); color: white; padding: 15px 25px; border-radius: 16px; border: 1px solid rgba(255,255,255,0.2); box-shadow: 0 20px 40px rgba(0,0,0,0.3); z-index: 10;">
                            <div style="font-size: 1.5rem; font-weight: 800; color: #fbbf24;">35+ Years</div>
                            <div style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e0;">Trusted Educational Legacy</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="about-wrap1">
                    <div class="title-area mb-30">
                        <span class="sub-title th_fade_anim gga-badge">
                            <i class="fas fa-graduation-cap"></i> ABOUT GOA GLOBAL ACADEMY
                        </span>
                        <h2 class="sec-title th_fade_anim">
                            <span class="th-text-perspective gga-shimmer-text">Goa Global Academy of Higher Education</span>
                        </h2>
                        <p class="sec-text th_fade_anim">
                            {{ $about->subheading }}

                        </p>
                    </div>
                    <div class="checklist th_fade_anim">

                        @if ($about->multiple_points)
                            @php
                            $cat = explode('@@@', $about->multiple_points); @endphp
                            <ul>
                                @foreach ($cat as $abouts)
                                    <li><i class="flaticon-check"></i>{{ $abouts }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="btn-wrap mt-40 th_fade_anim">
                        <a href="/about" class="th-btn">LEARN MORE
                            <svg class="ms-2" width="16" height="14" viewBox="0 0 16 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.5264 0C7.5264 0.6962 8.21633 1.738 8.9138 2.61293C9.81193 3.7394 10.8838 4.72347 12.1137 5.4748C13.0351 6.0374 14.154 6.57747 15.0528 6.57747M7.5264 13.1712C7.5264 12.475 8.21633 11.4332 8.9138 10.5583C9.81193 9.43187 10.8838 8.44773 12.1137 7.6964C13.0351 7.1338 14.154 6.59373 15.0528 6.59373M15.0528 6.5856H0"
                                    stroke="currentColor" stroke-width="1.5"></path>
                            </svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
