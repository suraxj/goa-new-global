@extends('front.layouts.main')
@section('title', 'Home')
@section('description', 'Apex Horizon Institute of Higher Education - UGC, AIU & DEB Approved Distance & Online Degree Courses')
@section('content')
    <!-- HERO & BANNER -->
    <div class="position-relative overflow-hidden">
        @include('front.parts.banner')
    </div>

    <!-- STATS COUNTER BAR WITH MESH GRADIENT & SHAPE PATTERNS -->
    <div class="position-relative overflow-hidden bg-pattern-dots-sec gga-scroll-3d-up">
        @include('front.parts.counter')
    </div>

    <!-- ABOUT SECTION WITH GRADIENT DECORATION SHAPES -->
    <div class="position-relative overflow-hidden gga-scroll-3d-left">
        <img src="/web-assets/img/shape/about_shape1_1.png" alt="Decoration Shape" class="position-absolute top-0 end-0 opacity-25 gga-float-slow d-none d-lg-block" style="max-height: 250px; pointer-events: none; z-index: 1;">
        @include('front.parts.about')
    </div>

    <!-- 3D FLIP CARD BENEFITS -->
    <div class="position-relative overflow-hidden bg-mesh-glow-sec py-2 gga-scroll-3d-up">
        @include('front.parts.flip-benefits')
    </div>

    <!-- SMART CALCULATOR WITH DARK NEON BACKGROUND -->
    <div class="position-relative overflow-hidden gga-scroll-3d-right">
        @include('front.parts.calculator')
    </div>

    <!-- SERVICES MATRIX WITH PATTERN DOTS -->
    <div class="position-relative overflow-hidden bg-pattern-dots-sec gga-scroll-3d-up">
        <img src="/web-assets/img/shape/course_shape9_1.png" alt="Shape overlay" class="position-absolute bottom-0 start-0 opacity-20 d-none d-md-block" style="max-height: 180px; pointer-events: none;">
        @include('front.parts.service')
    </div>

    <!-- ACCREDITED COURSES SHOWCASE -->
    <div class="position-relative overflow-hidden gga-scroll-3d-up">
        @include('front.parts.course')
    </div>

    <!-- ACCREDITATION & UNIVERSITY PARTNERS WITH CONTINUOUS GLOW MARQUEE -->
    <div class="position-relative overflow-hidden bg-light py-2 gga-scroll-3d-up">
        @include('front.parts.approval')
        @include('front.parts.uni')
    </div>

    <!-- ADMISSION ROADMAP PROCESS -->
    <div class="position-relative overflow-hidden gga-scroll-3d-up">
        @include('front.parts.process')
    </div>

    <!-- CAREER DREAM COUNSELOR BANNER -->
    <div class="position-relative overflow-hidden gga-scroll-3d-zoom">
        @include('front.parts.dream')
    </div>

    <!-- STUDENT TESTIMONIAL REVIEWS -->
    <div class="position-relative overflow-hidden bg-pattern-dots-sec gga-scroll-3d-up">
        @include('front.parts.testimonial')
    </div>

    <!-- NEWS & ARTICLES BLOGS -->
    <div class="position-relative overflow-hidden gga-scroll-3d-up">
        @include('front.parts.blog')
    </div>

    <!-- FREQUENTLY ASKED QUESTIONS ACCORDION -->
    <div class="position-relative overflow-hidden bg-light gga-scroll-3d-up">
        @include('front.parts.faq')
    </div>

    <!-- CALL TO ACTION & FLOATING WIDGETS -->
    <div class="position-relative overflow-hidden gga-scroll-3d-up">
        @include('front.parts.cta')
        @include('front.parts.floating-contact')
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Hero Live Course Search
            $('#bannerSearch').on('input', function() {
                let searchVal = $(this).val();
                if(searchVal.length > 1) {
                    $.ajax({
                        type: 'GET',
                        url: '/getSearchResults',
                        data: { search_val: searchVal },
                        success: function(data) {
                            $('#resultDiv').html(data).removeClass('d-none');
                        }
                    });
                } else {
                    $('#resultDiv').addClass('d-none');
                }
            });

            $(document).on('click', function(e) {
                if (!$(e.target).closest('#bannerSearch, #resultDiv').length) {
                    $('#resultDiv').addClass('d-none');
                }
            });

            // 3D SCROLL REVEAL INTERSECTION OBSERVER
            const observerOptions = {
                root: null,
                rootMargin: '0px 0px -80px 0px',
                threshold: 0.15
            };

            const scrollElements = document.querySelectorAll('.gga-scroll-3d-up, .gga-scroll-3d-left, .gga-scroll-3d-right, .gga-scroll-3d-zoom');

            const observer = new IntersectionObserver((entries, observerInstance) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('gga-visible');
                        observerInstance.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            scrollElements.forEach(el => observer.observe(el));

            // 3D MOUSE MOVE TILT EFFECT FOR CARDS (DESKTOP ONLY)
            if (window.innerWidth > 991) {
                const tiltCards = document.querySelectorAll('.holographic-card, .process-card-premium, .service-card-3d, .counter-box-3d');
                tiltCards.forEach(card => {
                    card.addEventListener('mousemove', function(e) {
                        const rect = card.getBoundingClientRect();
                        const x = e.clientX - rect.left - rect.width / 2;
                        const y = e.clientY - rect.top - rect.height / 2;
                        const rotateX = (-y / rect.height) * 12;
                        const rotateY = (x / rect.width) * 12;
                        card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px) scale(1.02)`;
                    });

                    card.addEventListener('mouseleave', function() {
                        card.style.transform = '';
                    });
                });
            }

            // MOBILE TOUCH CARD FLIP EVENT
            const flipWrappers = document.querySelectorAll('.flip-card-wrapper');
            flipWrappers.forEach(w => {
                w.addEventListener('click', function() {
                    w.classList.toggle('touch-flipped');
                });
            });

            // COURSE CATEGORY TAB ACTIVE TOGGLE
            $('.course-tab-btn').on('click', function() {
                $('.course-tab-btn').removeClass('btn-cyber-glow').addClass('btn-outline-dark fw-bold rounded-pill px-4 py-2');
                $(this).addClass('btn-cyber-glow').removeClass('btn-outline-dark');
            });
        });
    </script>
@endsection


