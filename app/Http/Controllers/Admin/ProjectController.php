<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Project::where('category_id', $id)->orderBy('created_at', 'ASC');
            $datatable = DataTables::eloquent($data)
                ->addColumn("action", function ($row) {
                    return view('admin.portfolio.project._partials.action', compact('row'));
                })
                ->addColumn('image', function ($row) {
                    return view('admin.portfolio.project._partials.icon', compact('row'));
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
            return $datatable;
        }
    $project_category = ProjectCategory::find($id);
        return view('admin.portfolio.project.index', compact('id','project_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.portfolio.project.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            $project = Project::create([
                'name' => $request->name,
                'category_id' => $id,
                'slug'  => Str::slug($request->name),
                'image' => ''
            ]);
            if ($request->hasFile('image')) {
                $filePath = $project->image_upload($request->image);
                $project->image = $filePath;
                $project->save();
            }
            return redirect()->route('admin.projects.index', $id)->with('success', 'Project  is successfully added.');
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
        $project = Project::find($id);
        return view('admin.portfolio.project.edit', compact('project'));
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
            'name' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            $project = Project::find($id);
            $project->name = $request->name;
            if ($request->hasFile('image')) {
                $filePath = $project->image_upload($request->image);
                $project->image = $filePath;
                $project->save();
            }
            $project->save();
            return redirect()->route('admin.projects.index', $project->category_id)->with('success', 'Project  is successfully updated.');
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
    public function destroy(Request $request, $id)
    {
        Project::where('id', $request->id)->where('category_id', $request->category_id)->delete();
    }
}
