<!-- HERO SECTION: GOA GLOBAL ACADEMY -->
<section class="hero-premium" id="hero">
    <!-- Announcement Bar -->
    <div class="container mb-4">
        <div style="background: linear-gradient(90deg, #4f46e5, #06b6d4, #10b981); color: #ffffff; padding: 10px 20px; border-radius: 50px; text-align: center; font-weight: 700; font-size: 0.92rem; box-shadow: 0 10px 30px rgba(79, 70, 229, 0.3);" class="gga-float-slow">
            🎓 <strong>ADMISSIONS OPEN 2026-2027:</strong> Fast-Track Your Degree & Diploma Courses | <a href="#pop" data-bs-toggle="modal" data-bs-target="#pop" style="color: #fbbf24; text-decoration: underline; margin-left: 8px;">Claim Free Counselling &rarr;</a>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-center gy-5">
            <!-- Left Hero Column -->
            <div class="col-lg-7 text-lg-start text-center">
                <!-- Badge -->
                <div class="mb-3">
                    <span style="background: rgba(255, 255, 255, 0.12); border: 1px solid rgba(255,255,255,0.2); color: #38bdf8; padding: 8px 20px; border-radius: 50px; font-weight: 700; font-size: 0.85rem; letter-spacing: 1px; display: inline-flex; align-items: center; gap: 8px;">
                        <i class="fas fa-shield-alt text-warning"></i> UGC, AIU & DEB APPROVED DEGREES
                    </span>
                </div>

                <!-- Main Title -->
                <h1 style="font-size: 2.9rem; font-weight: 800; line-height: 1.25; color: #ffffff;" class="mb-4">
                    Shape Your Future With <br class="d-none d-md-block" />
                    <span class="gga-shimmer-text">Goa Global Academy</span>
                </h1>

                <!-- Subtitle -->
                <p style="font-size: 1.1rem; color: #cbd5e0; max-width: 620px; line-height: 1.7;" class="mb-4">
                    Earn globally recognized Undergraduate, Postgraduate degrees (MBA, B.Com, BCA, B.Sc) and 10th/12th Board certifications from Goa's premier distance education portal.
                </p>

                <!-- Feature Pills -->
                <div class="d-flex flex-wrap gap-2 justify-content-lg-start justify-content-center mb-4">
                    <span class="badge bg-dark bg-opacity-50 text-light border border-secondary px-3 py-2 rounded-pill"><i class="fas fa-check-circle text-success me-1"></i> 100% Online & Distance LMS</span>
                    <span class="badge bg-dark bg-opacity-50 text-light border border-secondary px-3 py-2 rounded-pill"><i class="fas fa-check-circle text-success me-1"></i> Easy Monthly EMI Options</span>
                    <span class="badge bg-dark bg-opacity-50 text-light border border-secondary px-3 py-2 rounded-pill"><i class="fas fa-check-circle text-success me-1"></i> Dedicated Mentor Support</span>
                </div>

                <!-- Hero Search Bar -->
                <div class="mb-4" style="max-width: 580px;">
                    <div style="background: rgba(255, 255, 255, 0.95); padding: 8px; border-radius: 50px; display: flex; align-items: center; box-shadow: 0 15px 35px rgba(0,0,0,0.3);">
                        <i class="fas fa-search text-muted ms-3 me-2"></i>
                        <input type="text" id="bannerSearch" class="form-borderless w-100" placeholder="Search MBA, B.Com, BCA, 10th/12th..." style="border: none; outline: none; background: transparent; padding: 10px; font-weight: 600; color: #0f172a;" />
                        <button class="btn style2 rounded-pill px-4 py-2" type="button" data-bs-toggle="modal" data-bs-target="#pop" style="background: var(--gradient-primary); color: white; font-weight: 700; border: none; flex-shrink: 0;">
                            Search
                        </button>
                    </div>
                    <div id="resultDiv" class="dropdown-menu w-100 p-3 shadow-lg d-none mt-2" style="border-radius: 16px; background: #ffffff;"></div>
                </div>

                <!-- Stats Highlight Row -->
                <div class="row pt-3 text-center text-lg-start border-top border-secondary border-opacity-25">
                    <div class="col-4">
                        <div style="font-size: 1.8rem; font-weight: 800; color: #fbbf24;">35+</div>
                        <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 600;">Years Legacy</div>
                    </div>
                    <div class="col-4">
                        <div style="font-size: 1.8rem; font-weight: 800; color: #38bdf8;">10,000+</div>
                        <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 600;">Alumni Placed</div>
                    </div>
                    <div class="col-4">
                        <div style="font-size: 1.8rem; font-weight: 800; color: #34d399;">100%</div>
                        <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 600;">Valid Degrees</div>
                    </div>
                </div>
            </div>

            <!-- Right Hero Column: Quick Enquiry Glass Card -->
            <div class="col-lg-5">
                <div class="glass-form-card gga-float" style="position: relative;">
                    <div class="text-center mb-3">
                        <span class="badge bg-warning text-dark px-3 py-1 rounded-pill mb-2 font-weight-bold">INSTANT ADMISSION ENQUIRY</span>
                        <h3 style="color: #ffffff; font-weight: 700; font-size: 1.5rem;" class="m-0">Get Free Academic Counselling</h3>
                        <p style="color: #cbd5e0; font-size: 0.88rem;" class="mt-1">Fill out details to get course prospectus & fee structure.</p>
                    </div>

                    <form action="{{ route('add_lead') }}" method="POST" class="leadForm">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Your Full Name *" required />
                        </div>
                        <div class="mb-3">
                            <input type="tel" name="phone" class="form-control" placeholder="Mobile Number *" required />
                        </div>
                        <div class="mb-3">
                            <select name="course" class="form-select" required>
                                <option value="">Select Interested Program *</option>
                                <option value="MBA / PG Management">MBA / PG Management</option>
                                <option value="B.Com / M.Com">B.Com / M.Com</option>
                                <option value="BCA / MCA (IT & CS)">BCA / MCA (Computer Science)</option>
                                <option value="B.Sc / M.Sc">B.Sc / M.Sc</option>
                                <option value="10th & 12th Open Schooling">10th & 12th Open Schooling</option>
                                <option value="Diploma Courses">Professional Diplomas</option>
                            </select>
                        </div>
                        <button type="submit" class="btn w-100 py-3" style="background: var(--gradient-accent); color: #ffffff; font-weight: 800; font-size: 1.05rem; border-radius: 14px; border: none; box-shadow: 0 10px 25px rgba(245, 158, 11, 0.4);">
                            CLAIM FREE COUNSELLING NOW &rarr;
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
