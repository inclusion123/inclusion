<?php

namespace App\Http\Controllers\front\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        return view('front.pages.services.service');
    }
    public function mobile_development()
    {
        return view('front.pages.services.service-mobile-development');
    }
    public function web_development()
    {
        return view('front.pages.services.service-web-development');
    }
    public function game_development()
    {
        return view('front.pages.services.service-game-development');
    }
    public function mvp_development()
    {
        return view('front.pages.services.service-mvp-development');
    }
    public function hire_developers()
    {
        return view('front.pages.services.service-hire-developer');
    }
    public function ecommerce_development()
    {
        return view('front.pages.services.service-ecommerce-development');
    }
    public function cms_development()
    {
        return view('front.pages.services.service-cms-development');
    }
    public function digital_marketing()
    {
        return view('front.pages.services.service-digital-marketing');
    }
    public function software_testing()
    {
        return view('front.pages.services.service-software-testing');
    }
}
