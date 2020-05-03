<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
      'message',
      'user_from',
      'user_to'
    ];

    protected $casts = [
      'created_at'  => 'datetime'
    ];

    public function userFrom()
    {
        return $this->belongsTo(User::class, 'user_from');
    }

    public function userTo()
    {
        return $this->belongsTo(User::class, 'user_to');
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d.m.Y H:i', strtotime($value));
    }
}
