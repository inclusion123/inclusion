@php
$blogs = App\Models\Blog::allBlogs();
$tags = App\Models\Blog::existingTags();
@endphp
<!-- Sidebar Start -->
<div class="col-lg-4">
    <!-- Search Form Start -->
    <form action="">
        <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
            <div class="input-group">
                <input type="text" class="form-control p-3" placeholder="Keyword">
                <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
            </div>
        </div>
    </form>
    <!-- Search Form End -->

    <!-- Category Start -->
    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
        <div class="section-title section-title-sm position-relative pb-3 mb-4">
            <h3 class="mb-0">Categories</h3>
        </div>
        <div class="link-animated d-flex flex-column justify-content-start">
            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i
                    class="bi bi-arrow-right me-2"></i>Web Design</a>
            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i
                    class="bi bi-arrow-right me-2"></i>Web Development</a>
            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i
                    class="bi bi-arrow-right me-2"></i>Web Development</a>
            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i
                    class="bi bi-arrow-right me-2"></i>Keyword Research</a>
            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i
                    class="bi bi-arrow-right me-2"></i>Email Marketing</a>
        </div>
    </div>
    <!-- Category End -->

    <!-- Recent Post Start -->
    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
        <div class="section-title section-title-sm position-relative pb-3 mb-4">
            <h3 class="mb-0">Recent Post</h3>
        </div>

        @foreach ($blogs as $blog)
            <div class="d-flex rounded overflow-hidden mb-3">
                <img class="img-fluid" src="{{ asset('storage/images') }}/{{ $blog->image }}"
                    style="width: 100px; height: 100px; object-fit: cover;" alt="">
                <a href="{{ route('front.blog_detail', ['s' => $blog->slug]) }}"
                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">{{ $blog->title }}
                </a>
            </div>
        @endforeach

    </div>
    <!-- Recent Post End -->

    <!-- Image Start -->
    {{-- <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                <img src="{{ asset('front/img/blog-1.jpg') }}" alt="" class="img-fluid rounded">
            </div> --}}
    <!-- Image End -->

    <!-- Tags Start -->
    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
        <div class="section-title section-title-sm position-relative pb-3 mb-4">
            <h3 class="mb-0">Tag Cloud</h3>
        </div>
        <div class="d-flex flex-wrap m-n1">
            @foreach ($tags as $tag)
                <a href="{{ route('front.blog_detail', ['tag' => $tag->slug]) }}" class="btn btn-light m-1">
                    {{ $tag->name }}</a>
            @endforeach
            {{-- <a href="" class="btn btn-light m-1">Design</a>
                    <a href="" class="btn btn-light m-1">Development</a>
                    <a href="" class="btn btn-light m-1">Marketing</a>
                    <a href="" class="btn btn-light m-1">SEO</a>
                    <a href="" class="btn btn-light m-1">Writing</a>
                    <a href="" class="btn btn-light m-1">Consulting</a>
                    <a href="" class="btn btn-light m-1">Design</a>
                    <a href="" class="btn btn-light m-1">Development</a>
                    <a href="" class="btn btn-light m-1">Marketing</a>
                    <a href="" class="btn btn-light m-1">SEO</a>
                    <a href="" class="btn btn-light m-1">Writing</a>
                    <a href="" class="btn btn-light m-1">Consulting</a> --}}
        </div>
    </div>
    <!-- Tags End -->

    <!-- Plain Text Start -->
    <div class="wow slideInUp" data-wow-delay="0.1s">
        <div class="section-title section-title-sm position-relative pb-3 mb-4">
            <h3 class="mb-0">Plain Text</h3>
        </div>
        <div class="bg-light text-center" style="padding: 30px;">
            <p>Vero sea et accusam justo dolor accusam lorem consetetur, dolores sit amet sit dolor clita
                kasd justo, diam accusam no sea ut tempor magna takimata, amet sit et diam dolor ipsum amet
                diam</p>
            <a href="" class="btn btn-primary py-2 px-4">Read More</a>
        </div>
    </div>
    <!-- Plain Text End -->
</div>
<!-- Sidebar End -->
