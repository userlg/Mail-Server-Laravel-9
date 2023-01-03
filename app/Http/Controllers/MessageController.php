<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;

use App\Models\Message;

use App\Models\Temp;

use Illuminate\Support\Facades\Mail;

use App\Mail\NotifyMail;

use App\Jobs\SendCodeEmail;

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

        $email = $data["senderEmail"];

        $data = [
            "title" => $request->title,
            "senderEmail" => $email,
            "message" => $request->message,
            "ip"    => $request->ip()
        ];

        Message::create($data);

        //return dd(Temp::find($email));

        if (count(Temp::where('email', $email)->get()) == 0) {

            $flash = 'Email sent successfully';
            $code = $this->generateCode();
            Temp::create([
                'email' => $email,
                'code' => $code
            ]);
            SendCodeEmail::dispatch($code);
        } else {
            $flash = 'Email was already sent, please check your inbox';
        }

        session()->flash('status', $flash);

        return view('confirmation', compact(['email']));
    }
}
