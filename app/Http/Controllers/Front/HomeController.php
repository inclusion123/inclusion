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
        $items = Item::paginate(6);
        // dd($items);
        if ($request->ajax()) {
            return view('front.pages.themes.data', compact('categories', 'tags', 'items'));
        }
        return view('front.pages.themes.index', compact('categories', 'tags', 'items'));
    }
    public function theme_detail()
    {
        return view('front.pages.themes.detail');
    }
}
