<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    public function area()
    {
        return $this->belongsTo(Area::class,'areacode','areacode');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
