<?php

namespace App\Http\Controllers;

use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function getMessages(Request $request)
    {
        $messages = Message::Where('user_id', Auth::user()->id)->get();
        $res = array();
        foreach ($messages as $message) {
            $time = new Carbon($message->created_at);
            $timestamp = $time->toTimeString();
            $text = $message->message;
            $res[] = array('time' => $timestamp, 'text' => $text);
        }
        return response()->json(array('messages' => $res));
    }
    public function getAllMessages(Request $request, $video)
    {
        $messages = Message::get();
        $res = array();
        foreach ($messages as $message) {
            $time = new Carbon($message->created_at);
            $timestamp = $time->toTimeString();
            $ip = $message->ip;
            $text = $message->message;
            $res[] = array('time' => $timestamp, 'text' => $text, 'ip' => $ip);
        }
        return response()->json(array('messages' => $res));
    }
    public function addMessage(Request $request)
    {
        $message = new Message();
        $message->message = htmlentities($request->input('message'));
        $message->ip = $request->ip();
        $message->user_id = Auth::user()->id;
        if ($message->save()) {
            return response()->json(array('success' => 1));
        }
    }
}
