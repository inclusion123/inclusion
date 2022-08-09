<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;

class FeatureController extends Controller
{
    public function index()
    {
        $seo = Seo::seo('feature');
        return view('front.pages.features.index',compact('seo'));
    }
}
