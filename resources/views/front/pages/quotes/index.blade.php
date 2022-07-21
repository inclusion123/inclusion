@extends('front.layouts.master')
@if($seo)
@section('title', $seo->meta_title)
@section('meta_keywords', $seo->meta_keywords)
@section('meta_description', $seo->meta_description)
@endif
@section('css')
<style>
    .error {
        color: rgb(72, 71, 71);
        /* background-color: #FFF; */
    }
</style>
@endsection
@section('carousel')
    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Free Quote</h1>
                <a href="{{ route('front.index') }}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="{{ route('front.quote') }}" class="h5 text-white">Free Quote</a>
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar End -->
@endsection


@section('content')
 @include('front.pages.quotes._partials.quote_form');
@endsection

@section('script')
@include('front.pages.quotes._partials.quote_form_js');
@endsection
