<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemGallery;
use App\Models\Items_with_category;
use App\Models\ItemTag;
use App\Models\Tag;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\ItemRequest;

class ThemeItemsController extends Controller
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
                $items = Item::orderBy('created_at', 'DESC');
                $datatable = Datatables::eloquent($items)
                    ->addColumn("action", function ($items) {
                        return view('admin.theme.Items._partials.action', compact('items'));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                return $datatable;
            } catch (\Exception $e) {
                return $e->getMessage();
            }

        }
        return view('admin.theme.Items.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $tags = Tag::get();
        // dd($category);
        $case = 'POST';
        return view('admin.theme.Items.create', compact('categories', 'tags','case'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        // dd($request->selectedCategory);
        // dd(isset($request->selectedCategories));

        try {
            if(isset($request->status)){
                $status = $request->status;
            }else{
                $status = 0;
            }
            $theme = Item::create([

                'name' => $request->name,
                'slug' => $request->slug,
                'title'=> $request->title,
                'title_description' => $request->title_description,
                'download_link' => $request->download_link,
                'discription' => $request->description,
                'status' => $status,
                'highlight_details' => implode(',', array_filter($request->highlight_details, function($value) { return !is_null($value) && $value !== ''; })),
                'included' => implode(',', array_filter($request->included, function($value) { return !is_null($value) && $value !== ''; })),
                'features' => implode(',', array_filter($request->features, function($value) { return !is_null($value) && $value !== ''; })),

                // 'featured_image' => ''

            ]);
            //store Category
            if(isset($request->selectedCategories)){
                foreach($request->selectedCategories as $selectedCategory){
                    $item_category = new Items_with_category();
                    $item_category->item_id = $theme->id;
                    $item_category->category_id = $selectedCategory;
                    $item_category->save();
                }
            }
            //store Tag
            if(isset($request->selectedTags)){
                foreach($request->selectedTags as $selectedTag){
                    $item_tag = new ItemTag();
                    $item_tag->item_id = $theme->id;
                    $item_tag->tag_id = $selectedTag;
                    $item_tag->save();
                }
            }
            //upload featured_image
            if ($request->hasFile('featured_image')) {

                $image_name = Str::random(4).'.'.$request->file('featured_image')->extension();
                // $upload_path = public_path('themes/featured_image');
                $request->file('featured_image')->move(public_path('themes_image/featured_image'),$image_name);
                $theme->featured_image = $image_name;

                $theme->save();

            }

            //Upload Gallery
            if($request->hasfile('gallery'))
            {
                foreach($request->file('gallery') as $file)
                {
                    $gallery_image_name = Str::random(10).'.'.$file->extension();
                    $file->move(public_path('themes_image/theme_gallery'),$gallery_image_name);
                    // $data[] = $gallery_image_name;

                    $item_gallery= new ItemGallery();
                    $item_gallery->item_id = $theme->id;
                    $item_gallery->photo=$gallery_image_name;
                    $item_gallery->save();
                }
            }


            return redirect()->route('admin.theme.items.index')->with('success', 'Theme is successfully added.');
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
    public function edit($slug)
    {
        $categories = Category::get();
        $tags = Tag::get();
        $theme = Item::where('slug', $slug)->with('category')->with('tag')->first();
        $theme_has_category = [];
        $theme_has_tag = [];
        foreach($theme->category as $category){
            $theme_has_category[] =  $category->category_id;
        }
        foreach($theme->tag as $tag){
            $theme_has_tag[] =  $tag->tag_id;
        }
        // dd($theme_has_tag);
        $case = 'PUT';

        // dd($theme->category);
        return view('admin.theme.Items.create', compact('theme', 'categories', 'tags','case', 'theme_has_category', 'theme_has_tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, $slug)
    {

        // dd($request->description);
        try{
            if(isset($request->status)){
                $status = $request->status;
            }else{
                $status = 0;
            }
            $item = Item::where('slug', $slug)->first();
            $item_category = Items_with_category::where("item_id", $item->id)->get();

            $item_tag = ItemTag::where("item_id", $item->id)->get();
            $item_gallery = ItemGallery::where("item_id", $item->id)->get();

            $item_gallery_images = [];
            foreach($item_gallery as $one_item){
                $item_gallery_images[] = $one_item->photo;
            }
            // dd($item_gallery_images);

            $item->name              = $request->name;
            $item->slug              = $request->slug;
            $item->title             = $request->title;
            $item->title_description = $request->title_description;
            $item->download_link     = $request->download_link;
            $item->discription       = $request->description;
            $item->status            = $status;
            $item->highlight_details = implode(',', array_filter($request->highlight_details, function($value) { return !is_null($value) && $value !== ''; }));
            $item->included          =  implode(',', array_filter($request->included, function($value) { return !is_null($value) && $value !== ''; })); //implode(',', (array) $request->included);
            $item->features          =  implode(',', array_filter($request->features, function($value) { return !is_null($value) && $value !== ''; })); //implode(',', (array) $request->features);
            $item->update();

            $categories = [];
            foreach($item_category as $one_category){
                $categories[] = $one_category->category_id;
            }
            // dd(count($request->selectedCategories) == count($categories));
            if(count($request->selectedCategories) != count($categories)){
                $item->category()->delete();

                foreach($request->selectedCategories as $selectedCategory){
                    $item_category = new Items_with_category();
                    $item_category->item_id = $item->id;
                    $item_category->category_id = $selectedCategory;
                    $item_category->save();
                }
            }

            $tags = [];
            foreach($item_tag as $one_tag){
                $tags[] = $one_tag->tag_id;
            }

            if(count($request->selectedTags) != count($tags)){
                $item->tag()->delete();

                foreach($request->selectedTags as $selectedTag){
                    $item_tag = new ItemTag();
                    $item_tag->item_id = $item->id;
                    $item_tag->tag_id = $selectedTag;
                    $item_tag->save();
                }
            }
            if ($request->hasFile('featured_image')) {

                // $upload_path = public_path('themes/featured_image');
                if($item->featured_image != ''  && $item->featured_image != null){
                    $file_old = public_path('themes_image/featured_image/').$item->featured_image;
                    unlink($file_old);
                }

                $image_name = Str::random(4).'.'.$request->file('featured_image')->extension();
                $request->file('featured_image')->move(public_path('themes_image/featured_image'),$image_name);
                $item->featured_image = $image_name;

                $item->update();
            }

            if ($request->hasfile('gallery')) {

                if($item->gallery != ''  && $item->gallery != null){
                    foreach($item_gallery_images as $one_image){
                        unlink(public_path('themes_image/theme_gallery/').$one_image);
                    }
                    $item->gallery()->delete();
                    foreach($request->file('gallery') as $file)
                    {
                        $gallery_image_name = Str::random(10).'.'.$file->extension();
                        $file->move(public_path('themes_image/theme_gallery'),$gallery_image_name);
                        // $data[] = $gallery_image_name;

                        $item_gallery= new ItemGallery();
                        $item_gallery->item_id = $item->id;
                        $item_gallery->photo=$gallery_image_name;
                        $item_gallery->save();
                    }
                }
            }



            return redirect()->route('admin.theme.items.index')->with('success', 'Theme is successfully updated.');
        }catch (\Exception $e) {
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
        $item = Item::find($id);
        $item_gallery = ItemGallery::where("item_id", $item->id)->get();
        // dd($item);
        $item_gallery_images = [];
        foreach($item_gallery as $one_item){
            $item_gallery_images[] = $one_item->photo;
        }
        if($item->gallery != ''  && $item->gallery != null){
            foreach($item_gallery_images as $one_image){
                unlink(public_path('themes_image/theme_gallery/').$one_image);
            }
        }
        if($item->featured_image != ''  && $item->featured_image != null){
            $file_old = public_path('themes_image/featured_image/').$item->featured_image;
            unlink($file_old);
        }
        $item->gallery()->delete();
        $item->category()->delete();
        $item->tag()->delete();
        $item->delete();

    }

    // public function abc(){
    //     $item = Item::where('id',19)->with('category')->with('tag')->get();
    //     dd($item);
    // }
}
