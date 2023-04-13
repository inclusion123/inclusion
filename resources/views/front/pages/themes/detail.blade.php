@extends('front.layouts.master')

@section('css')
@endsection

@section('carousel')
    <div class="container-fluid bg-primary py-4 mb-0 bg-header" style="">
        <div class="row py-4">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Templates</h1>
                <a href="{{ route('front.index') }}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="{{ route('front.themes') }}" class="h5 text-white">Templates</a>
                <i class="far fa-dot-circle text-white px-2"></i>
                <a href="" class="h5 text-white">Template Detail</a>
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar End -->
@endsection


@section('content')


    <div class="container-fluid py-4 wow fadeInUp thems__wrap" data-wow-delay="0.1s"
        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
        <div class="container py-4">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 800px;">
                <h5 class="fw-bold text-primary text-uppercase">{{ $item->title }}</h5>
                <h1 class="mb-0">{{ $item->title_description }}</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-7 col-md-7 col-sm-12 col-12 wow slideInUp" data-wow-delay="0.3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: slideInUp;">
                    <div class="themDetail_left">

                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-inner">
                                @foreach ($item->gallery as $index => $gallery)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('themes_image/theme_gallery/' . $gallery->photo) }}"
                                        class="d-block w-100" alt="...">
                                </div>
                                @endforeach
                            </div>
                            <div class="carousel-indicators">
                                @foreach ($item->gallery as $index => $gallery)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$index}}"
                                    class="{{ $index == 0 ? 'active' : '' }} thumbnail"  aria-label="Slide {{$index + 1}}">
                                    <img src="{{ asset('themes_image/theme_gallery/' . $gallery->photo) }}"
                                        class="d-block w-100" alt="...">
                                </button>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-12 wow slideInUp" data-wow-delay="0.3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: slideInUp;">
                    <div class="themDetail_right">
                        <h4 class="mb-3">{{ $item->title }}</h4>
                        <h5 class="mb-3">{{ $item->title_description }}</h5>
                        <ul>
                            @foreach (explode(',', $item->highlight_details) as $highlight_detail)
                                <li>
                                    <p>{{ $highlight_detail }}</p>
                                </li>
                            @endforeach
                        </ul>

                        <a href="{{ $item->download_link }}" target="_blank"
                            class="preview btn btn-primary py-md-3 px-md-5 me-3 preview"><span title="Download"
                                class="fas fa-download"></span>&nbsp; Free Download</a>
                        {{-- <a href="#!" class="download btn py-md-3 px-md-5 me-3">Download</a> --}}
                    </div>
                </div>
            </div>

            <div class="row g-5">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 wow slideInUp" data-wow-delay="0.3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: slideInUp;">
                    <div class="theme__discription">
                        @if (isset($item->discription))
                            <h4>DESCRIPTION</h4>
                            <p>{{str_replace('&nbsp;','', preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6',strip_tags($item->discription)))}}</p>
                        @endif
                        @if (isset($item->included))
                            <h4>INCLUDED</h4>
                            <ul>
                                @foreach (explode(',', $item->included) as $included)
                                    <li>
                                        <p>{{ $included }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        @if (isset($item->features))
                            <h4>FEATURES</h4>
                            <ul>
                                @foreach (explode(',', $item->features) as $feature)
                                    <li>
                                        <p>{{ $feature }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection

@section('script')
@endsection
