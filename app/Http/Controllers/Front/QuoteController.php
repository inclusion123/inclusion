<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\front\QuoteRequest;
use App\Jobs\QuoteJob;
use App\Mail\front\QuoteMail;
use App\Models\Quote;
use Illuminate\Support\Facades\Mail;
use App\Models\Seo;

class QuoteController extends Controller
{
    public function create()
    {
        $seo = Seo::seo('quote');
        return view('front.pages.quotes.index',compact('seo'));
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

            $data = $request->all();
            QuoteJob::dispatch($data);
            
            return redirect()->back()->with('success', 'Free Quote Request Successfully');
        } catch (\Exception $e) {
            report($e);
            // return dd($e->getMessage());
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
}
