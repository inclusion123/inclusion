<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.testimonial.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
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
            $testimonial = Testimonial::create([

                'name' => $request->name,
                'profession' => $request->profession,
                'description' => $request->description,


                'image' => ''

            ]);
            if ($request->hasFile('image')) {


                $filePath = $testimonial->image_upload($request->image);
                $testimonial->image = $filePath;
                $testimonial->save();
            }
            return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial successfully Created.');
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
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('testimonial'));
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
            $testimonial = Testimonial::find($id);
            $testimonial->name = $request->name;
            $testimonial->description = $request->description;
            $testimonial->profession = $request->profession;


            if ($request->hasFile('image')) {
                // dd(44);         
                $filePath = $testimonial->image_upload($request->image);
                $testimonial->image = $filePath;
                $testimonial->save();
            }
            $testimonial->save();
            return redirect()->route('admin.testimonial.index', $request->service_id)->with('success', 'testimonial  Updated successfully .');
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
        $teatestimonialm = Testimonial::where('id', $id)->delete();
    }
    public function list()
    {
        try {
            $models = Testimonial::orderBy('created_at', 'ASC');
            $datatable = Datatables::eloquent($models)
                ->addColumn('image', function ($row) {
                    return view('admin.testimonial._partials.icon', compact('row'));
                })
                ->addColumn('description', function ($row) {
                    return "$row->description";
                })
                ->addColumn("action", function ($row) {
                    return view('admin.testimonial._partials.action', compact('row'));
                })
                ->rawColumns(['image', 'description', 'action'])
                ->make(true);
            return $datatable;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
