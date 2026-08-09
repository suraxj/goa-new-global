<section class="overflow-hidden space position-relative" id="course-sec" style="background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);">
    <div class="container">
        <div class="title-area text-center mb-5">
            <span class="gga-badge mb-2">
                <i class="fas fa-graduation-cap"></i> POPULAR DEGREE & DIPLOMA PROGRAMS
            </span>
            <h2 class="sec-title mb-3" style="font-size: clamp(2rem, 3.5vw, 2.7rem); font-weight: 800; color: #0f172a;">
                Explore Our <span class="gga-shimmer-text">Accredited Courses</span>
            </h2>
            <p class="text-muted max-w-2xl mx-auto" style="max-width: 650px; font-size: 1.05rem;">
                Select your preferred discipline below to browse recognized undergraduate, postgraduate, and open schooling programs.
            </p>
        </div>

        <!-- CATEGORY TABS -->
        <div class="d-flex justify-content-center flex-wrap gap-2 mb-5">
            @foreach ($categories as $index => $cat)
                <button class="btn course-tab-btn @if ($index == 0) btn-cyber-glow @else btn-outline-dark fw-bold rounded-pill px-4 py-2 @endif"
                    data-bs-toggle="pill" data-bs-target="#cat{{ $cat->id }}" type="button" style="border-radius: 50px;">
                    {{ $cat->name }}
                </button>
            @endforeach
        </div>

        <!-- TAB CONTENT -->
        <div class="tab-content">
            @foreach ($categories as $index => $cat)
                <div class="tab-pane fade @if ($index == 0) show active @endif" id="cat{{ $cat->id }}">
                    <div class="row gy-4">
                        @if (isset($coursesByCategory[$cat->name]) && $coursesByCategory[$cat->name]->isNotEmpty())
                            @foreach ($coursesByCategory[$cat->name] as $course)
                                <div class="col-lg-4 col-md-6">
                                    <div class="holographic-card h-100 d-flex flex-column justify-content-between p-4 shadow-sm" style="background: #ffffff; border-radius: 24px; border: 1px solid #e2e8f0;">
                                        <div>
                                            <!-- Course Banner Image -->
                                            <div class="position-relative overflow-hidden mb-3" style="border-radius: 16px; height: 190px;">
                                                <a href="/course/{{ $course->slug }}">
                                                    <img src="/{{ $course->image }}" alt="{{ $course->name }}" class="w-100 h-100 object-fit-cover" style="transition: transform 0.5s ease;" onerror="this.onerror=null; this.src='/new-assets/img/courses/bcom_banner.png';">
                                                </a>
                                                <span class="position-absolute top-0 end-0 bg-warning text-dark font-weight-bold px-3 py-1 m-2 rounded-pill shadow-sm" style="font-size: 0.82rem;">
                                                    {{ $course->fees ?? 'Flexible Fees' }}
                                                </span>
                                                <span class="position-absolute bottom-0 start-0 bg-dark bg-opacity-75 text-white px-3 py-1 m-2 rounded-pill font-weight-bold small" style="backdrop-filter: blur(4px);">
                                                    <i class="fas fa-clock text-warning me-1"></i> {{ $course->duration ?? 'Multi-Year' }}
                                                </span>
                                            </div>

                                            <h3 style="font-size: 1.3rem; font-weight: 800; color: #0f172a;" class="mb-2">
                                                <a href="/course/{{ $course->slug }}" class="text-decoration-none text-dark hover-primary">
                                                    {{ $course->full_name }}
                                                </a>
                                            </h3>

                                            <p style="color: #64748b; font-size: 0.92rem; line-height: 1.6;" class="mb-3">
                                                {{ Str::limit($course->short_content, 110) }}
                                            </p>
                                        </div>

                                        <div class="pt-3 border-top border-secondary border-opacity-10 d-flex align-items-center justify-content-between">
                                            <span class="text-muted font-weight-bold small">
                                                <i class="fas fa-layer-group text-primary me-1"></i> {{ $course->sub_courses_count }} Specializations
                                            </span>
                                            <a href="/course/{{ $course->slug }}" class="btn btn-sm btn-cyber-glow px-3 py-2" style="font-size: 0.85rem;">
                                                Details &rarr;
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center py-5">
                                <h4 class="text-muted font-weight-bold">No Courses Found in this Category</h4>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

