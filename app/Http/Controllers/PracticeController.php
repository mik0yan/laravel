<?php

namespace App\Http\Controllers;

use App\model\Patient;
use App\User;
use Illuminate\Http\Request;

class PracticeController extends BaseController
{
    public function syncQirun(Request $rq)
    {
        switch ($rq->recordType){
            case "bp":
                $result = $this->updateBp($rq->opType,$rq->record);
                break;
            case "user":
                $result = $this->updateUser($rq->opType,$rq->record);
                break;
            case "heartRate":
                $result = $this->updateHeartRate($rq->opType,$rq->record);
                break;
        }


        return $this->responseWithErr($result ? 1:0, $result);
    }

    private function updateUser($type,$record)
    {
        $data = json_decode($record,1);
//        return $data;
        switch ($type){
            case "1":
                if(!$user = User::where('phone',$data['loginName'] )->first())
                    $user = User::create(['name'=>$data['userName'],'phone'=>$data['loginName'],'password'=>$data['loginPassword']]);
                if(!$patient = Patient::where('user_id',$user->id)
                    ->where('name',$data['userName'])->first())
                    $patient = $user->patients()->create([
                        'relation'=>"本人",
                        'name'=>$data['userName'],
                        'gender'=>$data['sex'] + 1 ,
                        'birthday'=>$data['birthday'],
                        'phone'=>$data['loginName'],
                        'card_no'=>$data['idCardNo']]);
                $patient->suppliers()->attach(2,[]);
                break;
            case "2":
            case "3":
            default:
                return "类型参数错误";
        }
    }

    private function updateBp($type,$record)
    {

        $data = json_decode($record);
    }
}
