<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::find(1);
        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        try {
            $service = Setting::first();
            $service->name = $request->name;
            $service->address = $request->address;
            $service->email = $request->email;
            $service->mobile = $request->mobile;
            $service->toll_free = $request->toll_free;
            $service->web = $request->web;
            $service->instagram = $request->instagram;
            $service->linkedin = $request->linkedin;
            $service->youtube = $request->youtube;
            $service->twitter = $request->twitter;
            $service->facebook = $request->facebook;
            $service->github = $request->github;
            $service->save();
            return redirect()->route('admin.settings.index')->with('success', 'Setting is successfully updated.');
        } catch (\Exception $e) {
            report($e);
            return redirect()->back()->withInput()->with('error', 'Something went Wrong: ' . $e->getMessage());
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('admin.settings.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     try {
    //         $service = Setting::create([
    //             'address' => $request->address,
    //             'email' => $request->email,
    //             'mobile' => $request->mobile,
    //             'toll_free'  => $request->toll_free,
    //             'instagram' => $request->instagram,
    //             'linkedin' => $request->linkedin,
    //             'youtube' => $request->youtube,
    //             'twitter' => $request->twitter,
    //             'facebook' => $request->facebook
    //         ]);
    //         return redirect()->route('admin.settings.index')->with('success', 'Setting is successfully added.');
    //     } catch (\Exception $e) {
    //         report($e);
    //         return redirect()->back()->withInput()->with('error', 'Something went Wrong: ' . $e->getMessage());
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit()
    // {
    //     $setting = Setting::find(1);
    //     return view('admin.settings.edit',compact('setting'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Request $request)
    // {

    //     try {
    //         $com = Setting::where('id', $request->id)->delete();
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
    // }
    // public function getModels()
    // {
    //     // dd($settings = Setting::all());
    //     try {
    //         // $settings = Setting::first();
    //         // $datatable = DataTables::eloquent($settings)->make(true);
    //         // return $datatable;

    //         return Datatables::of(Setting::select(array('id','address','email', 'mobile', 'toll_free', 'instagram', 'linkedin', 'youtube', 'twitter', 'facebook')))
    //         ->addColumn("action", function ($row) {
    //             return view('admin.settings._partials.action', compact('row'));
    //         })->rawColumns(['action'])
    //         ->make(true);
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
    // }
}
