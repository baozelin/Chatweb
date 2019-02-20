<?php

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with(['user'])->get();   //with 获得user 下所以的messages

        return response()->json($messages);       //encode to json
    }



    public function store(Request $request)
    {
        $message = $request->user()->messages()->create([
            'body' => $request->body
        ]);


        broadcast(new MessageCreated($message))->toOthers();    //create a new even and 只发给别人

        return response()->json($message);
    }
}