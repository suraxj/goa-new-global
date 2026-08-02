@extends('front.layouts.main')
@section('title', 'Contact')
@section('description','Description')
@section('content')
<section class="breadcrumb__area breadcrumb__bg" data-background="/web-assets/img/bg/breadcrumb_bg.jpg">
    <div class="container">
       <div class="row">
          <div class="col-12">
             <div class="breadcrumb__content">
                <h1 class="title">Fee Payment</h1>
                <nav class="breadcrumb">
                   <span property="itemListElement" typeof="ListItem">
                   <a href="/">Home</a>
                   </span>
                   <span class="breadcrumb-separator"><i class="flaticon-right-arrow"></i></span>
                   <span property="itemListElement" typeof="ListItem">Fee Payment</span>
                </nav>
             </div>
          </div>
       </div>
    </div>
 </section>

<section class="about__area pt-60 pb-60" style="background-color: #fff">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-5 col-md-5">
                <div class="about__img">
                    <img src="/web-assets/main/paytmqr.png" alt="qr" class="rounded">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="about__content">
                    <div class="section__title mb-15">
                        <h2 class="title">Bank Account Details</h2>
                    </div>
                    <div class="about__content-bottom">
                        <div class="about__list-box-wrap">
                            <div class="about__list-box">
                                <ul class="list-wrap">

                            <ul>
                                <li><i class="flaticon-check"></i>Bank : Axis Bank </li>
                                <li><i class="flaticon-check"></i>Account Holder Name : SHIVAM GUPTA</li>
                                <li><i class="flaticon-check"></i>Account number : 917010057115975</li>
                                <li><i class="flaticon-check"></i>IFSC Code : UTIB0000672</li>
                            </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
