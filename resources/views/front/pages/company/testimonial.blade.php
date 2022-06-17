@extends('front.layouts.master')
@section('carousel')

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Testimonial</h1>
                    <a href="{{ route('front.index') }}" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="{{ route ('front.testimonial') }}" class="h5 text-white">Testimonial</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    @endsection


    @section('content')-->


  @include('front.pages.testimonial.testimonial_page')

@endsection