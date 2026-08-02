@extends('front.layouts.main')
@section('scripts')
    @if ($blog->ld_schema)
        {!! $blog->ld_schema !!}
    @endif
@endsection
@section('content')
@section('title', $blog->meta_titel ? $blog->meta_titel : $blog->name)
@section('description', $blog->meta_description ? $blog->meta_description : $blog->short_content)

@section('content')

    <div class="breadcumb-wrapper" data-bg-src="/web-assets/img/bg/breadcumb-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h2 class="breadcumb-title">{{ $blog->name }}</h2>
                        <ul class="breadcumb-menu">
                            <li><a href="/">Home</a></li>
                            <li>
                                {{ $blog->name }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="th-blog-wrapper blog-details space-top space-extra-bottom">
        <div class="container">
            <div class="row gx-40">
                <div class="col-xxl-8 col-lg-7 shadow-sm rounded">
                    <div class="th-blog blog-single ">

                        {{-- BLOG IMAGE --}}
                        <div class="blog-img">
                            <img src="/{{ $blog->image }}" alt="{{ $blog->alt_tag }}">

                            <a class="blog-date" href="#">
                                {{ $blog->created_at->format('d') }}
                                <span class="year">
                                    {{ $blog->created_at->format('M, Y') }}
                                </span>
                            </a>
                        </div>

                        <div class="blog-content">

                            <div class="blog-meta">
                                @if (!empty($blog->category))
                                    <a href="#">{{ $blog->category->name }}</a>
                                
                                @endif
                            </div>

                            <h2 class="blog-title">
                                {{ $blog->name }}
                            </h2>

                            @if (!empty($blog->short_content))
                                <p>{{ $blog->short_content }}</p>
                            @endif
                            <hr>

                            <div class="blog-description">
                                {!! $blog->content !!}
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 col-lg-5">
                    <aside class="sidebar-area">
                        <div class="widget">
                            <h3 class="widget_title">Latest Post</h3>

                            <div class="recent-post-wrap">

                                @foreach ($similarBlogs as $post)
                                    <div class="recent-post">

                                        {{-- IMAGE --}}
                                        <div class="media-img">
                                            <a href="/blog/{{ $post->slug }}">
                                                <img src="/{{ $post->image }}" alt="{{ $post->alt_tag }}"
                                                    style="height: 65px; width: auto; object-fit: cover;" />
                                            </a>
                                        </div>


                                        <div class="media-body">

                                            <h4 class="post-title">
                                                <a class="text-inherit" href="/blog/{{ $post->slug }}">
                                                    {{ Str::limit($post->name, 25) }}
                                                </a>
                                            </h4>

                                            <div class="recent-post-meta">
                                                <a href="#">
                                                    <i class="fal fa-calendar-days"></i>
                                                    {{ $post->created_at->format('d M, Y') }}
                                                </a>
                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="widget widget_tag_cloud">
                            <h3 class="widget_title">Get in Touch</h3>
                            <div class="tagcloud">
                                @include('front.parts.form')
                            </div>
                        </div>
                    </aside>
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

                    <div class="accordion" id="faqAccordion">

                        @forelse ($blog->faqs as $index => $faq)
                            <div class="accordion-card style2 {{ $index == 0 ? 'active' : '' }}">

                                {{-- HEADER --}}
                                <div class="accordion-header" id="heading-{{ $faq->id }}">
                                    <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-{{ $faq->id }}"
                                        aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse-{{ $faq->id }}">

                                        {{ $faq->question }}

                                    </button>
                                </div>

                                <div id="collapse-{{ $faq->id }}"
                                    class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                    data-bs-parent="#faqAccordion">

                                    <div class="accordion-body">
                                        <p class="faq-text">
                                            {!! $faq->answer !!}
                                        </p>
                                    </div>

                                </div>

                            </div>

                        @empty
                            <p class="text-center">No FAQs available.</p>
                        @endforelse

                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection
@section('script')

@endsection
