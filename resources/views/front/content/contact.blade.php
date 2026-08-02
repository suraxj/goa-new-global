@extends('front.layouts.main')
@section('title', 'Contact')
@section('description', 'Description')
@section('content')
    @php
        $setting = DB::table('site_settings')->first();
    @endphp


    <div class="breadcumb-wrapper" data-bg-src="/web-assets/img/bg/breadcumb-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h2 class="breadcumb-title">Contact Us</h2>
                        <ul class="breadcumb-menu">
                            <li><a href="/">Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-top overflow-hidden contact-area-1 position-relative z-index-common" id="contact-sec">
        <div class="container">

            <div class="row gy-4 justify-content-center">

                <!-- CALL -->
                <div class="col-xl-4 col-md-6">
                    <div class="contact-card th_fade_anim text-center custom-card">
                        <div class="box-icon mx-auto">
                            <i class="fal fa-headset"></i>
                        </div>
                        <div class="box-content">
                            <h3 class="box-title">Call Us</h3>
                            <p class="box-text">Any time for support.</p>

                            <a class="box-link d-block" href="tel:{{ $setting->primary_contact }}">
                                {{ $setting->primary_contact }}
                            </a>

                            @if (!empty($setting->secondary_contact))
                                <a class="box-link d-block" href="tel:{{ $setting->secondary_contact }}">
                                    {{ $setting->secondary_contact }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- EMAIL -->
                <div class="col-xl-4 col-md-6">
                    <div class="contact-card th_fade_anim text-center custom-card">
                        <div class="box-icon mx-auto">
                            <i class="fal fa-envelope-open-text"></i>
                        </div>
                        <div class="box-content">
                            <h3 class="box-title">Official Email</h3>
                            <p class="box-text">Email us for queries</p>

                            <a class="box-link d-block" href="mailto:{{ $setting->primary_email }}">
                                {{ $setting->primary_email }}
                            </a>

                            @if (!empty($setting->secondary_email))
                                <a class="box-link d-block" href="mailto:{{ $setting->secondary_email }}">
                                    {{ $setting->secondary_email }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- ADDRESS -->
                <div class="col-xl-4 col-md-6">
                    <div class="contact-card th_fade_anim text-center custom-card">
                        <div class="box-icon mx-auto">
                            <i class="fal fa-map-location-dot"></i>
                        </div>
                        <div class="box-content">
                            <h3 class="box-title">Our Location</h3>
                            <p class="box-text">Visit us today!</p>

                            <span class="box-link d-block">
                                {{ \Illuminate\Support\Str::limit($setting->primary_address, 20) }}
                            </span>

                            @if (!empty($setting->secondary_address))
                                <span class="box-link d-block">
                                    {{ \Illuminate\Support\Str::limit($setting->secondary_address, 20) }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-map space-top ">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3848.9165737709714!2d73.95889777508476!3d15.27234476027796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbfb3b6c4bd0b07%3A0x7c7a068ebe117df5!2sGoa%20Correspondence%20College%20Head%20Office!5e0!3m2!1sen!2sin!4v1775903105077!5m2!1sen!2sin"
                            width="600" height="650" style="border:1;" class="shadow-sm" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 space-bottom">
                    <div class="contact-page-form-wrap space-top">
                        <div class="contact-form contact-page-form">
                                <h4 class="form-title">Get in Touch</h4>

                             @include('front.parts.form')
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
