@extends('front.layouts.main')
@section('title', 'University')
@section('description','Description')
@section('content')

<section class="breadcrumb__area breadcrumb__bg" data-background="/web-assets/main/breadcumb-bg.jpg">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="breadcrumb__content">
               <h1 class="title">All Universities</h1>
               <nav class="breadcrumb">
                  <span property="itemListElement" typeof="ListItem">
                  <a href="/">Home</a>
                  </span>
                  <span class="breadcrumb-separator"><i class="flaticon-right-arrow"></i></span>
                  <span property="itemListElement" typeof="ListItem">All Universities</span>
               </nav>
            </div>
         </div>
      </div>
   </div>
</section>
@if ($university->isNotEmpty())
<section class="services__area fix">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-md-12">
            <div class="section__title text-center mb-40">
               <span class="sub-title">UNIVERSITIES</span>
               <h2 class="title">Find the Right University for Your Ambition</h2>
            </div>
         </div>
      </div>
      <div class="row gutter-24 justify-content-left">
         @foreach ($university as $uni)
         <div class="col-xl-2 col-lg-2 col-6">
               <div class="card">
                  <div class="img-outer">
                     <a href="/university/{{$uni->slug}}">
                     <img src="/{{ $uni->logo }}" class="img-fluid rounded"  alt="{{$uni->name}}">
                     </a>
                  </div>
               </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
@endif


@endsection
@section('script')

@endsection
