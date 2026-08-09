@php
$setting = DB::table('site_settings')->first();
@endphp
<aside class="app-sidebar sticky" id="sidebar">
    <div class="main-sidebar-header">
        <a href="/dashboard" class="header-logo">
            <img src="/{{$setting->logo ?? 'web-assets/img/logo-gga.svg'}}" alt="Apex Horizon Institute Logo" style="max-height: 50px;" class="img-fluid" onerror="this.onerror=null; this.src='/web-assets/img/logo-gga.svg';">
        </a>
    </div>
    <div class="main-sidebar" id="sidebar-scroll">
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                <li class="slide__category"><span class="category-name">Menu</span></li>
                <li class="slide">
                    <a href="/dashboard" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32" viewBox="0 0 256 256">
                            <path d="M224,80l-96,56L32,80l96-56Z" opacity="0.2"></path>
                            <path d="M230.91,172A8,8,0,0,1,228,182.91l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,36,169.09l92,53.65,92-53.65A8,8,0,0,1,230.91,172ZM220,121.09l-92,53.65L36,121.09A8,8,0,0,0,28,134.91l96,56a8,8,0,0,0,8.06,0l96-56A8,8,0,1,0,220,121.09ZM24,80a8,8,0,0,1,4-6.91l96-56a8,8,0,0,1,8.06,0l96,56a8,8,0,0,1,0,13.82l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,24,80Zm23.88,0L128,126.74,208.12,80,128,33.26Z"></path>
                        </svg>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="/admin/leads" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32" viewBox="0 0 256 256">
                            <path d="M224,80l-96,56L32,80l96-56Z" opacity="0.2"></path>
                            <path d="M230.91,172A8,8,0,0,1,228,182.91l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,36,169.09l92,53.65,92-53.65A8,8,0,0,1,230.91,172ZM220,121.09l-92,53.65L36,121.09A8,8,0,0,0,28,134.91l96,56a8,8,0,0,0,8.06,0l96-56A8,8,0,1,0,220,121.09ZM24,80a8,8,0,0,1,4-6.91l96-56a8,8,0,0,1,8.06,0l96,56a8,8,0,0,1,0,13.82l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,24,80Zm23.88,0L128,126.74,208.12,80,128,33.26Z"></path>
                        </svg>
                        <span class="side-menu__label">Leads</span>
                    </a>
                </li>
                  <li class="slide">
                    <a href="/admin/regs" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32" viewBox="0 0 256 256">
                            <path d="M224,80l-96,56L32,80l96-56Z" opacity="0.2"></path>
                            <path d="M230.91,172A8,8,0,0,1,228,182.91l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,36,169.09l92,53.65,92-53.65A8,8,0,0,1,230.91,172ZM220,121.09l-92,53.65L36,121.09A8,8,0,0,0,28,134.91l96,56a8,8,0,0,0,8.06,0l96-56A8,8,0,1,0,220,121.09ZM24,80a8,8,0,0,1,4-6.91l96-56a8,8,0,0,1,8.06,0l96,56a8,8,0,0,1,0,13.82l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,24,80Zm23.88,0L128,126.74,208.12,80,128,33.26Z"></path>
                        </svg>
                        <span class="side-menu__label">Registration</span>
                    </a>
                </li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32" viewBox="0 0 256 256">
                            <path d="M224,80l-96,56L32,80l96-56Z" opacity="0.2"></path>
                            <path d="M230.91,172A8,8,0,0,1,228,182.91l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,36,169.09l92,53.65,92-53.65A8,8,0,0,1,230.91,172ZM220,121.09l-92,53.65L36,121.09A8,8,0,0,0,28,134.91l96,56a8,8,0,0,0,8.06,0l96-56A8,8,0,1,0,220,121.09ZM24,80a8,8,0,0,1,4-6.91l96-56a8,8,0,0,1,8.06,0l96,56a8,8,0,0,1,0,13.82l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,24,80Zm23.88,0L128,126.74,208.12,80,128,33.26Z"></path>
                        </svg>
                        <span class="side-menu__label">Universities</span>
                        <i class="ri-arrow-down-s-line side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Universities</a>
                        </li>
                        <li class="slide">
                            <a href="/admin/university/mode" class="side-menu__item">University Modes</a>
                        </li>
                        <li class="slide">
                            <a href="/admin/university" class="side-menu__item">Universities</a>
                        </li>
                        <li class="slide">
                            <a href="/admin/university/faq" class="side-menu__item">University FAQs</a>
                        </li>
                    </ul>
                </li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32" viewBox="0 0 256 256">
                            <path d="M224,80l-96,56L32,80l96-56Z" opacity="0.2"></path>
                            <path d="M230.91,172A8,8,0,0,1,228,182.91l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,36,169.09l92,53.65,92-53.65A8,8,0,0,1,230.91,172ZM220,121.09l-92,53.65L36,121.09A8,8,0,0,0,28,134.91l96,56a8,8,0,0,0,8.06,0l96-56A8,8,0,1,0,220,121.09ZM24,80a8,8,0,0,1,4-6.91l96-56a8,8,0,0,1,8.06,0l96,56a8,8,0,0,1,0,13.82l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,24,80Zm23.88,0L128,126.74,208.12,80,128,33.26Z"></path>
                        </svg>
                        <span class="side-menu__label">Courses</span>
                        <i class="ri-arrow-down-s-line side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Courses</a>
                        </li>
                        <li class="slide">
                            <a href="/admin/courses/category" class="side-menu__item">Course Departments</a>
                        </li>
                        <li class="slide">
                            <a href="/admin/courses/program" class="side-menu__item">Course Programs</a>
                        </li>
                        <li class="slide">
                            <a href="/admin/courses" class="side-menu__item">Courses</a>
                        </li>
                        <li class="slide">
                            <a href="/admin/courses/faq" class="side-menu__item">Course FAQs</a>
                        </li>
                    </ul>
                </li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32" viewBox="0 0 256 256">
                            <path d="M224,80l-96,56L32,80l96-56Z" opacity="0.2"></path>
                            <path d="M230.91,172A8,8,0,0,1,228,182.91l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,36,169.09l92,53.65,92-53.65A8,8,0,0,1,230.91,172ZM220,121.09l-92,53.65L36,121.09A8,8,0,0,0,28,134.91l96,56a8,8,0,0,0,8.06,0l96-56A8,8,0,1,0,220,121.09ZM24,80a8,8,0,0,1,4-6.91l96-56a8,8,0,0,1,8.06,0l96,56a8,8,0,0,1,0,13.82l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,24,80Zm23.88,0L128,126.74,208.12,80,128,33.26Z"></path>
                        </svg>
                        <span class="side-menu__label">Sub-Courses</span>
                        <i class="ri-arrow-down-s-line side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Sub-Courses</a>
                        </li>
                        <li class="slide">
                            <a href="/admin/sub-courses" class="side-menu__item">Sub Courses</a>
                        </li>
                        <li class="slide">
                            <a href="/admin/sub-courses/faq" class="side-menu__item">Sub Course FAQs</a>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a href="/admin/approvals" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32" viewBox="0 0 256 256">
                            <path d="M224,80l-96,56L32,80l96-56Z" opacity="0.2"></path>
                            <path d="M230.91,172A8,8,0,0,1,228,182.91l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,36,169.09l92,53.65,92-53.65A8,8,0,0,1,230.91,172ZM220,121.09l-92,53.65L36,121.09A8,8,0,0,0,28,134.91l96,56a8,8,0,0,0,8.06,0l96-56A8,8,0,1,0,220,121.09ZM24,80a8,8,0,0,1,4-6.91l96-56a8,8,0,0,1,8.06,0l96,56a8,8,0,0,1,0,13.82l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,24,80Zm23.88,0L128,126.74,208.12,80,128,33.26Z"></path>
                        </svg>
                        <span class="side-menu__label">Approvals</span>
                    </a>
                </li>
                  <li class="slide">
                    <a href="/admin/home/notice" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32" viewBox="0 0 256 256">
                            <path d="M224,80l-96,56L32,80l96-56Z" opacity="0.2"></path>
                            <path d="M230.91,172A8,8,0,0,1,228,182.91l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,36,169.09l92,53.65,92-53.65A8,8,0,0,1,230.91,172ZM220,121.09l-92,53.65L36,121.09A8,8,0,0,0,28,134.91l96,56a8,8,0,0,0,8.06,0l96-56A8,8,0,1,0,220,121.09ZM24,80a8,8,0,0,1,4-6.91l96-56a8,8,0,0,1,8.06,0l96,56a8,8,0,0,1,0,13.82l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,24,80Zm23.88,0L128,126.74,208.12,80,128,33.26Z"></path>
                        </svg>
                        <span class="side-menu__label">Notice</span>
                    </a>
                </li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32" viewBox="0 0 256 256">
                            <path d="M224,80l-96,56L32,80l96-56Z" opacity="0.2"></path>
                            <path d="M230.91,172A8,8,0,0,1,228,182.91l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,36,169.09l92,53.65,92-53.65A8,8,0,0,1,230.91,172ZM220,121.09l-92,53.65L36,121.09A8,8,0,0,0,28,134.91l96,56a8,8,0,0,0,8.06,0l96-56A8,8,0,1,0,220,121.09ZM24,80a8,8,0,0,1,4-6.91l96-56a8,8,0,0,1,8.06,0l96,56a8,8,0,0,1,0,13.82l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,24,80Zm23.88,0L128,126.74,208.12,80,128,33.26Z"></path>
                        </svg>
                        <span class="side-menu__label">Blogs</span>
                        <i class="ri-arrow-down-s-line side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Blogs</a>
                        </li>
                        <!-- <li class="slide">
                            <a href="/admin/blog/category" class="side-menu__item">Blog Categories</a>
                        </li> -->
                        <li class="slide">
                            <a href="/admin/blog" class="side-menu__item">Blogs</a>
                        </li>
                        <li class="slide">
                            <a href="/admin/blog/faq" class="side-menu__item">Blog FAQs</a>
                        </li>
                    </ul>
                </li>



                <li class="slide">
                    <a href="/admin/site-settings" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32" viewBox="0 0 256 256">
                            <path d="M224,80l-96,56L32,80l96-56Z" opacity="0.2"></path>
                            <path d="M230.91,172A8,8,0,0,1,228,182.91l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,36,169.09l92,53.65,92-53.65A8,8,0,0,1,230.91,172ZM220,121.09l-92,53.65L36,121.09A8,8,0,0,0,28,134.91l96,56a8,8,0,0,0,8.06,0l96-56A8,8,0,1,0,220,121.09ZM24,80a8,8,0,0,1,4-6.91l96-56a8,8,0,0,1,8.06,0l96,56a8,8,0,0,1,0,13.82l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,24,80Zm23.88,0L128,126.74,208.12,80,128,33.26Z"></path>
                        </svg>
                        <span class="side-menu__label">Site Settings</span>
                    </a>
                </li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32" viewBox="0 0 256 256">
                            <path d="M224,80l-96,56L32,80l96-56Z" opacity="0.2"></path>
                            <path d="M230.91,172A8,8,0,0,1,228,182.91l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,36,169.09l92,53.65,92-53.65A8,8,0,0,1,230.91,172ZM220,121.09l-92,53.65L36,121.09A8,8,0,0,0,28,134.91l96,56a8,8,0,0,0,8.06,0l96-56A8,8,0,1,0,220,121.09ZM24,80a8,8,0,0,1,4-6.91l96-56a8,8,0,0,1,8.06,0l96,56a8,8,0,0,1,0,13.82l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,24,80Zm23.88,0L128,126.74,208.12,80,128,33.26Z"></path>
                        </svg>
                        <span class="side-menu__label">Home</span>
                        <i class="ri-arrow-down-s-line side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Home</a>
                        </li>
                        <li class="slide">
                            <a href="/admin/homecontent" class="side-menu__item">Home Page</a>
                        </li>
                        <li class="slide">
                            <a href="/admin/testimonials" class="side-menu__item">Testimonials</a>
                        </li>
                        <li class="slide">
                            <a href="/admin/home/faq" class="side-menu__item">Faq</a>
                        </li>
                        <!-- <li class="slide">
                            <a href="/admin/home/about" class="side-menu__item">About</a>
                        </li> -->
                        <!-- <li class="slide">
                            <a href="/admin/blog/faq" class="side-menu__item">Blog FAQs</a>
                        </li> -->
                    </ul>
                </li>


            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>

    </div>

</aside>
