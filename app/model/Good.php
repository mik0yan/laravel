<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Good extends Model
{
//    use SoftDeletes;

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function catalog()
    {
        return $this->belongsTo(Good_cat::class,'cat_id','id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('attribute_id','number','subtotal');
    }
}
