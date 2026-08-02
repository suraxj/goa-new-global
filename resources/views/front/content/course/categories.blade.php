@extends('front.layouts.main')
@section('title', 'Courses')
@section('description', 'Description')
@section('content')

    <div class="breadcumb-wrapper" data-bg-src="/web-assets/img/bg/breadcumb-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h2 class="breadcumb-title">{{ $coursesmode->name }}
                        </h2>
                        <ul class="breadcumb-menu">
                            <li><a href="/">Home</a></li>
                            <li>
                                {{ $coursesmode->name }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="space overflow-hidden" id="category-sec">
        <div class="container">

            <div class="tab-content">

                @foreach ($categories as $index => $cat)
                    <div>

                        <div class="th-course-row columns-3 gy-4">

                            @if ($coursesByCategory[$cat->name]->isNotEmpty())
                                @foreach ($coursesByCategory[$cat->name] as $course)
                                    <div class="th-course-single th_fade_anim">

                                        <div class="course-card">
                                            <div class="box-img">
                                                <a href="/course/{{ $course->slug }}">
                                                    <img src="/{{ $course->image }}" alt="{{ $course->name }}">
                                                </a>
                                                <span class="box-price">{{ $course->fees }}</span>
                                            </div>

                                            <h3 class="box-title">
                                                <a href="/course/{{ $course->slug }}">
                                                    {{$course->full_name}}
                                                </a>
                                            </h3>

                                            <p>{{ \Illuminate\Support\Str::limit($course->short_content, 100) }}</p>

                                            <div class="box-content">
                                                <div class="course-info">
                                                    <div class="box-icon">
                                                        <i class="fal fa-file-lines"></i>
                                                    </div>
                                                    <div class="course-info-details">
                                                        <span class="course-info-title">Duration:</span>
                                                        <h4 class="course-info-text">{{ $course->duration }}</h4>
                                                    </div>
                                                </div>

                                                <div class="course-info">
                                                    <div class="box-icon">
                                                        <i class="fal fa-file-lines"></i>
                                                    </div>
                                                    <div class="course-info-details">
                                                        <span class="course-info-title">Specializations:</span>
                                                        <h4 class="course-info-text">{{ $course->sub_courses_count }}</h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="btn-wrap text-center">
                                                <a href="/course/{{ $course->slug }}" class="th-btn btn-sm style-border2">
                                                    VIEW DETAILS
                                                </a>
                                            </div>

                                        </div>

                                    </div>
                                @endforeach
                            @else
                            @endif

                        </div>

                    </div>
                @endforeach

            </div>
    </section>

@endsection
