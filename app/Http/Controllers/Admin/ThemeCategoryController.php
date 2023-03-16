<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
// use Flasher\Laravel\Http\Request as HttpRequest;
use Illuminate\Http\Request;

class ThemeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        if($request->ajax()){
            try {
                $category = Category::orderBy('created_at', 'DESC');
                $datatable = Datatables::eloquent($category)
                    ->addColumn("action", function ($category) {
                        return view('admin.theme.category._partials.action', compact('category'));
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
        return view('admin.theme.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.theme.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|max:255|string|unique:categories,name',
            'slug' => 'required|max:255|string|unique:categories,slug',
        ]);
        try {
            if(isset($request->status)){
                $status = $request->status;
            }else{
                $status = 0;
            }
            $category = Category::create([
                // 'service_id' => $request->service_id,
                'name' => $request->name,
                'slug' => $request->slug,
                'status' => $status

            ]);
            return redirect()->route('admin.theme.index',)->with('success', 'Category is successfully added.');
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
        // dd(13);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
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
        // dd('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('delete');
    }

    public function edit_category($id)
    {
        $category = Category::where('id', $id)->first();
        // dd($category);
        return view('admin.theme.category.edit', compact('category'));
    }
    public function update_category(Request $request ,$id)
    {
        // dd(isset($request->status));
        $this->validate($request, [
            'name' => 'required|max:255|string|unique:categories,name,'.$id,
            'slug' => 'required|max:255|string|unique:categories,slug,'.$id,
        ]);
        try {

            $category = Category::find($id);
            $category->name = $request->name;
            $category->slug = $request->slug;
            if(isset($request->status)){
                $category->status = $request->status;

            }else{
                $category->status = 0;
            }
            $category->save();

            return redirect()->route('admin.theme.index')->with('success', 'Category Updated successfully .');
        } catch (\Exception $e) {
            report($e);
            return redirect()->back()->withInput()->with('error', 'Something went Wrong: ' . $e->getMessage());
        }
    }

    public function destroy_category(Request $request)
    {
        $id = $request->id;
        $category = Category::where('id', $id)->delete();
    }
}

