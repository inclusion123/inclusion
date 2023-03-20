<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ThemeTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            try {
                $tags = Tag::orderBy('created_at', 'DESC');
                $datatable = Datatables::eloquent($tags)
                    ->addColumn("action", function ($tags) {
                        return view('admin.theme.tag._partials.action', compact('tags'));
                    })
                    ->addColumn('created_at',function($request){
                        // return 11;
                        return $request->created_at;
                        return $request->created_at->format('d M Y');
                    })
                    ->rawColumns(['action','created_at'])
                    ->make(true);
                return $datatable;
            } catch (\Exception $e) {
                return $e->getMessage();
            }

        }
        return view('admin.theme.tag.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.theme.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|string|unique:categories,name',
            'slug' => 'required|max:255|string|unique:categories,slug',
        ]);
        try {
            // if(isset($request->status)){
            //     $status = $request->status;
            // }else{
            //     $status = 0;
            // }
            $tag = Tag::create([
                'name' => $request->name,
                'slug' => $request->slug,
                // 'status' => $status

            ]);
            return redirect()->route('admin.theme.theme_tag.index',)->with('success', 'Tag is successfully added.');
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
        $tag = Tag::find($id);

        return view('admin.theme.tag.create',compact('tag'));
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
            'name' => 'required|max:255|string|unique:categories,name,'.$id,
            'slug' => 'required|max:255|string|unique:categories,slug,'.$id,
        ]);
        try {

            $tag = Tag::find($id);
            $tag->name = $request->name;
            $tag->slug = $request->slug;

            $tag->save();

            return redirect()->route('admin.theme.theme_tag.index')->with('success', 'Tag Updated successfully .');
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

        $tag = Tag::where('id', $id)->delete();
    }
}
