<?php

namespace App\Http\Controllers\front\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        return view('front.pages.about.index');
    }
}
