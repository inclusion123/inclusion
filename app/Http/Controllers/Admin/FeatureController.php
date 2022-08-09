<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\front\FeatureRequest;
use App\Models\Feature;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FeatureController extends Controller
{
    public function index()
    {
        return view('admin.feature.index');
    }
    public function list()
    {
        try {
            $models = Feature::orderBy('created_at', 'ASC');
            $datatable = Datatables::eloquent($models)
                ->addColumn('description', function ($row) {
                    return "$row->description";
                })
                ->addColumn("action", function ($row) {
                    return view('admin.feature._partials.action', compact('row'));
                })
                ->rawColumns(['description','action'])
                ->make(true);
            return $datatable;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    // public function create()
    // {
    //     return view('admin.feature.create');
    // }
    // public function store(FeatureRequest $request)
    // {
    //     try {
    //         $feature = Feature::create([
    //             'name' => $request->name,
    //             'description' => $request->description,
    //             'icon' => $request->icon,

    //         ]);
    //         return redirect()->route('admin.feature.index')->with('success', 'Feature is successfully added.');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->withInput()->with('error', 'Something went Wrong: ' . $e->getMessage());
    //     }
    // }

        public function edit($id)
    {
        $feature = Feature::find($id);
        return view('admin.feature.edit', compact('feature'));
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
        // dd($request->all());
        try {
            $feature = Feature::find($id);
            $feature->name = $request->name;
            $feature->description = $request->description;
            $feature->icon = $request->icon;
          
            $feature->save();
            return redirect()->route('admin.feature.index')->with('success', 'Feature Updated successfully .');
        } catch (\Exception $e) {
            report($e);
            return redirect()->back()->withInput()->with('error', 'Something went Wrong: ' . $e->getMessage());
        }
    }

    
    // public function destroy($id)
    // {
    //     $feature = Feature::where('id', $id)->delete();
    // }
}
