@extends('front.layouts.main')
@section('title', 'Privacy Policy')
@section('description', 'Privacy Policy - Apex Horizon Institute')

@section('content')


    <section class="breadcrumb__area breadcrumb__bg" data-background="/web-assets/main/breadcumb-bg.jpg">
        <div class="breadcumb-wrapper" data-bg-src="/web-assets/img/bg/breadcumb-bg.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcumb-content">
                            <h2 class="breadcumb-title">Privacy-policy</h2>
                            <ul class="breadcumb-menu">
                                <li><a href="/">Home</a></li>
                                <li>Privacy-policy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="policy-section">
        <div class="container">

            <div class="row g-4">

                <div class="col-12">
                    <div class="card policy-card p-4">
                      <h6> <i class="fas fa-lock me-2 text-primary"></i> Data Protection</h6>
                        <p class="policy-text">
                            Your data is securely stored and protected using modern security practices. We do not sell or
                            misuse your personal information.
                        </p>
                      <h6> <i class="fas fa-database me-2 text-primary"></i>Information We Collect</h6>
                        <p class="policy-text">
                            We may collect personal details such as your name, email, phone number, and academic interests
                            when you register or interact with our platform.
                        </p>
                      <h6>  <i class="fas fa-share-alt me-2 text-primary"></i>Information Sharing</h6>
                        <p class="policy-text">
                            We only share information with trusted partners for educational purposes and never for
                            unauthorized marketing.
                        </p>
                        <h6><i class="fas fa-file-alt me-2 text-primary"></i>Disclaimer</h6>
                        <p class="policy-text">
                            Apex Horizon Institute provides educational information for guidance purposes only. We do
                            not
                            issue certificates or conduct examinations on behalf of universities. All official academic
                            documents are managed by respective institutions.
                        </p>
                        <p class="policy-text">
                            We reserve the right to update this Privacy Policy at any time without prior notice.
                        </p>
                        <h6><i class="fas fa-external-link-alt me-2 text-primary"></i>Third-Party Links</h6>
                        <p class="policy-text">
                            Our platform may contain links to external websites. We are not responsible for their privacy
                            practices, so we recommend reviewing their policies.
                        </p>
                        <h6><i class="fas fa-cookie-bite me-2 text-primary"></i>Cookies Policy</h6>
                        <p class="policy-text">
                            Our website uses cookies to enhance your browsing experience, analyze traffic, and personalize
                            content. You can disable cookies in your browser settings anytime.
                        </p>

                    </div>
                   
                </div>

            </div>
        </div>
    </section>

@endsection
