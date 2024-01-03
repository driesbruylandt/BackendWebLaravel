<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactReply;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    public function submitContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Your message has been submitted.');
    }
    public function showContactForm()
    {
        $messages = Contact::latest()->get();

        return view('contact', compact('messages'));
    }

    public function sendReply(Request $request, $id)
    {
        $request->validate([
            'admin_reply' => 'required|string',
        ]);

        $contact = Contact::findOrFail($id);

        // Update the contact with the admin's reply
        $contact->update([
            'admin_reply' => $request->input('admin_reply'),
        ]);

        $user = $contact->email;
        $reply = $request->input('admin_reply');

        Mail::to($user)->send(new ContactReply($user, $reply));
        $contact->delete();
        return redirect()->route('contact.form')->with('success', 'Reply sent successfully.');
    }
}
