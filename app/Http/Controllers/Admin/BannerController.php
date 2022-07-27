<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        try {
            $banner = Banner::create([

                'name' => $request->name,
                'title' => $request->title,
                'image' => ''

            ]);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name =  $image->getClientOriginalName();

                $destinationPath = public_path('/images');
                $imgFile = Image::make($image->getRealPath())->resize(1920, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $image_name);


                // for save thumnail image
                // $thumbnailPath = public_path('/thumbnail');
                // $imgFile = Image::make($image->getRealPath())->resize(250, 125);
                // $ImageUpload = $imgFile->save($thumbnailPath . '/' . $image_name);


                $banner->image = $image_name;
                $banner->save();
            }

            return redirect()->route('admin.banner.index')->with('success', 'Banner Is Created Successfully.');
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
        $banner = Banner::find($id);
        return view('admin.banner.edit', compact('banner'));
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
        // dd($request->all());
        try {
            $banner = Banner::find($id);
            $banner->name = $request->name;
            $banner->title = $request->title;

          
            if ($request->hasFile('image')) {
               
                $image = $request->file('image');
                $image_name =  $image->getClientOriginalName();

                $destinationPath = public_path('/images');
                $imgFile = Image::make($image->getRealPath())->resize(1920, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $image_name);

                $banner->image = $image_name;
            }
            $banner->save();
            return redirect()->route('admin.banner.index')->with('success', 'Banner  Updated successfully .');
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
        $banner = Banner::where('id', $id)->delete();
    }
    public function list()
    {
        // $banner = banner::all();
        try {
            $banner = Banner::orderBy('created_at', 'ASC');
            $datatable = Datatables::eloquent($banner)

                ->addColumn('image', function ($row) {
                    return view('admin.banner._partials.icon', compact('row'));
                })

                ->addColumn("action", function ($row) {
                    return view('admin.banner._partials.action', compact('row'));
                })


                // ->rawColumns(['image', 'action'])
                ->make(true);
            return $datatable;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
