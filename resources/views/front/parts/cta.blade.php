@php
    $setting = DB::table('site_settings')->first();
@endphp

<section class="cta-section py-5" style="background: #f8fafc;">
    <div class="container">
        <div class="wrap rounded-24 p-4 p-md-5 shadow-lg" style="background: linear-gradient(135deg, #1e1b4b 0%, #0f172a 100%); color: #ffffff; border-radius: 24px; position: relative; overflow: hidden;">
            <div class="row align-items-center gy-4">
                <div class="col-lg-7">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <div style="width: 50px; height: 50px; border-radius: 50%; background: var(--gradient-primary); display: flex; align-items: center; justify-content: center; font-size: 22px;">
                            <i class="fas fa-envelope-open-text text-white"></i>
                        </div>
                        <div>
                            <span class="text-warning fw-bold text-uppercase" style="letter-spacing: 1px; font-size: 0.85rem;">Have Questions?</span>
                            <h3 class="m-0 text-white font-weight-bold" style="font-size: 1.4rem;">
                                Contact Admission Desk: <a href="mailto:{{ $setting->primary_email ?? 'info@apexhorizon.edu.in' }}" style="color: #38bdf8; text-decoration: underline;">{{ $setting->primary_email ?? 'info@apexhorizon.edu.in' }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 text-lg-end text-center">
                    <div class="d-flex flex-wrap gap-3 justify-content-lg-end justify-content-center align-items-center">
                        <a href="tel:{{ $setting->primary_contact ?? '9881788888' }}" class="btn btn-warning btn-lg px-4 py-3 fw-bold rounded-pill text-dark shadow">
                            <i class="fas fa-phone-alt me-2"></i> Call {{ $setting->primary_contact ?? '9881788888' }}
                        </a>
                        <button class="btn btn-outline-light btn-lg px-4 py-3 fw-bold rounded-pill" data-bs-toggle="modal" data-bs-target="#pop">
                            Get Quote &rarr;
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>