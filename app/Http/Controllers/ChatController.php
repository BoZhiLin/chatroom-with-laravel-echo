<?php

namespace App\Http\Controllers;

use App\Events\PushNotification;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function showChatRoom()
    {
        return view('chat');
    }

    public function sendMessage()
    {
        $message = [
            'user' => auth()->user()->name,
            'content' => request()->content
        ];
        event(new PushNotification($message));
        return response()->json(['status' => 0]);
    }
}
