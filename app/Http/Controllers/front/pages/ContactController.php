<?php

namespace App\Http\Controllers\front\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\front\ContactRequest;
use App\Mail\front\ContactMail;
use App\Models\ContactInquiry;
use Exception;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('front.pages.contact.index');
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
            return redirect()->back()->with('success', 'Contact Request Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Something went Wrong: ' . $e->getMessage());
            return $e->getMessage();
        }
        $data = $request->all();
        Mail::to(
            env("mail_reciever")
        )->send(new ContactMail($data));

    }
}
