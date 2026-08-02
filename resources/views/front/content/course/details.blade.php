@extends('front.layouts.main')
@section('title', $course->meta_title)
@section('description', $course->meta_description)
@if ($course->ld_schema)
    {!! $course->ld_schema !!}
@endif
@section('content')
    <section class="space-top space-extra-bottom overflow-hidden">
        <div class="container">
            <div class="row gx-40 gy-4">
                <div class="col-xxl-8 col-lg-7">
                    <div class="course-single mb-30">
                        <div class="course-single-top">

                            <h2 class="course-title">
                                {{ $course->name }}
                            </h2>
                            <p>{{ $course->short_content }}</p>


                            <div class="box-content">

                                <div class="course-info">
                                    <div class="box-icon">
                                        <i class="fal fa-user-graduate"></i>
                                    </div>

                                    <div class="course-info-details">
                                        <span class="course-info-title">Eligibility:</span>
                                        <h4 class="course-info-text">
                                            {{ $course->eligibilty }}
                                        </h4>
                                    </div>
                                </div>

                                <div class="course-info">
                                    <div class="box-icon">
                                        <i class="fal fa-clock"></i>
                                    </div>

                                    <div class="course-info-details">
                                        <span class="course-info-title">Duration:</span>
                                        <h4 class="course-info-text">
                                            {{ $course->duration }}
                                        </h4>
                                    </div>
                                </div>

                                <div class="course-info">
                                    <div class="box-icon">
                                        <i class="fal fa-indian-rupee-sign"></i>
                                    </div>

                                    <div class="course-info-details">
                                        <span class="course-info-title">Fees:</span>
                                        <h4 class="course-info-text">
                                            {{ $course->fees ?? 'Contact for details' }}
                                        </h4>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 col-lg-5">
                    <aside class="sidebar-area pt-0">
                        <div class="widget widget_info widget_course_info">
                            <div class="th-video">
                                <img src="/{{ $course->image }}" alt="{{ $course->alt }}" class="rounded shadow">

                            </div>

                            <div class="btn-wrap">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#pop"
                                    class="th-btn style-border2 w-100">INQUARY NOW
                                    <svg class="ms-2" width="16" height="14" viewBox="0 0 16 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.5264 0C7.5264 0.6962 8.21633 1.738 8.9138 2.61293C9.81193 3.7394 10.8838 4.72347 12.1137 5.4748C13.0351 6.0374 14.154 6.57747 15.0528 6.57747M7.5264 13.1712C7.5264 12.475 8.21633 11.4332 8.9138 10.5583C9.81193 9.43187 10.8838 8.44773 12.1137 7.6964C13.0351 7.1338 14.154 6.59373 15.0528 6.59373M15.0528 6.5856H0"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                    </svg></a>
                            </div>


                        </div>
                    </aside>
                </div>
            </div>
            <div class="row gx-40 gy-4">
                <div class="col-xxl-12 col-lg-12">
                    <div class="course-single mb-30">
                        <div class="course-single-top">
                            <h2 class="course-title">
                               About  {{ $course->name }}
                            </h2>

                            <p> {!!$course->content !!}</p>


                        </div>

                    </div>
                </div>

            </div>
        </div>
      </section>
      <div class="space">
    <div class="container">

        <div class="title-area text-center">
            <h2 class="sec-title th_fade_anim">
                <span class="th-text-perspective">
                    Frequently Asked Questions
                </span>
            </h2>
        </div>

        <div class="row gy-40 gx-80 justify-content-center justify-content-lg-start">
            <div class="col-lg-12">

   @if ($course->faqs->isNotEmpty())

                    <div class="accordion" id="faqAccordion">

                        @foreach($faqs as $index => $faq)
                            <div class="accordion-card style2 @if($index == 0) active @endif">

                                <div class="accordion-header" id="heading{{ $faq->id }}">

                                    <button
                                        class="accordion-button @if($index > 0) collapsed @endif"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $faq->id }}"
                                        aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $faq->id }}">

                                        {{ $faq->question }}

                                    </button>

                                </div>

                                <div
                                    id="collapse{{ $faq->id }}"
                                    class="accordion-collapse collapse @if($index == 0) show @endif"
                                    data-bs-parent="#faqAccordion">

                                    <div class="accordion-body">
                                        <p class="faq-text">
                                            {!! $faq->answer !!}
                                        </p>
                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                @else
                    <p class="text-center">No FAQs available.</p>
                @endif

            </div>
        </div>

    </div>
</div>
 </div>
       @endsection @section('script') @endsection
