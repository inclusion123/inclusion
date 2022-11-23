@extends('front.layouts.master')

@if($seo)
@section('title', $seo->meta_title)
@section('meta_keywords', $seo->meta_keywords)
@section('meta_description', $seo->meta_description)
@endif
@section('css')
    <style>
        .error {
            color: rgb(72, 71, 71);
            /* background-color: #FFF; */
        }
    </style>
@endsection
@section('carousel')
    <div id="header-carousel" class="carousel slide carousel-fade mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            @php
                $banners = App\Models\Banner::banner();
            @endphp
            @foreach ($banners as $banner)
                <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}"">
                    <img class="w-100" src=" {{ asset('images') }}/{{ $banner->image }}" alt="Image" />
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">
                                {{ $banner->name }}
                            </h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">
                                {{ $banner->title }}
                            </h1>
                            <a href="{{ route('front.quote') }}"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free
                                Quote</a>
                            <a href="{{ route('front.contact') }}"
                                class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>
@endsection
@section('content')
    {{-- @include('front.pages.facts.index') --}}

    @include('front.pages.about._partials.about_us_page')

    {{-- @include('front.pages.features._partials.feature_page') --}}

    @include('front.pages.services._partials.our_service_page')
    @include('front.pages.black_friday')
    <!-- Pricing Plan Start -->
    <!-- <div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="container py-4">
                                            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                                                <h5 class="fw-bold text-primary text-uppercase">Pricing Plans</h5>
                                                <h1 class="mb-0">We are Offering Competitive Prices for Our Clients</h1>
                                            </div>
                                            <div class="row g-0">
                                                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                                                    <div class="bg-light rounded">
                                                        <div class="border-bottom py-4 px-5 mb-4">
                                                            <h4 class="text-primary mb-1">Basic Plan</h4>
                                                            <small class="text-uppercase">For Small Size Business</small>
                                                </div>
                                                <div class="p-5 pt-0">
                                                    <h1 class="display-5 mb-3">
                                                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>49.00<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                                                    </h1>
                                                    <div class="d-flex justify-content-between mb-3"><span>HTML5 & CSS3</span><i class="fa fa-check text-primary pt-1"></i></div>
                                                    <div class="d-flex justify-content-between mb-3"><span>Bootstrap v5</span><i class="fa fa-check text-primary pt-1"></i></div>
                                                    <div class="d-flex justify-content-between mb-3"><span>Responsive Layout</span><i class="fa fa-times text-danger pt-1"></i></div>
                                                    <div class="d-flex justify-content-between mb-2"><span>Cross-browser Support</span><i class="fa fa-times text-danger pt-1"></i></div>
                                                    <a href="" class="btn btn-primary py-2 px-4 mt-4">Order Now</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                                            <div class="bg-white rounded shadow position-relative" style="z-index: 1;">
                                                <div class="border-bottom py-4 px-5 mb-4">
                                                    <h4 class="text-primary mb-1">Standard Plan</h4>
                                                    <small class="text-uppercase">For Medium Size Business</small>
                                                </div>
                                                <div class="p-5 pt-0">
                                                    <h1 class="display-5 mb-3">
                                                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>99.00<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                                                    </h1>
                                                    <div class="d-flex justify-content-between mb-3"><span>HTML5 & CSS3</span><i class="fa fa-check text-primary pt-1"></i></div>
                                                    <div class="d-flex justify-content-between mb-3"><span>Bootstrap v5</span><i class="fa fa-check text-primary pt-1"></i></div>
                                                    <div class="d-flex justify-content-between mb-3"><span>Responsive Layout</span><i class="fa fa-check text-primary pt-1"></i></div>
                                                    <div class="d-flex justify-content-between mb-2"><span>Cross-browser Support</span><i class="fa fa-times text-danger pt-1"></i></div>
                                                    <a href="" class="btn btn-primary py-2 px-4 mt-4">Order Now</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                                            <div class="bg-light rounded">
                                                <div class="border-bottom py-4 px-5 mb-4">
                                                    <h4 class="text-primary mb-1">Advanced Plan</h4>
                                                    <small class="text-uppercase">For Large Size Business</small>
                                                </div>
                                                <div class="p-5 pt-0">
                                                    <h1 class="display-5 mb-3">
                                                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>149.00<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                                                    </h1>
                                                    <div class="d-flex justify-content-between mb-3"><span>HTML5 & CSS3</span><i class="fa fa-check text-primary pt-1"></i></div>
                                                    <div class="d-flex justify-content-between mb-3"><span>Bootstrap v5</span><i class="fa fa-check text-primary pt-1"></i></div>
                                                    <div class="d-flex justify-content-between mb-3"><span>Responsive Layout</span><i class="fa fa-check text-primary pt-1"></i></div>
                                                    <div class="d-flex justify-content-between mb-2"><span>Cross-browser Support</span><i class="fa fa-check text-primary pt-1"></i></div>
                                                    <a href="" class="btn btn-primary py-2 px-4 mt-4">Order Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div> -->
    <!-- Pricing Plan End -->

    @include('front.pages.quotes._partials.quote_form')

    @include('front.pages.testimonial._partials.testimonial_page')

    {{-- @include('front.pages.team._partials.team_member_page') --}}

    {{-- @include('front.pages.blogs._partials.latest_blog_page') --}}
@endsection


@section('script')
    @include('front.pages.quotes._partials.quote_form_js')
    <script>
    // $ (window).ready (function () {
    //     setTimeout (function () {
    //         $ ('#modal-black-friday').modal ("show")
    //     }, 3000)
    // })
</script>
@endsection
