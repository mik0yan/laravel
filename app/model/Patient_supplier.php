<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient_supplier extends Model
{
    use SoftDeletes;

    protected $table = "patient_supplier";

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
}
