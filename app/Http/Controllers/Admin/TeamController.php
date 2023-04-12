<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Yajra\DataTables\Facades\DataTables;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(22);
        return view('admin.team.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
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
            if(isset($request->status)){
                $status = $request->status;
            }else{
                $status = 0;
            }
            $team = Team::create([

                'name' => $request->name,
                'designation' => $request->designation,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'linkedin' => $request->linkedin,
                'twitter' => $request->twitter,
                'status' => $status,

                'image' => ''

            ]);
            if ($request->hasFile('image')) {


                $filePath = $team->image_upload($request->image);
                $team->image = $filePath;
                $team->save();
            }
            return redirect()->route('admin.team.index')->with('success', 'Team Member is successfully added.');
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
        $team = Team::find($id);
        return view('admin.team.edit', compact('team'));
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
            if(isset($request->status)){
                $status = $request->status;
            }else{
                $status = 0;
            }
            $team = Team::find($id);
            $team->name = $request->name;
            $team->designation = $request->designation;
            $team->instagram = $request->instagram;
            $team->facebook = $request->facebook;
            $team->linkedin = $request->linkedin;
            $team->twitter = $request->twitter;
            $team->status = $status;

            if ($request->hasFile('image')) {
                // dd(44);
                $filePath = $team->image_upload($request->image);
                $team->image = $filePath;
                $team->save();
            }
            $team->save();
            return redirect()->route('admin.team.index')->with('success', 'Team Member Updated successfully .');
        }catch (\Exception $e) {
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
        $team = Team::where('id', $id)->delete();
    }
    public function list()
    {
        // $team = Team::all();
        try {
            $team = Team::orderBy('id', 'ASC');
            $datatable = Datatables::eloquent($team)

                ->addColumn('image', function ($row) {
                    return view('admin.team._partials.icon', compact('row'));
                })
                ->addColumn('status', function ($row) {
                    if(isset($row->status)){
                        if($row->status == 1){
                            return ' <button class="btn btn-primary"> Active </button>';
                        }else{
                            return '<button class="btn btn-danger"> Inactive </button>';
                        }

                    }else{
                        return '';
                    }
                })

                ->addColumn("action", function ($row) {
                    return view('admin.team._partials.action', compact('row'));
                })


                ->rawColumns(['image', 'action' ,'status'])
                ->make(true);
            return $datatable;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
