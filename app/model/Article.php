<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function catalog()
    {
        return $this->belongsTo(Article_cat::class,'cat_id','id');
    }

    public function goods()
    {
        return $this->belongsToMany(Good::class);
    }
}
