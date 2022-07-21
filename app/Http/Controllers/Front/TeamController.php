<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Seo;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::all();
        $seo = Seo::seo('team');
        return view('front.pages.team.index',compact('team','seo'));
    }
}
