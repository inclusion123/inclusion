@extends('front.layouts.master')

@section('css')

@endsection

@section('carousel')
    <div class="container-fluid bg-primary py-4 mb-0 bg-header" style="">
        <div class="row py-4">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Themes</h1>
                <a href="{{ route('front.index') }}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="{{route('front.themes')}}" class="h5 text-white">Themes</a>
                <i class="far fa-dot-circle text-white px-2"></i>
                <a href="" class="h5 text-white" >Themes Detail</a>
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar End -->
@endsection


@section('content')


    <div class="container-fluid py-4 wow fadeInUp thems__wrap" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
        <div class="container py-4">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 800px;">
                <h5 class="fw-bold text-primary text-uppercase">{{$item->title}}</h5>
                <h1 class="mb-0">{{$item->title_description}}</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-7 col-md-7 col-sm-12 col-12 wow slideInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: slideInUp;">
                    <div class="themDetail_left">
                        {{-- <picture class="flex-shrink-0">
                            <a href="#!">
                                <img src="https://inclusionsoft.com/storage/images/tVdt -HuW4Klekktic (1).png" loading="lazy" class="img-fluid" alt="Arsha - Free Corporate Bootstrap HTML Template" width="800" height="600" />
                            </a>
                        </picture> --}}
                        <div id="theme-carousel" class="carousel theme-carousel slide carousel-fade mb-0" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @if(count($item->gallery))
                                @foreach($item->gallery as $index =>  $gallery)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <img class="w-100" src="{{asset('themes_image/theme_gallery/'.$gallery->photo)}}" alt="Image" />
                                        {{-- <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                        </div> --}}
                                    </div>

                                @endforeach
                                @else
                                <div class="carousel-item active">
                                    <img class="w-100" src="{{asset('themes_image/featured_image/'.$item->featured_image)}}" alt="Image" />
                                    {{-- <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    </div> --}}
                                </div>
                                @endif
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#theme-carousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#theme-carousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-12 wow slideInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: slideInUp;">
                    <div class="themDetail_right">
                        <h2>{{$item->title}}</h2>
                        <h3>{{$item->title_description}}</h3>
                        <ul>
                            @foreach (explode(',', $item->highlight_details) as $highlight_detail)

                            <li><p>{{$highlight_detail}}</p></li>
                            {{-- <li><p>Lorem Ipsum is simply dummy tex</p></li>
                            <li><p>Lorem Ipsum is simply dummy tex</p></li>
                            <li><p>Lorem Ipsum is simply dummy tex</p></li>
                            <li><p>Lorem Ipsum is simply dummy tex</p></li>
                            <li><p>Lorem Ipsum is simply dummy tex</p></li> --}}
                            @endforeach
                        </ul>

                        <a href="{{$item->download_link}}" target="_blank" class="preview btn btn-primary py-md-3 px-md-5 me-3 preview"><span title="Download" class="fas fa-download">   Free Download</span></a>
                        {{-- <a href="#!" class="download btn py-md-3 px-md-5 me-3">Download</a> --}}
                    </div>
                </div>
            </div>

            <div class="row g-5">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 wow slideInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: slideInUp;">
                    <div class="theme__discription">
                        @if(isset($item->discription))
                        <h2>DESCRIPTION</h2>
                        <p>{!! $item->discription !!}
                        </p>
                        @endif
                        {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged.
                        </p> --}}
                        @if(isset($item->included))
                        <h2>INCLUDED</h2>
                        <ul>
                            @foreach (explode(',', $item->included) as $included)
                            <li><p>{{$included}}</p></li>
                            {{-- <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p></li>
                            <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p></li>
                            <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p></li>
                            <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p></li> --}}
                            @endforeach
                        </ul>
                        @endif
                        @if(isset($item->features))
                        <h2>FEATURES</h2>
                        <ul>
                            @foreach (explode(',', $item->features) as $feature)
                            <li><p>{{$feature}}</p></li>
                            {{-- <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p></li>
                            <li><p>Lorem Ipsum is simply dummy text of the printing </p></li>
                            <li><p>Lorem Ipsum is simply dummy text of the printing</p></li>
                            <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p></li> --}}
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
