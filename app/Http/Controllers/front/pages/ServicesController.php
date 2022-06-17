<?php

namespace App\Http\Controllers\front\pages;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        return view('front.pages.services.index');
    }
    public function service_detail($slug)
    {
        
        $service = Service::whereSlug($slug)->whereStatus(Service::ACTIVE)->with('childService')->first();
        //  dd($service->childService);
        return view('front.pages.services.service_detail',compact('service'));
    }
}