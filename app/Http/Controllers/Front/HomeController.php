<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\BlackFridayEnquiry;
use App\Jobs\BlackFridayEnquiryJob;
use App\Models\Category;
use App\Models\Item;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index()
    {
       $seo = Seo::seo('dashboard');
       return view('front.landing_page',compact('seo'));
    }

    public function privacy_policy()
    {
       return view('front.pages.privacy_policy.index');
    }

    public function store_black_friday_enquiry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',

        ]);
        if($validator->fails()) {
            //withInput keep the users info
            // return redirect()->back()->withInput()->withErrors($validation->messages());
            return redirect()->back();
        }
        try {
            BlackFridayEnquiry::create([
                'email' => $request->email,
            ]);
            $data = $request->all();
            $sendingAddress=[ env("inclusionContactMail"), env("BlackFridayEnquiryMail")];
            BlackFridayEnquiryJob::dispatch($data,$sendingAddress);
            return redirect()->back()->with('success', 'Contact request has been sent.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Something went Wrong: ' . $e->getMessage());
            return $e->getMessage();
        }

    }
    public function themes(Request $request)
    {
        $categories = Category::get();
        $tags = Tag::get();
        $items = Item::orderBy('created_at', 'desc')->paginate(6);
        $category_id = ($request->cat_id != '')?$request->cat_id:null;
        $tag_ids = [6, 2,];

        // $items = Item::whereHas('tag', function($q) use ($tag_ids){
        //     $q->whereIN('tag_id', $tag_ids);
        // })->orderBy('created_at', 'desc')->paginate(6);
        // dd($items);

        if ($request->ajax()) {
            if($request->cat_id || $request->tag_id){
                $items = Item::whereHas('category', function($q) use ($request){
                    if(isset($request->cat_id) && !empty($request->cat_id)){
                        $q->where('category_id','=', $request->cat_id);
                    }
                })->whereHas('tag', function($q) use ($request){
                    if(isset($request->tag_id) && !empty($request->tag_id)){
                    $q->whereIN('tag_id', $request->tag_id);
                    // $q->whereIN('tag_id', [6]);
                    }
                })->orderBy('created_at', 'desc')->paginate(6);
                // dd($items);
            }

            return view('front.pages.themes.data', compact( 'items'));
        }
        return view('front.pages.themes.index', compact('categories', 'tags', 'items'));
    }
    public function theme_detail($id)
    {
        $item =Item::where('id', $id)->with('gallery')->first();
        // dd(count($item->gallery));

        return view('front.pages.themes.detail', compact('item'));
    }
}
