<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;


class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ProjectCategory::orderBy('created_at', 'ASC');
            $datatable = Datatables::eloquent($data)
                ->addColumn("action", function ($row) {
                    return view('admin.portfolio.project_category._partials.action', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
            return $datatable;
        }
        return view('admin.portfolio.project_category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.project_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:project_categories|max:20',
        ]);
        try {
            $projectcategory = ProjectCategory::create([
                'name' => $request->name,
                'slug'  => Str::slug($request->name),

            ]);
            return redirect()->route('admin.projectcategory.index')->with('success', 'Project-Category  is successfully added.');
        } catch (\Exception $e) {
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
        $projectcategory = ProjectCategory::find($id);
        return view('admin.portfolio.project_category.edit', compact('projectcategory'));
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
        $validated = $request->validate([
            'name' => 'required|unique:project_categories|max:20',
        ]);
        try {
            $projectcategory = ProjectCategory::find($id);
            $projectcategory->name = $request->name;
            $projectcategory->slug = Str::slug($request->name);
            $projectcategory->save();
            return redirect()->route('admin.projectcategory.index')->with('success', 'Project-Category  is successfully updated.');
        } catch (\Exception $e) {
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
        ProjectCategory::where('id', $id)->delete();
    }
}
