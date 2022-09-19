@extends('front.layouts.master')
{{-- @if ($seo)
@section('title', $seo->meta_title)
@section('meta_keywords', $seo->meta_keywords)
@section('meta_description', $seo->meta_description)
@endif --}}
@section('carousel')
    <style>
        .main__footer_inclusion {
            margin-top: 0px !important;
        }
    </style>


    <div class="container-fluid bg-primary py-4 mb-0 bg-header" style="">
        <div class="row py-4">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Portfolio</h1>
                <a href="{{ route('front.index') }}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="{{ route('front.portfolio') }}" class="h5 text-white">Portfolio</a>
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar End -->
@endsection


@section('content')
    <!-- Portfolio Gallery Start -->
    <div class="container-fluid py-4 wow fadeInUp portfolio__wrap" data-wow-delay="0.1s">
        <div class="container py-4">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">PROJECT GALLERY</h5>
                {{-- <h1 class="mb-0">Professional Stuffs Ready to Help Your Business</h1> --}}
            </div>
            <div class="row g-5">
                <div class="col-lg-12 wow slideInUp" data-wow-delay="0.3s">
                    <section class="portfolio-section" id="portfolio">
                        <div class="">
                            <div class="portfolio-menu mt-2 mb-4">
                                <nav class="controls">
                                    <button type="button" class="control outline" data-filter="all">All</button>
                                    @foreach ($projectcategory as $category)
                                        <button type="button" class="control outline"
                                            data-filter=".{{ $category->name }}">{{ $category->name }}</button>
                                    @endforeach
                                    {{-- <button type="button" class="control outline" data-filter=".shopi">Shopify</button>
                                    <button type="button" class="control outline" data-filter=".dev">Development</button>
                                    <button type="button" class="control outline" data-filter=".wp">WordPress</button> --}}
                                </nav>
                            </div>
                            <ul class="row portfolio-item">
                                {{-- <li class="mix dev col-xl-3 col-md-4 col-12 col-sm-6 ">
                                    <div class="pd">
                                        <img src="{{ asset('front/img/portfolio-gallery/dev/dev-1.png') }}"
                                            itemprop="thumbnail" alt="Image description" />
                                        <div class="portfolio-overlay">
                                            <div class="overlay-content">
                                                <p class="category">Nrgedge</p>
                                                <a href="https://www.nrgedge.net/" title="View Project" target="_blank">
                                                    <div class="magnify-icon">
                                                        <p><span><i class="fa fa-link" aria-hidden="true"></i></span></p>
                                                    </div>
                                                </a>
                                                <a data-fancybox="item" title="click to zoom-in"
                                                    href="{{ asset('front/img/portfolio-gallery/dev/dev-1.png') }}">
                                                    <div class="magnify-icon">
                                                        <p><span><i class="fa fa-search" aria-hidden="true"></i></span></p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}
                                @foreach ($projectcategory as $category)
                                    @foreach ($category->projects as $project)
                                        <li class="mix {{ $category->name }} col-xl-3 col-md-4 col-12 col-sm-6">
                                            <div class="pd">
                                                <img src="{{ asset('storage/images') }}/{{ $project->image }}"
                                                    itemprop="thumbnail" alt="Image description" />
                                                <div class="portfolio-overlay">
                                                    <div class="overlay-content">
                                                        <p class="category">{{ $project->name }}</p>
                                                        {{-- <a href="https://sannbeauty.com/" title="View Project" target="_blank">
                                                    <div class="magnify-icon">
                                                        <p><span><i class="fa fa-link" aria-hidden="true"></i></span></p>
                                                    </div>
                                                </a> --}}
                                                        <a data-fancybox="item" title="click to zoom-in"
                                                            href="{{ asset('storage/images') }}/{{ $project->image }}"
                                                            data-size="1200x600">
                                                            <div class="magnify-icon">
                                                                <p><span><i class="fa fa-search"
                                                                            aria-hidden="true"></i></span></p>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endforeach


                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Gallery End -->
@endsection

{{-- <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- Mixitup -->
    <script src='js/mixitup.min.js'></script>
    <!-- fancybox -->
    <script src='js/jquery.fancybox.min.js'></script>
    <!-- Fancybox js -->
    <script>
        /*Downloaded from https://www.codeseek.co/ezra_siton/mixitup-fancybox3-JydYqm */
        // 1. querySelector
        var containerEl = document.querySelector(".portfolio-item");
        // 2. Passing the configuration object inline
        //https://www.kunkalabs.com/mixitup/docs/configuration-object/
        var mixer = mixitup(containerEl, {
          animation: {
            effects: "fade translateZ(-100px)",
            effectsIn: "fade translateY(-100%)",
            easing: "cubic-bezier(0.645, 0.045, 0.355, 1)"
          }
        });
        // fancybox insilaze & options //
        $("[data-fancybox]").fancybox({
          loop: true,
          hash: true,
          transitionEffect: "slide",
          /* zoom VS next////////////////////
          clickContent - i modify the deafult - now when you click on the image you go to the next image - i more like this approach than zoom on desktop (This idea was in the classic/first lightbox) */
          clickContent: function(current, event) {
            return current.type === "image" ? "next" : false;
          }
        });
    </script> --}}
