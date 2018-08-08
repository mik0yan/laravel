<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;

    protected $fillable = ['relation','name','gender','birthday','card_no','patient_note','medical_note','areacode','code','address','phone'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class)->attach(['order_no','policy_no']);
    }

    public function Area()
    {
        return $this->belongsTo(Area::class,'areacode','areacode');
    }

    public function local()
    {
        return implode("-",array_slice(explode(',',$this->Area->merger_name), -2, 2, true));
    }

    public function infos()
    {
        return $this->hasMany(PatientInfo::class);
    }

    public function drugs()
    {
        return $this->belongsToMany(Drug::class)->withPivot('start', 'dosage', 'usage', 'time', 'compliance');
    }

    public function vaccines()
    {
        return $this->belongsToMany(Vaccine::class)->withPivot('vaccination', 'hospital_id', 'hospital');
    }


    public function inpatients()
    {
        return $this->hasMany(Inpatient::class);
    }

    
}
