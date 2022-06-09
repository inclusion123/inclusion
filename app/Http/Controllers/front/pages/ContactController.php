<?php

namespace App\Http\Controllers\front\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\front\ContactRequest;
use App\Mail\front\ContactMail;
use App\Models\front\Contact_Inquiry;
use Exception;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('front.pages.contact.contact');
    }
    public function contact_save(ContactRequest $request)
    {

        try {
            Contact_Inquiry::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message

            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        $data = $request->all();
        Mail::to(
            env("mail_reciever")
        )->send(new ContactMail($data));

        return redirect()->back()->with('success', 'Contact Successfully');
    }
}
