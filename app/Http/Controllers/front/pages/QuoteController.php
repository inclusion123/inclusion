<?php

namespace App\Http\Controllers\front\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\front\QuoteRequest;
use App\Models\Quote;

class QuoteController extends Controller
{
    public function create()
    {
        return view('front.pages.quotes.index');
    }
    public function store(QuoteRequest $request)
    {
        try {
            $quote = Quote::create([
                'name' => $request->name,
                'email' => $request->email,
                'service' => $request->service,
                'message' => $request->message,

            ]);
            
            return redirect()->back()->with('success', 'Free Quote Request Successfully');
        } catch (\Exception $e) {
            report($e);
            // return dd($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Something went Wrong: ');
        }
    }
}
