<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;

use App\Models\Message;

use App\Models\Temp;

use Illuminate\Support\Facades\Mail;

use App\Mail\NotifyMail;

use Illuminate\Http\Request;


class MessageController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function sendEmail(MessageRequest $request)
    {

        $data = $request->validated();

        $data = [
            "title" => $request->title,
            "senderEmail" => $request->senderEmail,
            "message" => $request->message,
            "ip"    => $request->ip()
        ];

        $information = new NotifyMail($data);

        $mail = config('mail.from.address');

        Mail::to($mail)->send($information);

        $message = Message::create($data);

        $flash = 'Email sent successfully';

        return to_route('home')->with('status', $flash);
    }
}
