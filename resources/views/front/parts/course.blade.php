<section class="overflow-hidden space bg-smoke3" id="course-sec">

    <div class="container">
        <div class="title-area text-center">
            <h2 class="sec-title th_fade_anim">
                <span class="th-text-perspective">Our Featured Courses</span>
            </h2>
        </div>

        <!-- TABS BUTTON -->
        <div class="course-tab-wrap tab-menu1 filter-menu-active mb-60 th_fade_anim">

            <ul class="nav justify-content-center" role="tablist">
                @foreach ($categories as $index => $cat)
                    <li class="nav-item me-2 mb-2">
                        <button class="filter-btn tab-btn @if ($index == 0) active @endif"
                            data-bs-toggle="pill" data-bs-target="#cat{{ $cat->id }}" type="button">
                            {{ $cat->name }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- TAB CONTENT -->
        <div class="tab-content">

            @foreach ($categories as $index => $cat)
                <div class="tab-pane fade @if ($index == 0) show active @endif"
                    id="cat{{ $cat->id }}">

                    <div class="th-course-row columns-3 gy-4">

                        @if (isset($coursesByCategory[$cat->name]) && $coursesByCategory[$cat->name]->isNotEmpty())
                            @foreach ($coursesByCategory[$cat->name] as $course)
                                <div class="th-course-single th_fade_anim">

                                    <div class="course-card holographic-card">
                                        <div class="box-img">
                                            <a href="/course/{{ $course->slug }}">
                                                <img src="/{{ $course->image }}" alt="{{ $course->name }}" onerror="this.onerror=null; this.src='/web-assets/img/default-course.svg';">
                                            </a>
                                            <span class="box-price">{{ $course->fees }}</span>
                                        </div>

                                        <h3 class="box-title">
                                            <a href="/course/{{ $course->slug }}">
                                                {{$course->full_name }}
                                            </a>
                                        </h3>
                                        <p>{{ Str::limit($course->short_content, 100)}}</p>

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
                                                    <h4 class="course-info-text">{{$course->sub_courses_count}}</h4>
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
                            <p class="text-center fw-bold h5 text-secondary">No Course Found</p>
                        @endif

                    </div>

                </div>
            @endforeach

        </div>
    </div>
</section>
