<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
