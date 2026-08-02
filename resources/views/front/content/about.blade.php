@extends('front.layouts.main')
@section('title', 'About')
@section('description', 'Description')
@section('content')

    <section class="breadcrumb__area breadcrumb__bg" data-background="/web-assets/main/breadcumb-bg.jpg">
        <div class="breadcumb-wrapper" data-bg-src="/web-assets/img/bg/breadcumb-bg.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcumb-content">
                            <h2 class="breadcumb-title">About Us</h2>
                            <ul class="breadcumb-menu">
                                <li><a href="/">Home</a></li>
                                <li>About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="overflow-hidden space overflow-hidden" id="about-sec">
        <div class="container">
            <div class="row gy-50 align-items-center">
                <div class="col-xl-5">
                    <div class="img-box1">

                        <div class="img1 th--hover-item th_fade_anim">
                            <div class="thumb th--hover-img" data-displacement="/web-assets/img/imghover/fluid.jpg"
                                data-intensity="0.2">
                                <img class="img-cover" src="/{{ $about->image }}" alt="About">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-7">
                    <div class="about-wrap1">
                        <div class="title-area mb-30">
                            <span class="sub-title th_fade_anim"><img src="/web-assets/img/icon/subtitle-icon1-1.svg"
                                    alt="img" />
                                ABOUT OUR COLLEGE</span>
                            <h2 class="sec-title th_fade_anim">
                                <span class="th-text-perspective">{{ $about->heading }}</span>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class=" space-extra-bottom overflow-hidden">
        <div class="container">
            <div class="row gx-40 gy-4">

                <div class="col-xxl-12 col-lg-12">
                    <div class="course-single mb-30">

                        <div class="course-single-bottom">

                            <ul class="nav course-tab" id="courseTab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#vision">
                                        <i class="fa-regular fa-eye"></i> Vision
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#mission">
                                        <i class="fa-regular fa-bullseye"></i> Mission
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#goals">
                                        <i class="fa-regular fa-flag"></i> Goals
                                    </a>
                                </li>

                            </ul>

                            <div class="tab-content">

                                <!-- Vision -->
                                <div class="tab-pane fade show active" id="vision">
                                    <div class="course-description">
                                        <h5 class="h5 mb-4">Vision</h5>
                                        <p>
                                            To be a leading institution in correspondence education in Goa, providing
                                            quality, flexible, and accessible learning opportunities that empower students
                                            to achieve academic excellence and professional success.
                                        </p>
                                    </div>
                                </div>

                                <!-- Mission -->
                                <div class="tab-pane fade" id="mission">
                                    <div class="course-description">
                                        <h5 class="h5 mb-4">Mission</h5>
                                        <ul>
                                            <li>To provide accessible and affordable education.</li>
                                            <li>To promote flexible learning opportunities.</li>
                                            <li>To develop skilled and industry-ready professionals.</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Goals -->
                                <div class="tab-pane fade" id="goals">
                                    <div class="course-description">
                                        <h5 class="h5 mb-4">Goals</h5>
                                        <ul>
                                            <li>Enhance academic excellence and curriculum quality.</li>
                                            <li>Support student career growth and higher education.</li>
                                            <li>Improve digital learning and engagement.</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- TABS END -->

                    </div>
                </div>



            </div>
        </div>
    </section>


@endsection
