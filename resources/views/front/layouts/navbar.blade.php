        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
                <a href="{{ route ('front.index') }}" class="navbar-brand p-0">
                    <!-- <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>Startup</h1> -->
                    <img class="logo-white" src=" {{ asset('front/img/logo-white.png') }}" />
                    <img class="logo-black" src="{{ asset('front/img/logo.png ') }}" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{ route('front.index') }}" class="nav-item nav-link ">Home</a>
                        <a href="{{ route('front.about') }}" class="nav-item nav-link ">About</a>
                        <div class="nav-item dropdown">
                            <a href="{{ route('front.service') }}" class="nav-link dropdown-toggle">Services</a>
                            <div class="dropdown-menu m-0">
                                @foreach ($navbars as $navbar)
                                    

                                    <a href="{{ url('service-detail') }}/{{$navbar->slug}}"
                                        class="dropdown-item">{{$navbar->name}}</a>

                                @endforeach
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route('front.blog_grid') }}" class="dropdown-item">Blog Grid</a>
                                <a href="{{ route('front.blog_detail') }}" class="dropdown-item">Blog Detail</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Company</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route ('front.feature') }}" class="dropdown-item">Our features</a>
                                <a href="{{ route ('front.team_members') }}" class="dropdown-item">Team Members</a>
                                <a href="{{ route ('front.testimonial') }}" class="dropdown-item">Testimonial</a>
                                <a href="{{ route ('front.quote') }}" class="dropdown-item">Free Quote</a>
                            </div>
                        </div>
                        <a href="{{ route ('front.contact') }}" class="nav-item nav-link">Contact</a>
                    </div>

                    <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal"
                        data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                    <!-- <a href="#!" class="btn btn-primary py-2 px-4 ms-3">Download</a> -->
                </div>
            </nav>
        </div>
