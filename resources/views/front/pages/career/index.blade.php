@extends('front.layouts.master')
@if($seo)
@section('title', $seo->meta_title)
@section('meta_keywords', $seo->meta_keywords)
@section('meta_description', $seo->meta_description)
@endif
@section('carousel')
<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">Career</h1>
            <a href="" class="h5 text-white">Home</a>
            <i class="far fa-circle text-white px-2"></i>
            <a href="" class="h5 text-white">Career</a>
        </div>
    </div>
</div> 
@endsection
@section('content')

@include('front.pages.career._partials.cpbody_page')


@include('front.pages.career._partials.belieficon_page')


{{-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Current Opportunities</h5>
            <h1 class="mb-0">Professional Stuffs Ready to Help Your Business</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-12">
                <div class="careercontent">
                    <div class="ctbutton buttontwo">
                        <a href="#view-job" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">View Jobs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@include('front.pages.career._partials.requirement.requirement_page')

@include('front.pages.career._partials.job_form')
@endsection

@section('script')
    @include('front.pages.career._partials.job_form_js')
@endsection