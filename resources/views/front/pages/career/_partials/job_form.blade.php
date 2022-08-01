    <!-- Job Form Start -->
    <div class="container-fluid py-5 mb-5 job__formWrap wow fadeInUp" data-wow-delay="0.1s" id="jobFormSection">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <!-- <h5 class="fw-bold text-primary text-uppercase">All</h5> -->
                <h1 class="text-light mb-0">Enter Your Detail</h1>
            </div>
            <div class="row g-5" >
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn"
                        data-wow-delay="0.9s">
                        <form class="career__form" id="jobForm" action="{{ route('front.career.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <input type="text" name="name" class="form-control bg-light border-0"
                                        placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="email" name="email" class="form-control bg-light border-0"
                                        placeholder="Your Email" style="height: 55px;">
                                </div>
                                {{-- <div class="col-12">
                                    <select name="profile" class="form-select bg-light border-0" style="height: 55px;">
                                        <option value="">Select Job</option>
                                        <option value="Business Analyst">Business Analyst</option>
                                        <option value="Web Designer">Web Designer</option>
                                        <option value="Product Manager">Product Manager</option>
                                        <option value="Junior Back Developer">Junior Back Developer</option>
                                        <option value="UI/UX Designer">UI/UX Designer</option>
                                    </select>
                                </div> --}}
                                <div class="col-12">
                                    {{-- <label class="custom-file-label" for="chooseFile"></label> --}}
                                    <input type="file" name="cv" class="form-control bg-light border-0" id="cv" >
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control bg-light border-0" rows="3" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
    <!-- Job Form End -->
