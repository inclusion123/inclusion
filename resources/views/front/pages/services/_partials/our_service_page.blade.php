    <!-- Service Start -->
    <div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-4">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Our Services</h5>
                <h1 class="mb-0">The State-Of-Art IT Services We Offer</h1>
            </div>
            <div class="row g-5">
                @foreach ($navbars as $navbar)
                    
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item-wrap">
                        <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="service-icon">
                                <i class="{{$navbar->icon}} text-white"></i>
                            </div>
                            <h4 class="mb-3">{{$navbar->name}}</h4>
                            <p class="m-0">{{$navbar->title}}</p>
                            <a class="btn btn-lg btn-primary rounded" href="{{url('service/'.$navbar->slug)}}">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                    
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div
                        class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">
                        <h3 class="text-white mb-3">Call Us For Quote</h3>
                        <p class="text-white mb-3">
                            24 hrs telephone support 
                            Please Feel Free to Contact Us</p>
                        <h2 class="text-white mb-0">{{$setting_helper->mobile}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->