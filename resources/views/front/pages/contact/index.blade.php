@extends('front.layouts.master')
@section('css')
    <style>
        .error {
            color: #F00;
            background-color: #FFF;
        }
    </style>
@endsection
@section('carousel')
    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            {{-- @include('alerts.alerts') --}}
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Contact Us</h1>
                <a href="{{ route('front.index') }}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="{{ route('front.contact') }}" class="h5 text-white">Contact</a>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
@endsection


@section('content')
    <!-- Contact Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Contact Us</h5>
                <h1 class="mb-0">If You Have Any Query, Feel Free To Contact Us</h1>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h5 class="text-primary mb-0">+91 869 9363 865</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Email to get free quote</h5>
                            <h5 class="text-primary mb-0">contact@inclusionsoft.com</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Visit our office</h5>
                            <h5 class="text-primary mb-0">C-167, 1st Floor, Sector 74, Phase 8-B, SAS Nagar, Punjab 160055,
                                India</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form id="contact" action="{{ route('front.contact.save') }}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" placeholder="Your Name"
                                    style="height: 55px;" name="name">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control border-0 bg-light px-4" placeholder="Your Email"
                                    style="height: 55px;" name="email">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control border-0 bg-light px-4" placeholder="Subject"
                                    style="height: 55px;" name="subject">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="Message" name="message"></textarea>
                            </div>
                            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}"
                                id="captur2">
                                <label class="col-md-4 control-label" id="captcha">Captcha</label>
                                <div class="col-md-12">
                                    <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="{{env('NOCAPTCHA_SITEKEY')}}"></div>  


                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <span id="captcha_jq" value=""></span>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3430.382290097686!2d76.6889678!3d30.7076515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fefec95555555%3A0x5039b863a31e724b!2sInclusion%20Software%20Solutions!5e0!3m2!1sen!2sin!4v1654753408408!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection

@section('script')
    <script>
        $("#contact").validate({

            rules: {
                name: {
                    required: true,
                    maxlength: 50
                },

                email: {
                    required: true,
                },

                subject: {
                    required: true,
                },
                message: {
                    required: true,
                },



            },
            messages: {

                name: {
                    required: "Name is required.",
                },
                email: {
                    required: "Email is required.",
                },
                subject: {
                    required: "Subject is required.",
                },
                message: {
                    required: "Message is required.",
                },


            },
        });
        // }
        $('form').on('submit', function(e) {
            if (grecaptcha.getResponse() == "") {
                e.preventDefault();
                $('#captcha_jq').text('Captcha is Invalid.');
                $('#captcha_jq').css("color", "red");
            } else {
                $('#captcha_jq').hide();
            }
        });
    </script>
    <script type="text/javascript">
        function recaptchaCallback() {
            $('#captcha_jq').hide();
        };
    </script>
    
@endsection
