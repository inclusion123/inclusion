@extends('front.layouts.master')
{{-- @section('title', $blog->title)
@section('meta_keywords', $blog->meta_keywords)
@section('meta_description', $blog->meta_description) --}}
@section('carousel')
    <div class="container-fluid bg-primary py-4 mb-4 bg-header" style="">
        <div class="row py-4">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Blog Detail</h1>
                <a href="{{ route('front.index') }}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="{{ route('front.blog_detail', $blog->id) }}" class="h5 text-white">Blog Detail</a>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('content')
    <!-- Blog Start -->
    <div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-4">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="{{ asset('storage/images') }}/{{ $blog->image }}"
                            alt="">
                        <h1 class="mb-4">{{ $blog->title }}</h1>
                        {!! $blog->description !!}
                    </div>
                    <!-- Blog Detail End -->

                    <!-- Comment List Start -->
                    <div class="mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">{{$count}} Comments</h3>
                        </div>
                        @foreach ($comments as $comment)
                         
                  
                        <div class="d-flex mb-4">
                            {{-- <img src="{{ asset('front/img/user.jpg') }}" class="img-fluid rounded"
                                style="width: 45px; height: 45px;"> --}}
                            <div class="ps-3">
                                <h6><a href="">  {{ucfirst($comment->commenters_name)	}} </a> <small><i>  {{date('d M Y', strtotime($comment->created_at));}}</i></small></h6>
                                <p>  {{$comment->comment}} </p>
                                {{-- <button class="btn btn-sm btn-light">Reply</button> --}}
                            </div>
                        </div>
                        @endforeach
                        {!! $comments->render() !!}
                        {{-- <div class="d-flex mb-4">
                            <img src="{{ asset('front/img/user.jpg') }}" class="img-fluid rounded"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                                <button class="btn btn-sm btn-light">Reply</button>
                            </div>
                        </div> --}}
                        {{-- <div class="d-flex ms-5 mb-4">
                            <img src="{{ asset('front/img/user.jpg') }}" class="img-fluid rounded"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                                <button class="btn btn-sm btn-light">Reply</button>
                            </div>
                        </div> --}}
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class="bg-light rounded p-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Leave A Comment</h3>
                        </div>
                        <form id="blogCommentForm" class="comment__form" action="{{ route('front.blog.comment') }}"
                            method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="name" id="name"
                                        class="form-control bg-white border-0" placeholder="Your Name"style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email" id="email"
                                        class="form-control bg-white border-0" placeholder="Your Email"
                                        style="height: 55px;">
                                </div>
                                {{-- <div class="col-12">
                                    <input type="text" name="website" class="form-control bg-white border-0"
                                        placeholder="Website" style="height: 55px;">
                                </div> --}}
                                <div class="col-12">
                                    <textarea name="comment" id="comment" class="form-control bg-white border-0" rows="5" placeholder="Comment"></textarea>
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
                                    <button class="btn btn-primary w-100 py-3" type="submit">Leave Your Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End -->
                </div>

               @include('front.pages.blogs._partials.blog_page_sidebar')
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#blogCommentForm").validate({

                rules: {
                    name: {
                        required: true,
                        maxlength: 50
                    },

                    email: {
                        required: true,
                    },

                    // website: {
                    //     required: true,
                    // },
                    comment: {
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
                    // we

                    comment: {
                        required: "Comment is required.",
                    },


                },
            });
        });





        $('#blogCommentForm').on('submit', function(e) {
            e.preventDefault();
            let id = {{ $blog->id }};
            let name = $('#name').val();
            let email = $('#email').val();
            let comment = $('#comment').val();

            $.ajax({
                url: "{{ route('front.blog.comment') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    blog_id: id,
                    name: name,
                    email: email,
                    comment: comment,

                },
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $('#success-message').text(response.success);
                        $("#blogCommentForm")[0].reset();
                        grecaptcha.reset();
                    }
                },
                error: function(response) {
                    $('#name-error').text(response.responseJSON.errors.name);
                    $('#email-error').text(response.responseJSON.errors.email);
                    $('#comment').text(response.responseJSON.errors.comment);

                }
            });
        });

        $('form').on('submit', function(e) {
            if (grecaptcha.getResponse() == "") {
                e.preventDefault();
                $('#captcha_jq').text('Captcha is Invalid.');
                $('#captcha_jq').css("color", "red");
                $('#captcha_jq').css("font-size", "14px");
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
