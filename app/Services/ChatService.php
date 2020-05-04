<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03.05.2020
 * Time: 16:32
 */

namespace App\Services;


use App\Message;

class ChatService
{
    public function getLastMessages(int $user_from, int $user_to)
    {
        $messages = Message::where(['user_from' => $user_from, 'user_to' => $user_to])
        ->orWhereRaw('(user_to = ? and user_from = ?)', [$user_from, $user_to])
        ->with('userFrom')
        ->with('userTo')
        ->limit(10)
        ->orderBy('id', 'desc')
        ->get()->map(function ($m) use ($user_from) {
            return [
                'id' => $m->id,
                'author_id' => $m->user_from,
                'message' => $m->message,
                'user_from' => $m->userFrom->name,
                'user_to' => $m->userTo->name,
                'self' => $m->user_from === $user_from,
                'time' => $m->created_at
            ];
        })->toArray();

        return array_reverse($messages);
    }

    public function getLastMessagesByLastId(int $user_from, int $user_to, int $lastId, int  $selfId)
    {
        $messages = Message::whereRaw('((user_to = ? and user_from = ?) or (user_to = ? and user_from = ?))', [$user_from, $user_to, $user_to, $user_from])
            ->where('id', '<', $lastId)
            ->with('userFrom')
            ->with('userTo')
            ->limit(10)
            ->orderBy('id', 'desc')
            ->get()->map(function ($m) use ($selfId) {
                return [
                    'id' => $m->id,
                    'author_id' => $m->user_from,
                    'message' => $m->message,
                    'user_from' => $m->userFrom->name,
                    'user_to' => $m->userTo->name,
                    'self' => $m->user_from === $selfId,
                    'time' => $m->created_at,
                ];
            })->toArray();

        return array_reverse($messages);
    }
}