@extends('front.layouts.master')

{{-- @section('title', $service->meta_title)
@section('meta_keywords', $service->meta_keywords)
@section('meta_description', $service->meta_description) --}}

@section('carousel')
    <div class="container-fluid bg-primary py-4 mb-4 bg-header" style="">
        <div class="row py-4">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Services</h1>
                <a href="{{ route('front.index') }}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h5 text-white">{{ $service->name }}</a>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <!-- Section Start -->
    <div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-4">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 800px;">
                <h5 class="fw-bold text-primary text-uppercase">{{ $service->page_name }}</h5>
                <h1 class="mb-0">{{ $service->title }}</h1>
            </div>
            <p class="mb-4">{!! $service->description !!}
                <br>
                {{-- <br>
                Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor eirmod
                magna dolore erat amet
                Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor eirmod
                magna dolore erat amet
                Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor eirmod
                magna dolore erat amet --}}
            </p>
        </div>
    </div>
    <!-- Section Start -->

    <!-- Section Start -->
    <div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-4">
            <div class="row g-5 indus__row">
                <div class="col-6 col-md">
                    <div class="indus__box">
                        <img src="{{ asset('front/img/services-icons/healthcare.png') }}">
                        <p>Healthcare</p>
                    </div>
                </div>
                <div class="col-6 col-md">
                    <div class="indus__box">
                        <img src="{{ asset('front/img/services-icons/demand.png') }}">
                        <p>On-Demand</p>
                    </div>
                </div>
                <div class="col-6 col-md">
                    <div class="indus__box">
                        <img src="{{ asset('front/img/services-icons/chat.png') }}">
                        <p>Social Media</p>
                    </div>
                </div>
                <div class="col-6 col-md">
                    <div class="indus__box">
                        <img src="{{ asset('front/img/services-icons/tray.png') }}">
                        <p>Restaurants</p>
                    </div>
                </div>
                <div class="col-6 col-md">
                    <div class="indus__box">
                        <img src="{{ asset('front/img/services-icons/online.png') }}">
                        <p>Fintech</p>
                    </div>
                </div>
                <div class="col-6 col-md">
                    <div class="indus__box">
                        <img src="{{ asset('front/img/services-icons/cinema.png') }}">
                        <p>Entertainment</p>
                    </div>
                </div>
                <div class="col-6 col-md">
                    <div class="indus__box">
                        <img src="{{ asset('front/img/services-icons/world.png') }}">
                        <p>Travel</p>
                    </div>
                </div>
                <div class="col-6 col-md">
                    <div class="indus__box">
                        <img src="{{ asset('front/img/services-icons/trophy.png') }}">
                        <p>Sports</p>
                    </div>
                </div>
                <div class="col-6 col-md">
                    <div class="indus__box">
                        <img src="{{ asset('front/img/services-icons/e-commerce.png') }}">
                        <p>Ecommerce</p>
                    </div>
                </div>
                <div class="col-6 col-md">
                    <div class="indus__box">
                        <img src="{{ asset('front/img/services-icons/monitor.png') }}">
                        <p>Edtech</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Start -->

    <!-- Section Start -->
    <div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-4">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 800px;">
                <h5 class="fw-bold text-primary text-uppercase">{{ $service->detail_name }} </h5>
                <h1 class="mb-0"> {!! $service->detail_description !!}</h1>
            </div>

            @foreach ($service->childService as $key=> $child_service)
                @if($key % 2 == 0)
                <div class="row experties___contant mt-4 mb-4">
                    <div class="col-md-4 col-sm-4 col-12">
                        <div class="experties-img">
                            <img src="{{asset('/storage/images') }}/{{$child_service->image}}">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-12">
                        <div class="experties-cnt">
                            <h3 class="mb-3"> {{ $child_service->name }}</h3>
                            <p class="mb-4">{!! $child_service->	description !!}</p>
                        </div>
                    </div>
                </div>
                @else
                <div class="row experties___contant mt-4 mb-4">
                    <div class="col-md-8 col-sm-8 col-12">
                        <div class="experties-cnt">
                            <h3 class="mb-3"> {{ $child_service->name }}</h3>
                            <p class="mb-4">{!! $child_service->	description !!}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-12">
                        <div class="experties-img">
                            <img src="{{asset('/storage/images') }}/{{$child_service->image}}">
                        </div>
                    </div>
                    
                </div>
                @endif
            @endforeach
            {{-- <div class="row g-5 mt-5 mb-5">
                <div class="col-md-8 col-sm-8 col-12">
                    <div class="experties-cnt">
                        <h3 class="mb-3">Android</h3>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                            Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem
                            sit. Sanctus clita duo justo et tempor eirmod magna dolore erat amet
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et
                            eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo
                            justo et tempor eirmod magna dolore erat amet
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et
                            eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo
                            justo et tempor eirmod magna dolore erat amet</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12">
                    <div class="experties-img">
                        <img src="img/services-icons/android.png">
                    </div>
                </div>
            </div> --}}

            {{-- <div class="row g-5 mt-5 mb-5">
                <div class="col-md-4 col-sm-4 col-12">
                    <div class="experties-img">
                        <img src="img/services-icons/flutter.png">
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-12">
                    <div class="experties-cnt">
                        <h3 class="mb-3">Flutter</h3>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                            Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem
                            sit. Sanctus clita duo justo et tempor eirmod magna dolore erat amet
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et
                            eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo
                            justo et tempor eirmod magna dolore erat amet
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et
                            eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo
                            justo et tempor eirmod magna dolore erat amet</p>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="row g-5 mt-5 mb-5">
                <div class="col-md-8 col-sm-8 col-12">
                    <div class="experties-cnt">
                        <h3 class="mb-3">React Native</h3>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                            Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem
                            sit. Sanctus clita duo justo et tempor eirmod magna dolore erat amet
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et
                            eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo
                            justo et tempor eirmod magna dolore erat amet
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et
                            eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo
                            justo et tempor eirmod magna dolore erat amet</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12">
                    <div class="experties-img">
                        <img src="img/services-icons/physics.png">
                    </div>
                </div>
            </div> --}}

            {{-- <div class="row g-5 mt-5 mb-5">
                <div class="col-md-4 col-sm-4 col-12">
                    <div class="experties-img">
                        <img src="img/services-icons/swift.png">
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-12">
                    <div class="experties-cnt">
                        <h3 class="mb-3">Swift</h3>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                            Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem
                            sit. Sanctus clita duo justo et tempor eirmod magna dolore erat amet
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et
                            eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo
                            justo et tempor eirmod magna dolore erat amet
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et
                            eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo
                            justo et tempor eirmod magna dolore erat amet</p>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="row g-5 mt-5 mb-5">
                <div class="col-md-8 col-sm-8 col-12">
                    <div class="experties-cnt">
                        <h3 class="mb-3">Kotlin</h3>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                            Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem
                            sit. Sanctus clita duo justo et tempor eirmod magna dolore erat amet
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et
                            eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo
                            justo et tempor eirmod magna dolore erat amet
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et
                            eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo
                            justo et tempor eirmod magna dolore erat amet</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12">
                    <div class="experties-img">
                        <img src="img/services-icons/kotlin.png">
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Section Start -->

    {{-- @include('front.pages.blogs._partials.latest_blog_page') --}}
@endsection
