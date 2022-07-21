<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;

class TestimonialController extends Controller
{
    public function index()
    {
        $seo = Seo::seo('testimonial');
        return view('front.pages.testimonial.index',compact('seo'));
    }
}
