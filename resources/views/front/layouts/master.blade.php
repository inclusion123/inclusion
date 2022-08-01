<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>@yield('title', ' Website and Mobile App Development Company | Web Design | Inclusion Softwares')</title>
        <meta name="keywords" content="@yield('meta_keywords', 'some default keywords')" />
        <meta name="description" content="@yield('meta_description', 'default description')" />
        <link rel="canonical" href="{{ url()->current() }}" />

        @include('front.layouts.css')
    </head>

    <body>
        @include('front.layouts.spinner') @include('front.layouts.topbar')

        <!-- Navbar & Carousel Start -->
        @include('front.layouts.navbar') @yield('carousel')
        <!-- Navbar & Carousel End -->

        <!-- Full Screen Search Start -->
        @include('front.layouts.full_screen_search')
        <!-- Full Screen Search End -->

        @yield('content') {{-- @include('front.layouts.vendor') --}} @include('front.layouts.footer') @include('front.layouts.back_to_top') @include('front.layouts.js_imports')
    </body>
    @yield('script')
</html>
