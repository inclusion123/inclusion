<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\front\CareerRequest;
use App\Models\Applicant;
use App\Models\Requirement;
use Illuminate\Http\Request;
use App\Models\Seo;
use App\Models\Skill;

class CareerController extends Controller
{
    public function index()
    {
        $seo = Seo::seo('career');
        return view('front.pages.career.index', compact('seo'));
    }
    public  function store(CareerRequest $request)
    {
        try {
            $jobrequest = Applicant::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'cv' => ''

            ]);

   
            if ($request->file('cv')) {
                $file = $request->file('cv');
                $filename = date('YmdHi') . $file->getClientOriginalExtension();
                $file->move(public_path('public/Images'), $filename);
                $jobrequest['cv'] = $filename;
                $jobrequest->save();
            }

            return redirect()->back()->with('success', 'Details were successfully sent.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Something went Wrong: ' . $e->getMessage());
        }
    }
    public function job_detail($slug)
    {
        $detail = Requirement::where('slug',$slug)->with('skill')->first();
        $skills = Skill::where('requirement_id',$detail->id)->get();
        return view('front.pages.career._partials.requirement.detail.index',compact('detail','skills'));
    }

    public function hireDeveloper()
    {
        return view('front.pages.career.hire_developer');
    }
}
