<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\front\ContactRequest;
use App\Mail\front\ContactMail;
use App\Models\ContactInquiry;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Jobs\ContactJob;
use App\Models\Seo;

class ContactController extends Controller
{
    public function index()
    {
        $seo = Seo::seo('contact');
        return view('front.pages.contact.index', compact('seo'));
    }
    public function contact_save(ContactRequest $request)
    {
        try {
            ContactInquiry::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message
            ]);
            $data = $request->all();
            ContactJob::dispatch($data);
            return redirect()->back()->with('success', 'Contact request message has been sent successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Something went Wrong: ' . $e->getMessage());
            return $e->getMessage();
        }
    }
}
