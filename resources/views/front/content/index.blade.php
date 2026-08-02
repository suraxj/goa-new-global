@extends('front.layouts.main')
@section('title', 'Home')
@section('description', 'Description')
@section('content')
    @include('front.parts.banner')
    @include('front.parts.about')
    @include('front.parts.calculator')
    @include('front.parts.flip-benefits')
    @include('front.parts.course')
    @include('front.parts.approval')
    @include('front.parts.process')
    @include('front.parts.dream')
    @include('front.parts.testimonial')
    @include('front.parts.blog')
    @include('front.parts.faq')
    @include('front.parts.cta')
    @include('front.parts.floating-contact')
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#bannerSearch').on('input', function() {
                let searchVal = $(this).val();
                console.log(searchVal);
                $.ajax({
                    type: 'GET',
                    url: '/getSearchResults',
                    data: {
                        search_val: searchVal
                    },
                    success: function(data) {
                        $('#resultDiv').html(data).removeClass('d-none');

                    }
                })
            });
        })
    </script>
@endsection
