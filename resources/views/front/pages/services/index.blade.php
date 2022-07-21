@extends('front.layouts.master')

{{-- @section('title', $post->title)
@section('meta_keywords', $post->meta_keywords)
@section('meta_description', $post->meta_description) --}}


@section('carousel')
    {{-- <div class="container-fluid position-relative p-0"> --}}

    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Services</h1>
                <a href="{{ route('front.index') }}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="{{ route('front.service') }}" class="h5 text-white">Services</a>
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endsection


@section('content')
@include('front.pages.services._partials.our_service_page')


@include('front.pages.testimonial._partials.testimonial_page')
@endsection
