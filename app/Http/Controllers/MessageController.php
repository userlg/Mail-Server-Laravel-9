<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;

class MessageController extends Controller
{
    
    public function index(){
        return view('home');
    }

    public function sendEmail(){

       // $message = Message::create();

        return Request()->json();
    }
}
