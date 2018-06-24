<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function patients()
    {
        return $this->belongsToMany(Patient::class)->withPivot('start_at','expired_at','order_no','policy_no');
    }

    public function coachs()
    {
        return $this->belongsToMany(Coach::class)->withPivot('expired_at','author');
    }
    
}
