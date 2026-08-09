
<div class="overflow-hidden space position-relative" id="about-sec" style="background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);">
    <div class="container">
        <div class="row gy-5 align-items-center">
            <div class="col-xl-5">
                <div class="position-relative">
                    <!-- Project Campus Image with 3D Border Glow -->
                    <div class="th--hover-item text-center">
                        <div class="overflow-hidden rounded-24 shadow-lg border border-2 border-white" style="border-radius: 28px; box-shadow: 0 25px 60px rgba(79, 70, 229, 0.15) !important;">
                            <img class="img-fluid w-100" src="/new-assets/img/vidya-campus_about_image.png" alt="Apex Horizon Institute Campus" style="transition: transform 0.6s ease;" onerror="this.onerror=null; this.src='/web-assets/img/normal/about_6_1.png';">
                        </div>
                    </div>

                    <!-- Floating 3D Stats Widget -->
                    <div class="gga-float" style="position: absolute; bottom: -20px; right: -15px; background: rgba(15, 23, 42, 0.92); backdrop-filter: blur(15px); color: white; padding: 18px 28px; border-radius: 24px; border: 1px solid rgba(255,255,255,0.2); box-shadow: 0 20px 45px rgba(0,0,0,0.35); z-index: 10;">
                        <div style="font-size: 1.8rem; font-weight: 800; color: #fbbf24;" class="d-flex align-items-center gap-2">
                            <i class="fas fa-award text-warning"></i> 35+ Years
                        </div>
                        <div style="font-size: 0.82rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e0; font-weight: 700;" class="mt-1">
                            Trusted Educational Excellence
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-7 pe-xl-5">
                <div class="about-wrap1">
                    <div class="title-area mb-30">
                        <span class="gga-badge mb-3">
                            <i class="fas fa-graduation-cap"></i> ABOUT Apex Horizon Institute
                        </span>
                        <h2 class="sec-title mb-3" style="font-size: clamp(1.8rem, 3.5vw, 2.7rem); font-weight: 800; line-height: 1.3; color: #0f172a;">
                            Leading Pioneer in Distance & Online <br />
                            <span class="gga-shimmer-text">Higher Education & Degrees</span>
                        </h2>
                        <p class="sec-text" style="font-size: 1.05rem; line-height: 1.75; color: #475569;">
                            {{ $about->subheading ?? 'Empowering students and working professionals across India with globally valid UGC, DEB, AIU recognized degree programs. Flexible learning, digital portal access, and affordable monthly EMI options.' }}
                        </p>
                    </div>

                    <div class="row g-3 mb-4">
                        @if (isset($about->multiple_points) && $about->multiple_points)
                            @php $cat = explode('@@@', $about->multiple_points); @endphp
                            @foreach ($cat as $abouts)
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start gap-3 p-3 rounded-16" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                                        <div style="width: 32px; height: 32px; border-radius: 50%; background: rgba(16, 185, 129, 0.15); color: #10b981; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 14px;">
                                            <i class="fas fa-check"></i>
                                        </div>
                                        <div style="font-weight: 700; color: #0f172a; font-size: 0.95rem; line-height: 1.4;">{{ $abouts }}</div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-3 p-3 rounded-16" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px;">
                                    <div style="width: 32px; height: 32px; border-radius: 50%; background: rgba(16, 185, 129, 0.15); color: #10b981; display: flex; align-items: center; justify-content: center; flex-shrink: 0;"><i class="fas fa-check"></i></div>
                                    <div style="font-weight: 700; color: #0f172a;">100% UGC, AIU & Government Approved</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-3 p-3 rounded-16" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px;">
                                    <div style="width: 32px; height: 32px; border-radius: 50%; background: rgba(16, 185, 129, 0.15); color: #10b981; display: flex; align-items: center; justify-content: center; flex-shrink: 0;"><i class="fas fa-check"></i></div>
                                    <div style="font-weight: 700; color: #0f172a;">24/7 Digital LMS Learning Access</div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="/about" class="btn btn-cyber-glow">
                            LEARN MORE ABOUT US &rarr;
                        </a>
                        <a href="#pop" data-bs-toggle="modal" data-bs-target="#pop" class="btn btn-outline-dark px-4 py-3 fw-bold rounded-pill">
                            Download Prospectus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

