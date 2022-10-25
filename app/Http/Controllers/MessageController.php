<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;

use App\Models\Message;

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

      //  $request->ip = $request->ip();

       // $data = $request->validated();

        $data = ['ip' => $request->ip()];

        return $data;

        if ($data) {
            $information = new NotifyMail($data);


            $mail = config('mail.from.address');

            Mail::to($mail)->send($information);

            $message = Message::create($data);

            $flash = 'Email sent successfully';

            return to_route('home', 'email sent')->with('status', $flash);
        }
    }
}
