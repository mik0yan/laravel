<?php
/**
 * Created by PhpStorm.
 * User: mikuan
 * Date: 2018/5/30
 * Time: 下午11:35
 */

namespace App\Transformer;


use App\model\Patient;
use Carbon\Carbon;

class GoodTransformer extends Transformer
{
    public function transform($patient)
    {
        Carbon::setLocale('ZH');
        return [
            'id' => $patient->id,
            'doc_id' => sprintf("%08d", $patient->user->id)."-".sprintf("%010d", $patient->id),
            'relation' => $patient->relation,
            'name' => $patient->name,
            'gender' => $patient->gender,
            'birthday' => $patient->birthday,
            'age' => Carbon::parse($patient->birthday)->diffInYears(now()),
            'card_no' => $patient->card_no,
            'patient_note' => $patient->patient_note,
            'medical_note' => $patient->medical_note,
            'areacode' => $patient->areacode,
            'local' => $patient->local(),
            'code' => $patient->code,
            'address' => $patient->address,
            'phone' => $patient->phone,
        ];
    }

    public function transformCollection($patients)
    {
        return $patients->transform(function ($patient){
            return $this->transform($patient);
        });
    }


}