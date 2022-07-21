<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChildServiceRequest;
use App\Models\ChildService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Service;

use function GuzzleHttp\Promise\all;

class ChildServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $details = Service::where('id', $id)->get();

        return view('admin.child_services.index', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChildServiceRequest $request)
    {

        try {
            $child_service = ChildService::create([
                'service_id' => $request->service_id,
                'name' => $request->name,
                'description' => $request->desc,
                'image' => ''

            ]);
            if ($request->hasFile('image')) {

                Log::info('Child Service image_upload');
                $filePath = $child_service->image_upload($request->image);
                Log::info('filleeepath ' . $filePath);
                $child_service->image = $filePath;
                $child_service->save();
            }
            return redirect()->route('admin.childservices.indexpage', $request->service_id)->with('success', 'Child Service is successfully added.');
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

        $child_service = ChildService::find($id);
        return view('admin.child_services.edit', compact('child_service'));
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
        // return $request->all();

        $this->validate($request, [
            'image' => 'sometimes|mimes:png,jpeg,gif',
        ]);
        try {
            $child_service = ChildService::find($id);

            // $child_service->service_id = $request->service_id;
            $child_service->name = $request->name;
            $child_service->description = $request->desc;
            $child_service->image = '';

            if ($request->hasFile('image')) {
                // dd(44);
                Log::info('Child Service Image_Updated');
                $filePath = $child_service->image_upload($request->image);
                Log::info('filleeepath ' . $filePath);
                $child_service->image = $filePath;
                $child_service->save();
            }
            $child_service->save();
            return redirect()->route('admin.childservices.indexpage', $request->service_id)->with('success', 'Child Service Updated successfully .');
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
    public function destroy(Request $request, $id)
    {

        try {
            $com = ChildService::where('id', $request->id)->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function create_child($id)
    {
        return view('admin.child_services.create', compact('id'));
    }
    public function getModels(Request $request, $id)
    {
        // return dd($id);
        try {
            $services = ChildService::where('service_id', $id)->orderBy('created_at', 'ASC');
            $datatable = Datatables::eloquent($services)
                ->addColumn('description', function ($row) {
                    return "$row->description";
                })
                ->addColumn('image', function ($row) {
                    return view('admin.child_services._partials.icon', compact('row'));
                })
                ->addColumn("action", function ($row) {
                    return view('admin.child_services._partials.action', compact('row'));
                })


                ->rawColumns(['description','image', 'action'])
                ->make(true);
            return $datatable;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
