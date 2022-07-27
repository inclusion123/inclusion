<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SeoRequest;
use App\Models\Seo;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.seo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeoRequest $request)
    {
        try {
            $seo = Seo::create([

                'route_name' => $request->route_name,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,

            ]);

            $seo->save();

            return redirect()->route('admin.seo.index')->with('success', 'Seo Is Created Successfully.');
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
        $seo = Seo::find($id);
        return view('admin.seo.edit', compact('seo'));
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
        try {
            $seo = seo::find($id);
            $seo->route_name = $request->route_name;
            $seo->meta_title = $request->meta_title;
            $seo->meta_keywords = $request->meta_keywords;
            $seo->meta_description = $request->meta_description;

            $seo->save();
            return redirect()->route('admin.seo.index')->with('success', 'seo Updated successfully .');
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
        $seo = Seo::where('id', $id)->delete();
    }
    public function list()
    {
        try {
            $seo = Seo::orderBy('created_at', 'ASC');
            $datatable = Datatables::eloquent($seo)
                ->addColumn("action", function ($row) {
                    return view('admin.seo._partials.action', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
            return $datatable;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
