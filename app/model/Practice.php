<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    protected $fillable = [
        'name', 'typ', 'twn',
        'dsc','unt'
    ];
}
