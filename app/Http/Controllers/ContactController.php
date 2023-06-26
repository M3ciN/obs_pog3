<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $message = new Message();
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        $message->save();

        return redirect()->route('obs_pog.index')->with('success', 'Dziękujemy za wiadomość. Odezwiemy się jak najszybciej.');
    }

    public function showMessages()
    {
        $messages = Message::all();

        return view('messages.index', compact('messages'));
    }

    public function replyForm($id)
    {
        $message = Message::findOrFail($id);

        return view('reply-form', compact('message'));
    }

    public function sendReplyEmail(Request $request)
    {
        // Pobierz dane z formularza
        $messageId = $request->input('message_id');
        $replyMessage = $request->input('reply_message');

        // Znajdź wiadomość na podstawie ID
        $message = Message::findOrFail($messageId);

        // Wysyłanie odpowiedzi email
        // ...

        // Przekierowanie lub wyświetlenie komunikatu sukcesu
        // ...
    }

    public function replyToMessage($messageId)
{
    $message = Message::findOrFail($messageId);
    $email = $message->email;
    $subject = "Odpowiedź na Twoją wiadomość";

    return redirect("mailto:$email?subject=$subject");
}
}
