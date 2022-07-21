<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\front\CareerRequest;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\Seo;

class CareerController extends Controller
{
    public function index()
    {
        $seo = Seo::seo('career');
        return view('front.pages.career.index', compact('seo'));
    }
    public  function store(CareerRequest $request)
    {
        // dd($request->all());
        //         $this->validate($request, [
        //             'cv' => 'sometimes|mimes:png,jpeg,gif',
        //         ]);

        try {
            $jobrequest = Applicant::create([
                'name' => $request->name,
                'email' => $request->email,
                'profile' => $request->profile,
                'message' => $request->message,
                'cv' => ''

            ]);

            if ($request->file('cv')) {
                // dd(4);
                $file = $request->file('cv');
                $filename = date('YmdHi') . $file->getClientOriginalExtension();
                $file->move(public_path('public/Images'), $filename);
                $jobrequest['cv'] = $filename;
                $jobrequest->save();
            }

            return redirect()->back()->with('success', 'Details Send Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Something went Wrong: ' . $e->getMessage());
        }
    }
    public function job_detail()
    {
        return view('front.pages.career._partials.requirement.detail.index');
    }
}
