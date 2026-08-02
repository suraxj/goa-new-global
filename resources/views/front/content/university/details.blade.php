@extends('front.layouts.main')
@section('title', $university->meta_title)
@section('description', $university->meta_description)
@section('scripts')
@if ($university->ld_schema)
    {!! $university->ld_schema !!}
@endif
@endsection
@section('content')
 
    <section class="services__details-area pt-50 pb-50 bg-light">
        <div class="container">
            <div class="services__details-inner">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center mb-3">

                            <div class="sidebar__logo text-start ms-2 m-0">
                                <a href="#"><img src="/{{ $university->logo }}" alt="{{ $university->logo_alt }}"
                                        width="120" class="img-fluid card p-2"></a>
                            </div>
                            <h1 class="ms-2">{{$university->name}}</h1>
                        </div>

                        <p>{{ $university->short_content }}</p>
                        @if ($university->approvals->isNotEmpty())
                            <div class="swiper brand-active fix">
                                <div class="swiper-wrapper">
                                    @foreach ($university->approvals as $approval)
                                        <div class="swiper-slide card p-2 mb-4">
                                            <div class="brand__item">
                                                <img src="/{{ $approval->image }}" alt="{{ $approval->name }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                       
                        <a href="#" data-bs-toggle="modal" data-bs-target="#pop" class="btn">Get Counselling<img
                                src="/web-assets/img/icon/right_arrow.svg" alt="" class="injectable"></a>
                        @if ($university->brochure)
                            <a class="btn" href="/{{$university->brochure}}" download >
                                Download Brochure<i class="fa-solid fa-download ms-1"></i>
                            </a>
                        @endif
                        @if ($university->sample_certificate)
                            <a class="btn" href="/{{$university->sample_certificate}}" target="_blank">Sample
                                Certificate<i class="fa-solid fa-file-certificate"></i>
                            </a>
                        @endif

                    </div>
                    <div class="col-md-4">
                        <div class="position-absolute uni-logo mt-2 ms-2">
                            <img src="/{{ $university->logo }}" alt="{{ $university->logo_alt }}" width="120"
                                class="img-fluid card p-2">
                        </div>
                        <img src="/{{ $university->image }}" class="img-fluid position-relative" alt="">
                        {{-- <aside class="services__sidebar">
                            <div class="services__widget services__widget-three">
                                <h4 class="sidebar__widget-title">Overview</h4>
                                <div class="sidebar__brochure">
                                    <img src="/{{ $university->image }}" class="img-responsive rounded mb-4"
                                        alt="{{ $university->alt }}">
                                    <div class="over_flow">
                                        <p><i class="flaticon-location-1"></i> {{ $university->location }},
                                            <span>{{ $university->courses_count }} Courses Available</span>
                                        </p>
                                        @if ($university->courses->isNotEmpty())
                                            @foreach ($university->courses as $course)
                                                <a href="/course/{{ $course->slug }}" target="_blank" download="">
                                                    <img src="/web-assets/img/icon/pdf.svg" alt=""
                                                        class="injectable">
                                                    {{ $course->name }}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>


                                </div>
                            </div>
                        </aside> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5">
        <div class="container">
            <p class="h3 fw-bold text-black mb-4 text-center">Courses Offered by <span class="main">{{$university->name}} ({{$assign_course->count()}})</span> </p>
            <div class="">
                <div class="swiper project-active-two overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach ($assign_course as $course)
                            <div class="swiper-slide"> 
                                <div class="card overflow-hidden">
                                    <img src="/{{ $course->image }}" class="img-fluid" alt="" style="height: 180px; object-fit:cover; object-position: center; ">
                                    <div class="card-body ">
                                        <p class="fw-bold mb-0"><i class="fa-solid fa-user-graduate me-1"></i><a
                                                href="/course/{{ $course->slug }}">{{ $course->name }}</a></p>
                                        <p><i class="fa-solid fa-calendar-days me-1"></i>{{ $course->duration }}</p>
                                        <div class="d-flex justify-content-center">
                                            <a href="/course/{{ $course->slug }}" class="btn  btn-sm">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </div>
    </section>
    <section class="services__details-area pt-20 pb-40">
        <div class="container">
            <div class="services__details-inner card p-3 border-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="services__details-content">
                            <h2 class="title">More about {{ $university->name }}</h2>
                            <p> {!! $university->content !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @if ($similarUnis->isNotEmpty())
        <div class="brand__area" style="background:#c9e3f7;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title text-center mb-30">
                            <span class="sub-title">Similar Universities</span>
                            <h2 class="title">Also Explore another Option</h2>
                        </div>
                    </div>
                </div>
                <div class="swiper brand-active fix">
                    <div class="swiper-wrapper">
                        @foreach ($similarUnis as $uni)
                            <div class="swiper-slide ">
                                <div class="card card-body">
                                <a href="/university/{{ $uni->slug }}">
                                    <div class="brand__item">
                                        <img src="/{{ $uni->logo }}" alt="{{ $uni->logo_alt }}" class="img-fluid">
                                    </div>
                                </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- faq --}}
    @if ($university->faqs->isNotEmpty())
        <section class="pb-40">
            <div class="container">
                <div class="col-md-12">
                    <div class="services__details-benefit">
                        <h2 style="font-size: 24px;" class="mb-3">Frequently Asked Questions about
                            {{ $university->name }}</h2>
                        <div class="faq__wrap">
                            <div class="accordion" id="accordionExample">
                                @foreach ($university->faqs as $index => $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button
                                                class="accordion-button @if ($index > 0) collapsed @endif"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false"
                                                aria-controls="collapseOne">
                                                {{ $faq->question }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $faq->id }}"
                                            class="accordion-collapse collapse @if ($index == 0) show @endif"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p> {!! $faq->answer !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
               @endif
           </div>
    </section>
    {{-- end faq --}}

    {{-- @include('front.parts.cta') --}}
@endsection
@section('script')
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            centeredSlides: false,
            spaceBetween: 10,
            loop: true,
            autoplay: {
                delay: 2000,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>
@endsection
