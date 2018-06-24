<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PatientInfo extends Model
{
    public function Patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
