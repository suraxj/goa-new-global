@extends('front.layouts.main')
@section('title', 'Blogs')
@section('description', 'Description')
@section('content')

    <div class="breadcumb-wrapper" data-bg-src="/web-assets/img/bg/breadcumb-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h2 class="breadcumb-title">Blog</h2>
                        <ul class="breadcumb-menu">
                            <li><a href="index.html">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="space overflow-hidden" id="blog-sec">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-12">
                    <div class="title-area text-center">
                        <h2 class="sec-title th_fade_anim">
                            <span class="th-text-perspective">Our Latest News & Blog</span>
                        </h2>
                    </div>
                </div>
               
            </div>
          <div class="slider-area">
    <div class="container">
        <div class="row g-4">

            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="th_fade_anim th--hover-item shadow-sm p-3 rounded h-100">
                        
                        <div class="blog-card">
                            <div class="blog-img">
                                <a class="th--hover-img" href="/blog/{{ $blog->slug }}">
                                    <img src="/{{ $blog->image }}" alt="{{ $blog->alt }}" class="img-fluid" />
                                </a>

                                <a class="blog-date" href="#">
                                    {{ $blog->created_at->format('d') }}
                                    <span class="year">
                                        {{ $blog->created_at->format('M, Y') }}
                                    </span>
                                </a>
                            </div>

                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="#">Learning</a>
                                    <a href="#">Education</a>
                                </div>

                                <h2 class="box-title">
                                    <a href="/blog/{{ $blog->slug }}">
                                        {{ Str::limit($blog->name, 60) }}
                                    </a>
                                </h2>

                                <p>{{ Str::limit($blog->short_content, 80) }}</p>

                                <a href="/blog/{{ $blog->slug }}" class="th-btn style4 btn-sm">
                                    READ MORE
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
        </div>
    </section>

@endsection
@section('script')

@endsection
