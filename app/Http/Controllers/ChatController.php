<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id);
        $user_from = Auth::user()->id;

        $messages = Message::where(['user_from' => $user_from, 'user_to' => $user->id])
            ->orWhereRaw('(user_to = ? and user_from = ?)',[$user_from, $user->id])
            ->with('userFrom')
            ->with('userTo')
            ->orderBy('id', 'asc')
            ->get()->map(function ($m) use ($user_from) {
                return [
                  'id'  => $m->id,
                  'author_id'    => $m->user_from,
                  'message' => $m->message,
                  'user_from'   => $m->userFrom->name,
                  'user_to' => $m->userTo->name,
                  'self'    =>  $m->user_from === $user_from,
                  'time'    => $m->created_at
                ];
            });

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
}
