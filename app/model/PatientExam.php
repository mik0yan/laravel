<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PatientExam extends Model
{

    public function symptoms()
    {
        return $this->belongsToMany(Symptom::class);
    }

    public function practices()
    {
        return $this->belongsToMany(Practice::class)->withPivot('value', 'record')->withTimestamps();
    }
}
