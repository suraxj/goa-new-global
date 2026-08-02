@if ($universities->isNotEmpty())
    <section class="patners py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <p class="fw-bold mb-2 mb-md-0 fs-4 lh-1 text-white "> Marketing &amp; Referral  Partner Of</p>
                </div>
                <div class="col-md-9">
                    <div class="card  pt-md-5 pt-4 pb-2 border-0">
                        <div class="marquee ">
                            <div class="marquee_group">
                                @foreach ($universities as $uni)
                                    <div class="img-outer">
                                        <a href="/university/{{ $uni->slug }}">
                                            <img src="/{{ $uni->logo }}" class="img-fluid p-2 pe-4 d-block mx-auto"  alt="" style="height:90px;">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div aria-hidden="true" class="marquee_group">
                                @foreach ($universities as $uni)
                                <div class="img-outer">
                                    <a href="/university/{{ $uni->slug }}">
                                        <img src="/{{ $uni->logo }}" class="img-fluid p-2 pe-4 d-block mx-auto" height="100" alt="" style="height:90px;">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="decoration_item shape_image_3">
                <img src="web-assets/main/shape_space_1.svg" class="img-fluid" alt="S2code Shape">
            </div>
        </div>

        

    </section>
@endif
