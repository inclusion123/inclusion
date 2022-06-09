<?php

namespace App\Http\Controllers\front\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function feature()
    {
        return view('front.pages.company.feature');
    }
    public function team_members()
    {
        return view('front.pages.company.team');
    }
    public function testimonial()
    {
        return view('front.pages.company.testimonial');
    }
    public function quote()
    {
        return view('front.pages.company.quote');
    }
    
}
