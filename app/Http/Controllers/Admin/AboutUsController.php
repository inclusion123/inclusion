<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use Yajra\DataTables\Facades\DataTables;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.aboutus.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $about_us = AboutUs::create([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'image' => ''

            ]);
            if ($request->hasFile('image')) {


                $filePath = $about_us->image_upload($request->image);

                $about_us->image = $filePath;
                $about_us->save();
            }
            return redirect()->route('admin.aboutus.index', $request->service_id)->with('success', 'About-Us is successfully added.');
        } catch (\Exception $e) {
            report($e);
            return redirect()->back()->withInput()->with('error', 'Something went Wrong: ' . $e->getMessage());
        }
    }

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
    public function edit($id)
    {
        $aboutus = AboutUs::where('id', $id)->first();
        return view('admin.aboutus.edit', compact('aboutus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'sometimes|mimes:png,jpeg,gif',
        ]);
        try {
            $aboutus = AboutUs::find($id);
            $aboutus->name = $request->name;
            $aboutus->title = $request->title;
            $aboutus->description = $request->description;
            // $aboutus->image = '';

            if ($request->hasFile('image')) {

                $filePath = $aboutus->image_upload($request->image);
                $aboutus->image = $filePath;
                $aboutus->save();
            }
            $aboutus->save();
            return redirect()->route('admin.aboutus.index')->with('success', 'About-Us Detail is successfully updated.');
        } catch (\Exception $e) {
            report($e);
            return redirect()->back()->withInput()->with('error', 'Something went Wrong: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       AboutUs::where('id', $id)->delete();
    }
    public function list()
    {
        try {
            $aboutus = AboutUs::orderBy('created_at', 'ASC');
            $datatable = Datatables::eloquent($aboutus)

                ->addColumn('description', function ($row) {
                    return "$row->description";
                })
                ->addColumn('image', function ($row) {
                    return view('admin.aboutus._partials.icon', compact('row'));
                })
                // ->addColumn('list', function ($row) {
                //     return view('admin.aboutus._partials.list', compact('row'));
                // })
                // ->addColumn('detail', function ($row) {
                //     return view('admin.services._partials.detail', compact('row'));
                // })
                ->addColumn("action", function ($row) {
                    return view('admin.aboutus._partials.action', compact('row'));
                })


                ->rawColumns(['description', 'image', 'action'])
                ->make(true);
            return $datatable;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
