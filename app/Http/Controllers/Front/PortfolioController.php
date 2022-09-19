<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $projectcategory = ProjectCategory::with('projects')->get();
        return view('front.pages.portfolio.index',compact('projectcategory'));
    }
}
