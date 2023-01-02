<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;

use App\Models\Message;

use App\Models\Temp;

use Illuminate\Support\Facades\Mail;

use App\Mail\NotifyMail;

use App\Mail\CodeVerificationMail;

use Illuminate\Http\Request;


class MessageController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function generateCode()
    {

        //This function generate the random code

        $code = chr(rand(ord('A'), ord('Z')));

        for ($i = 0; $i < 5; $i++) {

            $par = random_int(1, 2);

            if ($par == 1) {

                $code = $code . strval(random_int(0, 9));
            } else {
                $code = $code . chr(rand(ord('A'), ord('Z')));
            }
        }

        return $code;
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

        $email = $data["senderEmail"];

        $message = Message::create($data);

        /*  $information = new NotifyMail($data);

        $mail = config('mail.from.address');

        Mail::to($mail)->send($information);

        $flash = 'Email sent successfully';

        return to_route('home')->with('status', $flash); */

        $code = $this->generateCode();

        $information =  new CodeVerificationMail([
            "title" => "Verification Code",
            "message" => "Please Introduce the verification code to continue",
            "code" => $code
        ]);

        $mail = config('mail.from.address');

        Mail::to($mail)->send($information);


        return view('confirmation', compact(['email']));
    }
}
