<!-- Footer Start -->
<div class="container-fluid bg-dark text-light mt-4 wow fadeInUp main__footer_inclusion" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-4 col-md-6 footer-about">
                <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-dark p-4 footer__about">
                    <a href="{{ route ('front.index') }}" class="navbar-brand">
                        <!-- <h1 class="m-0 text-white"><i class="fa fa-user-tie me-2"></i>Startup</h1> -->
                        <img src="{{ asset('front/img/logo-white.png ') }}" />
                    </a>
                    <p class="mt-3 mb-4">
                        Inclusion Software Solutions is an IT consulting and services provider, providing end-to-end consulting for global clients. We partnered with several global SME in building their next generation information
                        infrastructure for competitive advantage. We have significant depth of expertise and experience in Web Development, Web Designing & Mobile Application Development.
                    </p>
                    {{--
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control border-white p-3" placeholder="Your Email" />
                            <button class="btn btn-primary">
                                Sign Up
                            </button>
                        </div>
                    </form>
                    --}}
                </div>
            </div>  

            
            <div class="col-lg-8 col-md-6">
                <div class="row gx-5 footer__links">
                    <div class="col-lg-4 col-md-12 pt-5 mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0">
                                Get In Touch
                            </h3>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0">
                                {{ $setting_helper->address }}
                            </p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-primary me-2"></i>
                            <p class="mb-0">{{ $setting_helper->email }}</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">{{ $setting_helper->mobile }}</p>
                        </div>
                        <div class="d-flex mt-4">
                            <a class="btn btn-primary btn-square me-2" href="{{ $setting_helper->twitter }}"
                                target="_blank"><i class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-primary btn-square me-2" href="{{ $setting_helper->facebook }}"
                                target="_blank"><i class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-primary btn-square me-2" href="{{ $setting_helper->linkedin }}"
                                target="_blank"><i class="fab fa-linkedin-in fw-normal"></i></a>
                            <a class="btn btn-primary btn-square" href="{{ $setting_helper->instagram }}"
                                target="_blank"><i class="fab fa-instagram fw-normal"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0">Quick Links</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="text-light mb-2" href="{{ route('front.index') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                            <a class="text-light mb-2" href="{{ route('front.about') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                            <a class="text-light mb-2" href="{{ route('front.service') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                            <a class="text-light mb-2" href="{{ route('front.team_members') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
                            {{-- <a class="text-light mb-2" href=""><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a> --}}
                            <a class="text-light" href="{{ route('front.contact') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0">
                                Popular Links
                            </h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="text-light mb-2" href="{{ route('front.index') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                            <a class="text-light mb-2" href="{{ route('front.about') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                            <a class="text-light mb-2" href="{{ route('front.service') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                            <a class="text-light mb-2" href="{{ route('front.team_members') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
                            {{-- <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a> --}}
                            <a class="text-light" href="{{ route('front.contact') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                                    <a class="text-light" href="{{ route('front.privacy_policy') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Privacy Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid text-white" style="background: #eb0f26;">
    <div class="container text-center">
        <div class="row justify-content-end">
            <div class="col-lg-8 col-md-6">
                <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                    <p class="mb-0">
                        Copyright &copy;
                        <?php echo date('Y'); ?>
                        <a class="text-white border-bottom" href="{{ route('front.index') }}">Inclusion Software
                            Solutions.</a>
                        All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
