<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

use Carbon\Carbon;

class ContactController extends Controller
{
    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15|min:10',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Store the message in the database
        $contactMessage = new ContactMessage();
        $contactMessage->name = $request->input('name');
        $contactMessage->email = $request->input('email');
        $contactMessage->phone = $request->input('phone'); 
        $contactMessage->subject = $request->input('subject');
        $contactMessage->message = $request->input('message');
        $contactMessage->save();

        return redirect()->back()->with('success', 'Your message has been stored. Thank you!');
    }

    public function showMessages(Request $request)
    {
        $date = $request->input('date', Carbon::today()->toDateString());

        $messages = ContactMessage::whereDate('created_at', $date)->get();

        return view('admin.contact_messages', compact('messages', 'date'));
    }
}
