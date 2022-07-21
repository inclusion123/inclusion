@extends('front.layouts.master')

@if ($seo)
    @section('title', $seo->meta_title)
    @section('meta_keywords', $seo->meta_keywords)
    @section('meta_description', $seo->meta_description)
@endif

@section('carousel')
    <div class="container-fluid position-relative p-0">


        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">
                        About Us
                    </h1>
                    <a href="{{ route('front.index') }}" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="{{ route('front.about') }}" class="h5 text-white">About</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @include('front.pages.about._partials.about_us_page')

    {{-- @include('front.pages.team._partials.team_member_page') --}}
@endsection
