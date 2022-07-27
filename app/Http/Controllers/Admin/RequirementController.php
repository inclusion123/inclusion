<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RequirementRequest;
use App\Models\Requirement;
use App\Models\Skill;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.requirements.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.requirements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequirementRequest $request)
    {
        try {
            $requirement = Requirement::create([

                'name' => $request->name,
                'position' => $request->position,
                'experience' => $request->experience,
                'description' => $request->description,
                'slug'  => Str::slug($request->name),

            ]);
            $requirement->save();

            $length = count($request->skillName);
            for ($x = 1; $x <= $length; $x++) {
                $skill = Skill::create([
                    'requirement_id' => $requirement->id,
                    'name' => $request->skillName[$x - 1],
                ]);
                $skill->save();
            }
            return redirect()->route('admin.requirement.index')->with('success', 'Requirement Is Created Successfully.');
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
        $requirement = Requirement::where('id', $id)->with('skill')->first();
        return view('admin.requirements.edit', compact('requirement'));
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
            $requirement = Requirement::find($id);
            $requirement->name = $request->name;
            $requirement->experience  = $request->experience;
            $requirement->position = $request->position;
            $requirement->description = $request->description;
            $requirement->save();

            Skill::where('requirement_id', $requirement->id)->delete();
            $length = count($request->skillName);
            for ($x = 1; $x <= $length; $x++) {
                $skill = Skill::create([
                    'requirement_id' => $requirement->id,
                    'name' => $request->skillName[$x - 1],
                ]);
                $skill->save();
            }
            return redirect()->route('admin.requirement.index')->with('success', 'Requirement Updated successfully .');
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
        try {
            Requirement::find($id)->delete();
            Skill::where('requirement_id', $id)->delete();
            return "Requirement Deleted Successfully";
        } catch (\Exception $e) {
            return "Something went Wrong" . $e->getMessage();
        }
    }
    public function list()
    {
        try {
            $requirement = Requirement::orderBy('created_at', 'ASC')->with('skill');
            $datatable = Datatables::eloquent($requirement)
                ->addColumn('description', function ($row) {
                    return '$row->description';
                })
                ->editColumn('description', function ($data) {
                    return Str::limit($data->description, 30);
                })
                ->addColumn("action", function ($row) {
                    return view('admin.requirements._partials.action', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
            return $datatable;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
