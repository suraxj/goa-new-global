@extends('front.layouts.main')

@section('content')
@section('title', 'Courses')
@section('description','Description')
@section('content')

<section class="breadcumb-section">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="breadcumb-wrap">
                    <span>All Courses</span>
                    <h1>Top Courses</h1>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>course</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section_space">
    <div class="container">
        <ul class="nav nav-pills mb-3 justify-content-between justify-content-md-center program-pills" id="pills-tab" role="tablist">
            @foreach($categories as $index => $cat)
            <li class="nav-item" role="presentation">
                <button class="nav-link @if($index === 0) active @endif" id="pills-{{$cat->slug}}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{$cat->slug}}" type="button" role="tab" aria-controls="pills-{{$cat->slug}}" aria-selected="true"><i class="fa fa-book-bookmark me-2"></i>{{$cat->name}} Programs</button>
            </li>
            @endforeach
        </ul>
        <div class="tab-content" id="pills-tabContent">
            @foreach($categories as $index => $cat)
            <div class="tab-pane fade @if($index === 0) show active @endif" id="pills-{{$cat->slug}}" role="tabpanel" aria-labelledby="pills-{{$cat->slug}}-tab" tabindex="0">
                <div class="row justify-content-center">
                    @if($coursesByCategory[$cat->name]->isNotEmpty())
                    @foreach($coursesByCategory[$cat->name] as $course)
                    <div class="col-md-3">
                        <div class="course-card rounded-10 shadow card overflow-hidden">
                            <div class="shape">
                                <svg width="51" height="51" viewBox="0 0 51 51" fill="none">
                                    <path d="M0.5 0H51V51L25.4333 25.5L0.5 0Z"></path>
                                </svg>
                            </div>
                            <div class="card-body">
                                <div class="card-front">
                                    <img src="/{{$course->image}}" class="img-fluid rounded-10 mb-2" alt="{{$course->alt}}">
                                    <div class="d-flex justify-content-between">
                                        <p class="badge mb-1 text-end bg-success text-white"><i class="fa fa-clock me-1"></i>{{$course->duration}}</p>
                                        <p class="badge mb-1 text-end bg-primary text-white"><i class="fa fa-sack-dollar me-1"></i>{{$course->fees}}</p>
                                    </div>
                                    <p class="h4 text-center fw-bold text-black">{{$course->name}}</p>
                                    <div class="d-flex justify-content-between border-top border-bottom">
                                        <p class="my-2">{{$course->sub_courses_count}} Specializations</p>
                                        <p class="my-2">5 Universities</p>
                                    </div>
                                </div>
                                <div class="card-back rounded-10">
                                    <p class="h4 text-center fw-bold text-black">{{$course->name}}</p>
                                    <div class="d-flex justify-content-between">
                                        <p class="badge mb-1 text-end bg-success text-white"><i class="fa fa-clock me-1"></i>{{$course->duration}}</p>
                                        <p class="badge mb-1 text-end bg-primary text-white"><i class="fa fa-sack-dollar me-1"></i>{{$course->fees}}</p>
                                    </div>
                                    <p class="text-justify">{{Str::limit($course->short_content,20)}}</p>
                                    <a href="/course/{{$course->slug}}" class="btn_primary">Explore Course <i class="fa fa-chevron-right txt-primary rounded ms-1 bg-white p-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p class="text-center fw-bold h4 text-secondary">No Course Found</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@include('front.parts.cta')
@endsection
@section('script')
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
@endsection