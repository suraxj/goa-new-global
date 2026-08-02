<section class="pricing__area pt-60 pb-60" style="background: #147b2e;">
            <div class="container">
                <div class="row align-items-center justify-content-center gutter-24">
                    <div class="col-lg-9 col-md-9">
                        <div class="pricing__box">
                            <div class="pricing__top">
                                <h4 class="title">Recent Notifications</h4>
                            </div>
                            <ul class="list-wrap pricing__list">
                               <marquee 
                                    behavior="scroll" 
                                    direction="up" 
                                    scrollamount="2" 
                                    loop="-1"
                                    onmouseover="this.stop();" 
                                    onmouseout="this.start();"
                                >
                                @foreach ($notices as $notice)
                                    <a href="{{$notice->link}}" target="_blank">
                                        <li class="border-bottom mb-4"><i class="flaticon-check fa-beat"></i> {{$notice->name}}</li>
                                    </a> 
                                @endforeach
                                 
                                </marquee>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <img src="/web-assets/main/notice.webp" alt="notice" class="img-fluid rounded">
                    </div>
                    
                    
                </div>
            </div>
        </section>