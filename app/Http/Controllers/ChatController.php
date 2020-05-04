<?php

namespace App\Http\Controllers;

use App\Message;
use App\Services\ChatService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    private $chatService;

    public function __construct(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }

    public function index($id)
    {
        $user = User::findOrFail($id);
        $user_from = Auth::user()->id;

        $messages = $this->chatService->getLastMessages($user_from, $user->id);

        return view('chat.index', [
            'user_to'   => $user->id,
            'user_from' => Auth::user()->id,
            'messages'  => $messages
        ]);
    }

    public function send(Request $request)
    {
        $post = $request->post();
        $validate = $this->validate($request, [
           'message'    => 'string',
           'user_from'  => 'required|int',
           'user_to'    => 'required|int'
        ]);

        if ($validate) {
           $message = new Message($post);
           if ($message->save()) {
               return [
                   'code'       => 0,
                   'message'    => 'OK',
                   'data'    =>  [
                       'message'    => $message->message,
                       'time'       => $message->created_at,
                       'author_id'  => $message->user_from,
                       'user_to'    => $message->user_to,
                       'user_from'     => $message->userFrom->name
                   ]
               ];
           }
        }

        return [
            'code'  => 1,
            'message'   => 'Error by sendind message'
        ];
    }

    public function upload(Request $request)
    {
        $post = $request->post();
        $validate = $this->validate($request, [
           'id' => 'required|int',
           'self'  => 'required|bool'
        ]);

        if ($validate) {
            $lastMessage = Message::findOrFail($post['id']);
            $selfId = $post['self'] ? $lastMessage->user_from : $lastMessage->user_to;
            $messages = $this->chatService->getLastMessagesByLastId($lastMessage->user_from, $lastMessage->user_to, $post['id'], $selfId);

            return [
                'code'  => 0,
                'messages' => $messages
            ];
        }
    }
}
