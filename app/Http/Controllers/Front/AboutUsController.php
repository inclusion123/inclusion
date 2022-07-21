<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Models\Seo;

class AboutUsController extends Controller
{
    public function index()
    {
        $seo = Seo::seo('about');
        return view('front.pages.about.index',compact('seo'));
    }
}
