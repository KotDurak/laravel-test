<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function getCreatedAtAttribute($value)
    {
        return date('d.m.Y H:i', strtotime($value));
    }
}
