<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\MessageRequest;

use App\Models\Message;

use Illuminate\Support\Facades\Mail;

use App\Mail\NotifyMail;

class MessageController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function sendEmail(MessageRequest $request)
    {

        $data = $request->validated();

        if ($data) {
            $information = new NotifyMail('message 123');
            Mail::to($data['emailDestiny'])->send($information);

            $message = Message::create($data);

            return $message;
        }
    }
}
