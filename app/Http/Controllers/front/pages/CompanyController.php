<?php

namespace App\Http\Controllers\front\pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\front\QuoteRequest;
use Illuminate\Http\Request;
use App\Models\Quote;

class CompanyController extends Controller
{
    public function feature()
    {
        return view('front.pages.features.index');
    }
    public function team_members()
    {
        return view('front.pages.team.index');
    }
    public function testimonial()
    {
        return view('front.pages.company.testimonial');
    }
   
    
}
