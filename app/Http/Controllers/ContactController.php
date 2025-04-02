<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('public.pages.contact-us');
    }

    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // حفظ البيانات في قاعدة البيانات
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // إعادة التوجيه مع رسالة نجاح
        return back()->with('success', 'Your message has been sent successfully!');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::to('your_email@gmail.com')->send(new ContactMail($request->all()));

        return back()->with('success', 'تم إرسال رسالتك بنجاح!');
    }
}
