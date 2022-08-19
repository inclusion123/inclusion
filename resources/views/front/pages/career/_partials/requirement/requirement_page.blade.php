    <!-- job post company Start -->
    {{-- <div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-4">
            <div class="row g-5">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-5 wow zoomIn" data-wow-delay="0.4s">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img src="{{ asset('front/img/logo.png')}}" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>Web Designer</h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                    <li>$3500 - $4000</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                      <!-- job single End -->
                   
                    <div class="job-post-details">
                        <div class="post-details1 mb-5 wow zoomIn" data-wow-delay="0.4s">
                            <!-- Small Section Tittle -->
                            <div class="section-title section-title-sm position-relative pb-2 mb-3">
                                <h5 class="fw-bold text-primary text-uppercase">Job Description</h5>
                            </div>
                            <p>It is a long established fact that a reader will beff distracted by vbthe creadable content of a page when looking at its layout. The pointf of using Lorem Ipsum is that it has ahf mcore or-lgess normal distribution of letters, as opposed to using, Content here content here making it look like readable.</p>
                        </div>
                        <div class="post-details2  mb-5 wow zoomIn" data-wow-delay="0.4s">
                             <!-- Small Section Tittle -->
                            <div class="section-title section-title-sm position-relative pb-2 mb-3">
                                <h5 class="fw-bold text-primary text-uppercase">Required Knowledge, Skills, and Abilities</h5>
                            </div>
                           <ul>
                               <li>System Software Development</li>
                               <li>Mobile Applicationin iOS/Android/Tizen or other platform</li>
                               <li>Research and code , libraries, APIs and frameworks</li>
                               <li>Strong knowledge on software development life cycle</li>
                               <li>Strong problem solving and debugging skills</li>
                           </ul>
                        </div>
                        <div class="post-details2  mb-5 wow zoomIn" data-wow-delay="0.4s">
                             <!-- Small Section Tittle -->
                            <div class="section-title section-title-sm position-relative pb-2 mb-3">
                                <h5 class="fw-bold text-primary text-uppercase">Education + Experience</h5>
                            </div>
                           <ul>
                               <li>3 or more years of professional design experience</li>
                               <li>Direct response email experience</li>
                               <li>Ecommerce website design experience</li>
                               <li>Familiarity with mobile and web apps preferred</li>
                               <li>Experience using Invision a plus</li>
                           </ul>
                        </div>
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-5 wow zoomIn" data-wow-delay="0.4s">
                        <!-- Small Section Tittle -->
                        <div class="section-title section-title-sm position-relative pb-2 mb-3">
                            <h5 class="fw-bold text-primary text-uppercase">Job Overview</h5>
                        </div>
                      <ul>
                          <li>Posted date : <span>12 Aug 2019</span></li>
                          <li>Location : <span>New York</span></li>
                          <li>Vacancy : <span>02</span></li>
                          <li>Job nature : <span>Full time</span></li>
                          <li>Salary :  <span>$7,800 yearly</span></li>
                          <li>Application date : <span>12 Sep 2020</span></li>
                      </ul>
                     <div class="apply-btn2">
                        <a href="#apply-job" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Apply Now</a>
                     </div>
                   </div>
                    <div class="post-details4  mb-5 wow zoomIn" data-wow-delay="0.4s">
                        <!-- Small Section Tittle -->
                        <div class="section-title section-title-sm position-relative pb-2 mb-3">
                            <h5 class="fw-bold text-primary text-uppercase">Company Information</h5>
                        </div>
                          <span>Inclusion Soft</span>
                          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        <ul>
                            <li>Name: <span>Inclusion Soft </span></li>
                            <li>Web : <span>www.inclusionsoft.com/</span></li>
                            <li>Email: <span>contact@inclusionsoft.com</span></li>
                        </ul>
                   </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- job post company End -->
    <!-- Job Detail Start -->
    <div class="container-fluid py-4 wow fadeInUp" id="view-job" data-wow-delay="0.1s" style="    background-color: #f8f8f8;">
        <div class="container py-4">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">All</h5>
                <h1 class="mb-0">Your Vacancies</h1>
            </div>
            @php
                $requirement = App\Models\Requirement::requirement();
            @endphp
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="row gx-3">
                        @foreach ($requirement as $req)
                            
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <div class="job__detail">
                                <h5 class="job__text mb-4">{{$req->name}} <a href="{{route('front.career.jobDetail',$req->slug)}}" class="btn btn-primary wow zoomIn">View Job</a></h5>
                                <p class="positions"><span><b>Number of Positions :</b></span> 0{{$req->position}}</p>
                                <p class="experience"><span><b>Experience :</b></span> {{$req->experience}}-Years</p>
                                <p class="description"><span><b>Description :</b></span><br>
                                    {!!$req->description!!}
                                </p>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <div class="job__detail">
                                <h5 class="job__text mb-4">UI/UX Designer<a href="#!" class="btn btn-primary wow zoomIn">View Job</a></h5>
                                <p class="positions"><span><b>Number of Positions :</b></span> 03</p>
                                <p class="experience"><span><b>Experience :</b></span> 2-Years</p>
                                <p class="description"><span><b>Description :</b></span><br>
                                    Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <div class="job__detail">
                                <h5 class="job__text mb-4">Business Analyst<a href="#!" class="btn btn-primary wow zoomIn">View Job</a></h5>
                                <p class="positions"><span><b>Number of Positions :</b></span> 03</p>
                                <p class="experience"><span><b>Experience :</b></span> 2-Years</p>
                                <p class="description"><span><b>Description :</b></span><br>
                                    Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <div class="job__detail">
                            <h5 class="job__text mb-4">Web Designer<a href="#!" class="btn btn-primary wow zoomIn">View Job</a></h5>
                                <p class="positions"><span><b>Number of Positions :</b></span> 03</p>
                                <p class="experience"><span><b>Experience :</b></span> 2-Years</p>
                                <p class="description"><span><b>Description :</b></span><br>
                                    Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <div class="job__detail">
                            <h5 class="job__text mb-4">Product Manager<a href="#!" class="btn btn-primary wow zoomIn">View Job</a></h5>
                                <p class="positions"><span><b>Number of Positions :</b></span> 03</p>
                                <p class="experience"><span><b>Experience :</b></span> 2-Years</p>
                                <p class="description"><span><b>Description :</b></span><br>
                                    Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <div class="job__detail">
                            <h5 class="job__text mb-4">Junior Back Developer<a href="#!" class="btn btn-primary wow zoomIn">View Job</a></h5>
                                <p class="positions"><span><b>Number of Positions :</b></span> 03</p>
                                <p class="experience"><span><b>Experience :</b></span> 2-Years</p>
                                <p class="description"><span><b>Description :</b></span><br>
                                    Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <div class="job__detail">
                            <h5 class="job__text mb-4">UI/UX Designer<a href="#!" class="btn btn-primary wow zoomIn">View Job</a></h5>
                                <p class="positions"><span><b>Number of Positions :</b></span> 03</p>
                                <p class="experience"><span><b>Experience :</b></span> 2-Years</p>
                                <p class="description"><span><b>Description :</b></span><br>
                                    Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                                </p>
                            </div>
                        </div> --}}

                        {{-- <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <div class="job__detail">
                            <h5 class="job__text mb-4">Business Analyst<a href="#!" class="btn btn-primary wow zoomIn">View Job</a></h5>
                                <p class="positions"><span><b>Number of Positions :</b></span> 03</p>
                                <p class="experience"><span><b>Experience :</b></span> 2-Years</p>
                                <p class="description"><span><b>Description :</b></span><br>
                                    Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                                </p>
                            </div>
                        </div> --}}

                        {{-- <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <div class="job__detail">
                            <h5 class="job__text mb-4">Web Designer<a href="#!" class="btn btn-primary wow zoomIn">View Job</a></h5>
                                <p class="positions"><span><b>Number of Positions :</b></span> 03</p>
                                <p class="experience"><span><b>Experience :</b></span> 2-Years</p>
                                <p class="description"><span><b>Description :</b></span><br>
                                    Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                                </p>
                            </div>
                        </div> --}}

                        {{-- <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <div class="job__detail">
                            <h5 class="job__text mb-4">Product Manager<a href="#!" class="btn btn-primary wow zoomIn">View Job</a></h5>
                                <p class="positions"><span><b>Number of Positions :</b></span> 03</p>
                                <p class="experience"><span><b>Experience :</b></span> 2-Years</p>
                                <p class="description"><span><b>Description :</b></span><br>
                                    Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                                </p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->