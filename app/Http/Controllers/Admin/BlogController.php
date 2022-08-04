<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        try {
            $blog = Blog::create([
                'postable_id' => auth()->id(),
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'title' => $request->title,
                'slug'  => Str::slug($request->title),
                'description' => $request->description,
                'category' => $request->category,
                'image' => ''
            ]);
            if ($request->hasFile('image')) {
                $filePath = $blog->image_upload($request->image);
                $blog->image = $filePath;
                $blog->save();
            }
            return redirect()->route('admin.blog.index')->with('success', 'Blog Created successfully.');
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
        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('blog'));
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
            $blog = Blog::find($id);
            $blog->meta_title = $request->meta_title;
            $blog->meta_keywords = $request->meta_keywords;
            $blog->meta_description = $request->meta_description;
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->description = $request->description;
            $blog->category = $request->category;

            if ($request->hasFile('image')) {
                $filePath = $blog->image_upload($request->image);
                $blog->image = $filePath;
                $blog->save();
            }
            $blog->save();
            return redirect()->route('admin.blog.index')->with('success', 'Blog Updated successfully .');
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
        $blog = Blog::where('id', $id)->delete();
    }
    public function list()
    {
        // return dd($id);
        try {
            $blog = Blog::orderBy('created_at', 'ASC');
            $datatable = Datatables::eloquent($blog)
                ->addColumn('description', function ($row) {
                    return Str::limit($row->description, 100);
                })
                ->addColumn('image', function ($row) {
                    return view('admin.blog._partials.icon', compact('row'));
                })
                ->addColumn("action", function ($row) {
                    return view('admin.blog._partials.action', compact('row'));
                })


                ->rawColumns(['description', 'image', 'action'])
                ->make(true);
            return $datatable;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
