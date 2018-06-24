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

class PatientTransformer extends Transformer
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

    public function baseTransform($patient)
    {
        $info = $patient->infos()->first();
        $user = $patient->user;
        return [
            'name' => $patient->name,
            'birthday' => $patient->birthday,
            'gender' => $patient->gender,
            'card_no' => $patient->card_no,
            'corp' => $info->corp ?? "",
            'phone'=> $patient->phone,
            'username'=>$user->name,
            'userphone'=>$user->phone,
            'hukou'=> $info->hukou ?? "",
            'ethnic'=> $info->ethnic ?? "",
            'bloodtype'=> $info->bloodtype ?? "",
            'education'=> $info->education ?? "",
            'career'=> $info->career ?? "",
            'marital'=> $info->marital ?? 5,
            'insurance'=> $info->insurance ?? 8,
            'allergy'=> isSet($info->allergy) ? json_decode($info->allergy) : ['无'],
            'his_disease'=> isSet($info->his_disease) ? json_decode($info->his_disease) : ['无'],
            'his_surgical'=> isSet($info->his_surgical) ? json_decode($info->his_surgical) : ['无'],
            'his_trauma'=> isSet($info->his_trauma) ? json_decode($info->his_trauma) : ['无'],
            'his_bloodtrans'=> isSet($info->his_bloodtrans) ? json_decode($info->his_bloodtrans) : ['无'],
            'his_family'=> isSet($info->his_family) ? json_decode($info->his_family) : ['无'],
            'genetic'=> $info->genetic ?? '无',
            'disability'=> isSet($info->disability) ? json_decode($info->disability) : ['无'],
        ];
    }

    public function examTransform($patient)
    {
        return [
            'name' => $patient->name,
            'inpatients'=>$patient->inpatients,
            'drugs'=>$patient->drugs,
            'vaccines'=>$patient->vaccines,
        ];
    }

    public function transformForForm($patient)
    {
        return [
            'base'=> $this->baseTransform($patient),
            'exam'=> $this->examTransform($patient)
        ];
    }


}