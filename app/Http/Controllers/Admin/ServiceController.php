<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use Illuminate\Http\Request;
use App\Models\Service;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('created_at', 'ASC')->get();
        // dd($services);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        // dd($request->all());
        try {
            $service = Service::create([
                'name' => $request->name,
                'page_name' => $request->page_name,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'title' => $request->title,
                'slug'  => Str::slug($request->name),
                'icon' =>$request->icon,
                'description' => $request->desc,
                'detail_name' => $request->detailname,
                'detail_description' => $request->detail_description,
                'status' => $request->status
            ]);
            return redirect()->route('admin.service.index')->with('success', 'Service is successfully added.');
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
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $service = Service::find($id);
        // dd($service);
        return view('admin.services.edit', compact('service'));
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
            $service = Service::find($id);
            $service->name = $request->name;
            $service->page_name = $request->page_name;
            $service->meta_title = $request->meta_title;
            $service->meta_keywords = $request->meta_keywords;
            $service->meta_description = $request->meta_description;
            $service->title = $request->title;
            $service->slug = Str::slug($request->name);
            $service->icon = $request->icon;
            $service->description = $request->desc;
            $service->detail_name = $request->detailname;
            $service->detail_description = $request->detaildescription;
            $service->status = $request->status;
            $service->save();
            return redirect()->route('admin.service.index')->with('success', 'Service is successfully updated.');
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
         Service::where('id', $id)->delete();
    }
    public function getModels()
    {
        try {
            $services = Service::orderBy('created_at', 'ASC');
            $datatable = Datatables::eloquent($services)

            ->addColumn('description', function ($row) {
                return Str::limit($row->description, 50);
            })
            ->addColumn('status', function ($row) {
                return view('admin.services._partials.status', compact('row'));
            })
            ->addColumn('detail', function ($row) {
                return view('admin.services._partials.detail', compact('row'));
            })
                ->addColumn("action", function ($row) {
                    return view('admin.services._partials.action', compact('row'));
                })


                ->rawColumns(['description','status','detail', 'action'])
                ->make(true);
            return $datatable;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function changeStatus(Request $request)
    {
   
        try {
            $category = Service::find($request->id);
            $category->status = $request->status;
            $category->save();
            return response()->json(['success' => ' Status Change Successfully.']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function detail($id)
    {
        $details = Service::findOrFail($id);

        return view('admin.services.service_detail', compact('details'));
    }
}
