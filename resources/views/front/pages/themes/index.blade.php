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
                <a href="#!" class="h5 text-white">Themes</a>
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
                <h5 class="fw-bold text-primary text-uppercase">Free Bootstrap Templates</h5>
                <h1 class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-12 wow slideInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: slideInUp;">
                    <section class="thems__header">
                        <div class="thems_Hfilter">
                            <div class="hfilter__left">
                                <p>Category</p>
                                <select class="select">
                                    @if(isset($categories))
                                    @foreach($categories as $category)
                                    <option>{{$category->name}}</option>
                                    @endforeach
                                    @endif
                                    {{-- <option>landing Page</option>
                                    <option>Forms</option>
                                    <option>All</option>
                                    <option>All</option> --}}
                                </select>
                            </div>
                            <div class="hfilter__right">
                                <div class="techonology">
                                    <p>Technologies</p>
                                    <div class="techonology__check">
                                        @if(isset($tags))
                                        @foreach($tags as $tag)
                                        <label class="container-check">{{$tag->name}}
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                        @endforeach
                                        @endif
                                        {{-- <label class="container-check">Angular
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container-check">Vue
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label> --}}
                                    </div>
                                </div>
                                <div class="techonology ml-2">
                                    <p>Price</p>
                                    <div class="techonology__check">
                                        <label class="container-check">Pro
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container-check">Free
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <hr class="mt-3 mb-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 wow slideInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: slideInUp;">
                    <div class="template-card">
                        <picture class="flex-shrink-0">
                            <a href="#!">
                                <img src="https://inclusionsoft.com/storage/images/tVdt -HuW4Klekktic (1).png" loading="lazy" class="img-fluid" alt="Arsha - Free Corporate Bootstrap HTML Template" width="800" height="600" />
                                <div class="image__overlay">
                                </div>
                            </a>
                        </picture>
                        <div class="details">
                            <h2><a href="#!" rel="bookmark">Free Bootstrap HTML Template</a></h2>
                            <div class="buttons">
                                <a href="#!" class="download"><span title="Download" class="fas fa-download"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 wow slideInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: slideInUp;">
                    <div class="template-card">
                        <picture class="flex-shrink-0">
                            <a href="#!">
                                <img src="https://inclusionsoft.com/storage/images/wDKM -Dancing Leopard _ Discover Women's Boutique Clothing Online_11zon.png" loading="lazy" class="img-fluid" alt="Arsha - Free Corporate Bootstrap HTML Template" width="800" height="600" />
                                <div class="image__overlay">
                                </div>
                            </a>
                        </picture>
                        <div class="details">
                            <h2><a href="#!" rel="bookmark">Free Bootstrap HTML Template</a></h2>
                            <div class="buttons">
                                <a href="#!" class="download"><span title="Download" class="fas fa-download"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 wow slideInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: slideInUp;">
                    <div class="template-card">
                        <picture class="flex-shrink-0">
                            <a href="#!">
                                <img src="https://inclusionsoft.com/storage/images/65ZT -Steinberger Superfoods - Mikronährstoffreich. Natürlich. Lecker..png" loading="lazy" class="img-fluid" alt="Arsha - Free Corporate Bootstrap HTML Template" width="800" height="600" />

                                <div class="image__overlay">
                                </div>
                            </a>
                        </picture>
                        <div class="details">
                            <h2><a href="#!" rel="bookmark">Free Bootstrap HTML Template</a></h2>
                            <div class="buttons">
                                <a href="#!" class="download"><span title="Download" class="fas fa-download"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 wow slideInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: slideInUp;">
                    <div class="template-card">
                        <picture class="flex-shrink-0">
                            <a href="#!">
                                <img src="https://inclusionsoft.com/storage/images/tVdt -HuW4Klekktic (1).png" loading="lazy" class="img-fluid" alt="Arsha - Free Corporate Bootstrap HTML Template" width="800" height="600" />
                                <div class="image__overlay">
                                </div>
                            </a>
                        </picture>
                        <div class="details">
                            <h2><a href="#!" rel="bookmark">Free Bootstrap HTML Template</a></h2>
                            <div class="buttons">
                                <a href="#!" class="download"><span title="Download" class="fas fa-download"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 wow slideInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: slideInUp;">
                    <div class="template-card">
                        <picture class="flex-shrink-0">
                            <a href="#!">
                                <img src="https://inclusionsoft.com/storage/images/wDKM -Dancing Leopard _ Discover Women's Boutique Clothing Online_11zon.png" loading="lazy" class="img-fluid" alt="Arsha - Free Corporate Bootstrap HTML Template" width="800" height="600" />
                                <div class="image__overlay">
                                </div>
                            </a>
                        </picture>
                        <div class="details">
                            <h2><a href="#!" rel="bookmark">Free Bootstrap HTML Template</a></h2>
                            <div class="buttons">
                                <a href="#!" class="download"><span title="Download" class="fas fa-download"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 wow slideInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: slideInUp;">
                    <div class="template-card">
                        <picture class="flex-shrink-0">
                            <a href="#!">
                                <img src="https://inclusionsoft.com/storage/images/65ZT -Steinberger Superfoods - Mikronährstoffreich. Natürlich. Lecker..png" loading="lazy" class="img-fluid" alt="Arsha - Free Corporate Bootstrap HTML Template" width="800" height="600" />

                                <div class="image__overlay">
                                </div>
                            </a>
                        </picture>
                        <div class="details">
                            <h2><a href="#!" rel="bookmark">Free Bootstrap HTML Template</a></h2>
                            <div class="buttons">
                                <a href="#!" class="download"><span title="Download" class="fas fa-download"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('script')


@endsection
