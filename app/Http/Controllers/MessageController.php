<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;

use App\Models\Message;

use App\Models\Temp;

use App\Jobs\SendCodeEmail;

use App\Jobs\SendMessage;

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

        if (count(Message::where('senderEmail', $email)->where('status', 0)->get()) > 0) {

            session()->now('status', 'Email was already sent, please check your inbox');

            return view('confirmation', compact(['email']));
        }

        Message::create($data);

        if (count(Temp::where('email', $email)->get()) == 0) {

            $code = $this->generateCode();

            Temp::create([
                'email' => $email,
                'code' => $code
            ]);

            SendCodeEmail::dispatch($code);

            session()->now('status', 'Code sent successfully');

            return view('confirmation', compact(['email']));
        }
    }

    public function confirmCode(Request $request)
    {

        $email = $request->email;

        $code = $request->input1 . $request->input2 . $request->input3 . $request->input4 . $request->input5 . $request->input6;

        $result = Temp::where('email', $email)->get(['id', 'code']);

        if (count($result) == 1 && ($code == $result[0]['code'])) {

            Temp::destroy($result[0]['id']);

            $message = Message::where('senderEmail', $email)->where('status', 0)->first();

            $message->status = true;

            $message->save();

            $data = [
                "title" => $message->title,
                "message" => $message->message,
                "senderEmail" => $message->senderEmail,
                "ip" => $message->ip
            ];

            SendMessage::dispatch($data);

            return redirect('/')->with('status', 'Email sent correctly to the admin');
        } else {

            session()->now('status', 'Introduce the right code');

            return view('confirmation', compact(['email']));
        }
    }
}
