<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
       $seo = Seo::seo('dashboard');
       return view('front.landing_page',compact('seo'));
    }
}
