<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Events\NewContactNotification;


class ContactController extends Controller
{

    public function index()
    {
        return view('public.pages.contact-us');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Mail::send('email.contact', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'body' => $validated['message'],
        ], function ($message) use ($validated) {
            $message->to('victoryl6311@gmail.com')  
                    ->subject('New Contact Message: ' . $validated['subject']);
        });


        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        return back()->with('success', 'Message sent successfully!');
    }
    
}
