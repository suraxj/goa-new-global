@php
    $setting = DB::table('site_settings')->first();
    $categories = App\Models\CoursesCategory::all();
    $modes = App\Models\UniversityMode::all();
    $unih = App\Models\University::all();

@endphp


<div class="popup-search-box d-none d-lg-block">
    <button class="searchClose"><i class="far fa-times"></i></button>
    <form action="#">
        <input type="text" placeholder="What are you looking for?" />
        <button type="submit"><i class="fal fa-search"></i></button>
    </form>
</div>
<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="th-menu-content">
            <div class="mobile-logo">
                <a href="/"><img src="/web-assets/img/logo-gga.svg" alt="Apex Horizon Institute" style="height: 52px;" /></a>
            </div>
            <div class="th-mobile-menu-bottom">
                <form class="th-mobile-search" action="#">
                    <input type="text" placeholder="Search..." />
                    <button class="icon-btn" type="submit">
                        <i class="fal fa-search"></i>
                    </button>
                </form>
                <div class="btn-wrap">
                    <a href="" data-bs-toggle="modal" data-bs-target="#pop" class="th-btn w-100">Registration Now
                        <svg class="ms-2" width="16" height="14" viewBox="0 0 16 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.5264 0C7.5264 0.6962 8.21633 1.738 8.9138 2.61293C9.81193 3.7394 10.8838 4.72347 12.1137 5.4748C13.0351 6.0374 14.154 6.57747 15.0528 6.57747M7.5264 13.1712C7.5264 12.475 8.21633 11.4332 8.9138 10.5583C9.81193 9.43187 10.8838 8.44773 12.1137 7.6964C13.0351 7.1338 14.154 6.59373 15.0528 6.59373M15.0528 6.5856H0"
                                stroke="currentColor" stroke-width="1.5"></path>
                        </svg></a>
                </div>
                <div class="contact-info-wrap">
                    <div class="contact-info">
                        <i class="fa-regular fa-envelope"></i> <a href="mailto:{{ $setting->primary_email ?? 'admissions@apexhorizon.edu.in' }}">
                            {{ $setting->primary_email ?? 'admissions@apexhorizon.edu.in' }}
                        </a>
                    </div>
                    <div class="contact-info">
                        <i class="fa-regular fa-phone"></i><a href="tel:{{ $setting->primary_contact ?? '+919881788888' }}">
                            {{ $setting->primary_contact ?? '+91 98817 88888' }}
                        </a>
                    </div>
                </div>
                <div class="th-social style4">
                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <li class="menu-item-has-children">
                        <a href="/" class="active">Home</a>
                    </li>
                    <li><a href="/about">About Us</a></li>
                    <li class="menu-item-has-children">
                        <a href="#course-sec">Courses</a>
                        <ul class="sub-menu">
                            @php
                                $unis = DB::select('select name, slug from courses order by name asc limit 5');
                            @endphp
                            @foreach ($unis as $uni)
                                <li><a href="/course/{{ $uni->slug }}">{{ $uni->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="/blog">Blogs</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<header class="th-header header-layout1">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto d-none d-lg-block">
                    <div class="header-links">
                        <ul class="header-left-wrap">
                            <li>
                                <i class="fa-regular fa-phone"></i><a href="tel:{{ $setting->primary_contact ?? '+919881788888' }}">{{ $setting->primary_contact ?? '+91 98817 88888' }}</a>
                            </li>
                            <li>
                                <i class="fa-regular fa-envelope"></i><a href="mailto:{{ $setting->primary_email ?? 'admissions@apexhorizon.edu.in' }}">{{ $setting->primary_email ?? 'admissions@apexhorizon.edu.in' }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto d-flex align-items-center gap-3">
                    <div class="header-links ps-0">
                        <ul>
                            <li>
                                <div class="th-social">
                                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                    <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                                    <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <button type="button" id="themeToggleBtn" class="btn btn-sm btn-outline-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 34px; height: 34px;" title="Toggle Dark/Light Mode">
                        <i class="fas fa-moon"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const themeBtn = document.getElementById('themeToggleBtn');
            if (themeBtn) {
                themeBtn.addEventListener('click', function() {
                    document.body.classList.toggle('dark-mode');
                    const isDark = document.body.classList.contains('dark-mode');
                    themeBtn.innerHTML = isDark ? '<i class="fas fa-sun text-warning"></i>' : '<i class="fas fa-moon"></i>';
                });
            }
        });
    </script>
    <div class="sticky-wrapper shadow">
        <div class="container">
            <div class="menu-area">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="/">
                                <img src="/web-assets/img/logo-gga.svg" alt="Apex Horizon Institute" class="img-fluid pb-1"
                                    style="max-height: 65px;" onerror="this.onerror=null; this.src='/web-assets/img/logo-gga.svg';">
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>
                                <li class="active">
                                    <a href="/">Home</a>

                                </li>
                                <li><a href="/about">About us</a> </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Courses</a>
                                    <ul class="sub-menu">
                                        @foreach ($categories as $cat)
                                            <li><a href="/courses/{{ $cat->slug }}">{{ $cat->name }}
                                                    Courses</a></li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li><a href="/blog">Blog</a></li>


                                <li><a href="/contact">contact us</a></li>
                            </ul>
                        </nav>
                        <button type="button" class="th-menu-toggle d-block d-lg-none">
                            <i class="fal fa-bars"></i>
                        </button>
                    </div>

                    <div class="col-auto d-none d-xl-block">
                        <div class="header-button">

                            <a href="/registration" class="th-btn">Registration Now
                                <svg class="ms-2" width="16" height="14" viewBox="0 0 16 14"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.5264 0C7.5264 0.6962 8.21633 1.738 8.9138 2.61293C9.81193 3.7394 10.8838 4.72347 12.1137 5.4748C13.0351 6.0374 14.154 6.57747 15.0528 6.57747M7.5264 13.1712C7.5264 12.475 8.21633 11.4332 8.9138 10.5583C9.81193 9.43187 10.8838 8.44773 12.1137 7.6964C13.0351 7.1338 14.154 6.59373 15.0528 6.59373M15.0528 6.5856H0"
                                        stroke="currentColor" stroke-width="1.5" />
                                </svg> </a>

                            <a href="" data-bs-toggle="modal" data-bs-target="#pop" class="th-btn">Apply Now
                                <svg class="ms-2" width="16" height="14" viewBox="0 0 16 14"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.5264 0C7.5264 0.6962 8.21633 1.738 8.9138 2.61293C9.81193 3.7394 10.8838 4.72347 12.1137 5.4748C13.0351 6.0374 14.154 6.57747 15.0528 6.57747M7.5264 13.1712C7.5264 12.475 8.21633 11.4332 8.9138 10.5583C9.81193 9.43187 10.8838 8.44773 12.1137 7.6964C13.0351 7.1338 14.154 6.59373 15.0528 6.59373M15.0528 6.5856H0"
                                        stroke="currentColor" stroke-width="1.5" />
                                </svg> </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="fix">
