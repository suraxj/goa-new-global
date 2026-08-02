<div class="card-body p-2 resultCard">
    @if($blogs->isNotEmpty()||$courses->isNotEmpty()||$universities->isNotEmpty())
    @foreach($blogs as $blog)
    <a href="/blog/{{$blog->slug}}" class="d-flex align-items-center justify-content-start w-100 px-2">
        <p class="lh-1 fw-semibold mb-0 fa fa-blog me-2"> </p>
        <div class="ms-2">
            <p class="mb-0 lh-1 fw-semibold">{{$blog->name}}</p>
            <span class="lh-1 fs-12">Blog</span>
        </div>
    </a>
    @endforeach
    @foreach($courses as $course)
    <a href="/course/{{$course->slug}}" class="d-flex align-items-center justify-content-start w-100 px-2">
        <p class="fw-semibold mb-0 lh-1 fa fa-graduation-cap me-2"> </p>
        <div class="ms-2">
            <p class="mb-0 lh-1 fw-semibold">{{$course->name}}</p>
            <span class="lh-1 fs-12">Course</span>
        </div>
    </a>
    @endforeach
    @foreach($universities as $uni)
    <a href="/university/{{$uni->slug}}" class="d-flex align-items-center justify-content-start w-100 px-2">
        <p class="fw-semibold lh-1 mb-0 fa fa-building-columns me-2"> </p>
        <div class="ms-2">
            <p class="mb-0 lh-1 fw-semibold">{{$uni->name}}</p>
            <span class="lh-1 fs-12">University</span>
        </div>
    </a>
    @endforeach
    @else
    <p class="text-center text-secondary pt-4">
        No result found
    </p>
    @endif
</div>
