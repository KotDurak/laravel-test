<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    protected $casts = [
       'created_ad'  => 'datetime'
    ];
}
