@extends('front.layouts.main')
@section('scripts')
@if ($subcourse->ld_schema)
{!! $subcourse->ld_schema !!}
@endif
@endsection
@section('content')
@section('title', $subcourse->meta_title)
@section('description', $subcourse->meta_description)

@section('content')
<section class="breadcrumb__area breadcrumb__bg" data-background="/web-assets/main/breadcumb-bg.jpg   ">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="breadcrumb__content">
               <h1 class="title">{{ $subcourse->name }}</h1>
               <nav class="breadcrumb">
                  <span property="itemListElement" typeof="ListItem">
                     <a href="/">Home</a>
                  </span>
                  <span class="breadcrumb-separator"><i class="flaticon-right-arrow"></i></span>
                  <span property="itemListElement" typeof="ListItem">{{ $subcourse->name }}</span>
               </nav>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- <section class="about__area pt-60 pb-90">
   <div class="container">
      <div class="row align-items-center justify-content-center">
         <div class="col-lg-5 col-md-8">
            <div class="about__img">
               <img src="/{{ $subcourse->image }}" alt="{{ $subcourse->alt }}" class="rounded shadow">
            </div>
         </div>
         <div class="col-lg-7">
            <div class="about__content">
               <div class="section__title mb-15">
                  <h2 class="title">{{ $subcourse->name }}</h2>
               </div>
               <p>{{ $subcourse->short_content }}</p>
               <div class="about__content-bottom">
                  <div class="about__review-wrap">
                     <div class="about__review-box">
                        <div class="swiper brand-active fix">
                           <div class="swiper-wrapper">
                              @foreach ($course->universities as $uni)
                              <div class="swiper-slide card p-2 shadow">
                                 <div class="brand__item">
                                    <a href="/university/{$uni->slug}">
                                       <img src="/{{$uni->logo}}" alt="{{ $uni->name }}">
                                    </a>
                                 </div>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>
                     <div class="about__list-box-wrap">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#pop" class="btn">Enroll Now<img src="/web-assets/img/icon/right_arrow.svg" alt="" class="injectable"></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> -->



<section class="about__area pt-60 pb-90">
   <div class="container">
      <div class="row align-items-center justify-content-center">
         <div class="col-lg-5 col-md-8">
            <div class="about__img">
               <img src="/{{ $subcourse->image }}" alt="{{ $subcourse->alt }}" class="rounded shadow">
            </div>
         </div>
         <div class="col-lg-7">
            <div class="about__content">
               <div class="section__title mb-15">
                  <h2 class="title">{{ $subcourse->name }}</h2>
               </div>
               <p>{{ $subcourse->short_content }}</p>
               <div class="about__content-bottom">
                  <div class="about__review-wrap">
                     <div class="about__list-box-wrap">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#pop" class="btn">Enroll Now<img src="/web-assets/img/icon/right_arrow.svg" alt="" class="injectable"></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="newsletter__area pb-80">
   <div class="container">
      <div class="newsletter__wrap">
         <div class="row align-items-center justify-content-center">
            <div class="col-lg-12">
               <div class="newsletter__content-left align-items-center justify-content-center">
                  <div class="experiences__wrap">
                     <h2 class="count">{{ $subcourse->eligibilty }}</h2>
                     <span>Eligibitlitys</strong></span>
                  </div>
                  <div class="experiences__wrap">
                     <h2 class="count">{{ $subcourse->fees }}</h2>
                     <span>Avg. Fee</strong></span>
                  </div>
                  <div class="experiences__wrap">
                     <h2 class="count">{{ $subcourse->duration }}</h2>
                     <span>subcourse Duration</strong></span>
                  </div>
                  <div class="experiences__wrap">
                     <h2 class="count">{{ $subcourse->universities_count }} Universities</h2>
                     <span>Offering This subcourse</strong></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="services__details-area pt-20 pb-40">
   <div class="container">
      <div class="services__details-inner card p-3">
         <div class="row">
            <div class="col-md-12">
               <div class="services__details-content">
                  <h2 class="title">More about {{ $subcourse->name }}</h2>
                  <div> {!! $subcourse->content !!}</div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

{{-- faq --}}
@if ($subcourse->faqs->isNotEmpty())
<section class="pb-40">
   <div class="container">
      <div class="col-md-12">
         <div class="services__details-benefit">
            <h2 style="font-size: 24px;" class="mb-3">Frequently Asked Questions about {{ $subcourse->name }}</h2>
            <div class="faq__wrap">
               <div class="accordion" id="accordionExample">
                  @foreach ($subcourse->faqs as $index => $faq)
                  <div class="accordion-item">
                     <h2 class="accordion-header">
                        <button class="accordion-button @if ($index > 0) collapsed @endif" type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapseOne">
                           {{ $faq->question }}
                        </button>
                     </h2>
                     <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse @if ($index == 0) show @endif" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                           <p> {!! $faq->answer !!}</p>
                        </div>
                     </div>
                  </div>
                  @endforeach

               </div>
            </div>
         </div>
      </div>
      @endif
   </div>
</section>
{{-- end faq --}}
@endsection
@section('script')


@endsection