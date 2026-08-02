@extends('front.layouts.main')
@section('title', 'University')
@section('description','Description')
@section('content')

<section class="breadcrumb__area breadcrumb__bg" data-background="/web-assets/img/bg/breadcrumb_bg.jpg">
    <div class="container">
       <div class="row">
          <div class="col-12">
             <div class="breadcrumb__content">
                <h1 class="title">Top {{$mode->name }} Universities</h1>
                <nav class="breadcrumb">
                   <span property="itemListElement" typeof="ListItem">
                   <a href="/">Home</a>
                   </span>
                   <span class="breadcrumb-separator"><i class="flaticon-right-arrow"></i></span>
                   <span property="itemListElement" typeof="ListItem">universitiy</span>
                </nav>
             </div>
          </div>
       </div>
    </div>
 </section>
 <section class="project__area-four pt-60 pb-40">
    <div class="container">
        <div class="row gutter-24">
            @foreach($university as $uni)
            <div class="col-lg-3 col-md-6">
                <div class="project__item-three card shadow">
                    <div class="project__thumb-three text-center">
                        <a href="/university/{{$uni->slug}}"><img src="/{{$uni->logo}}" alt="{{$uni->logo_alt}}"></a>
                        <span>{{$uni->location}}</span>
                        <h6 class="title"><a href="/university/{{$uni->slug}}">{{$uni->name}}</a></h6>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
@section('script')

@endsection
