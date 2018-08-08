<?php

namespace App\Http\Controllers;

use App\model\Patient;
use Carbon\Carbon;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\model\Patient_supplier;
use Illuminate\Http\Response;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Log;


class BznController extends BaseController
{

    public function getPatient(Request $rq)
    {
        $supplier = auth()->guard('supplier')->user();
//        $supplier->patients;
        $policyno = $rq->policyno;
        $ps = Patient_supplier::where('policy_no', $policyno)->orderby('expired_at', 'desc')->first();
        $ps['patient'] = $ps->patient;
        return $this-> respondWithCode($ps);
    }

    public function uploadHealthItem($patient_id)
    {
        $responses = [];
        if ($policys = Patient_supplier::where('patient_id', $patient_id)->where('start_at', '<', now())->where('expired_at', '>', now())->get()) {
            foreach ($policys as $policy) {
                $lists = [];
                $patient = Patient::find($policy->patient_id);
                foreach ($patient->records->where('record_at', '>', $policy->upload_at)->take(9) as $record) {
                    $lists[] = [
                        "itemCode" => $record->practice_id,
                        "itemValue" => $record->v1,
                    ];
                }
                $policy->upload_at = now();
                $policy->save();
                $data = [
                    'orderId' => str_random(16),
                    'policyOrderId' => $policy->order_no,
                    'healthItemList' => $lists,
                ];
                Log::info("upload health date".json_encode($data));
                $response =  $this->post_data(json_encode($data), 'uploadHealthItem');
                $responses[] = $response;
            }
            return $this->respondWithCode($responses);
        } else {
            return '33';
        }


    }

    //更新保险信息
    public function updatePolicy(Request $rq)
    {
        $data = $rq->json()->all();

        if($ps = Patient_supplier::where('order_no',$data['orderId'])->first())
        {
            $ps->start_at = Carbon::parse($data['insBeginDate']);
            $ps->expired_at = Carbon::parse($data['insEndDate']);
            $ps->premium = (int)$data['totalPremium'];
            $ps->fix = (int)$data['fixedAmount'];
            $ps->amount = (int)$data['floatingAmount'];
            $ps->policy_no = $data['policyNo'];
//        $ps->epolicy_url = $data['epolicyUrl'];
            $ps->save();
            return \Response::json([
                'code' =>1,
                'message' => '更新成功'
            ]);
        }
        else
            return \Response::json([
                'code' =>2007,
                'message' => '没有订单号'
            ]);

    }
//保险申请失败
    public function failPolicy(Request $rq)
    {
        $data = $rq->json()->all();
        if($ps = Patient_supplier::where('order_no',$data['orderId'])->first()){
            $ps->err_msg = $data['message'];
//        $ps->policy_no = $data['policyNo'];
//        $ps->epolicy_url = $data['epolicyUrl'];
            $ps->save();
            $ps->delete();
            return [
                'code'=>1,
                'message' => "删除成功"
            ];
        }
        elseif(Patient_supplier::onlyTrashed()->where('order_no',$data['orderId'])->first()){
            return \Response::json([
                'code' =>2008,
                'message' => '重复删除'
            ]);
        }
        else
            return \Response::json([
                'code' =>2007,
                'message' => '没有订单号'
            ]);
    }

    public function syncPrice(Request $rq, $id=1)
    {

        $datas = $rq->json()->all();
        foreach($datas as $data)
        {

            $patient = Patient::find($data['policy_no']);
            $supplier = $patient->suppliers()->where('id',$id)->get()->first();
            $supplier->pivot->price = $data['price'];
            $supplier->pivot->save();
        }
        return $this->response->created();
        $rs = [];
        for($i=1;$i <= 1400; $i++)
        {
            $r = ['id'=>$i,'price'=>rand(100,50000)];
            array_push($rs,$r);
        }
        return $rs;
    }

    public function updatePrice(Request $rq)
    {
        $data = $rq->json()->all();
//        return $data['orderId'];
        if($po = Patient_supplier::where('order_no',$data['orderId'])->first())
        {
            if($po['expired_at']>now()) {
                $po->amount = $data['price'];
                $po->save();
                return [
                    'code' => 1,
                    'message' => "success",
                    'data' => [
                        'policyNo' => $po->policy_no,
                        'orderId' => $po->order_no,
                        'productCode'=> $po->product_code,
                        'floatingAmount'=>  $po->amount,
                    ],
                ];
            }
            else
                return [
                    'code' => 2002,
                    'message' => "已过期",
                ];
        }
        else
            return [
                'code' => 2004,
                'message' => "没有订单号",
            ];
    }

    public function commitInsured($patient_id)
    {
        $faker = new Faker('zh_CN');
        $p = Patient::find($patient_id);
        $u = $p->user;
        $orderId = Uuid::numberBetween();
        $data = [
            "order" => [
                'orderId' => $orderId,
                "productCode" => 'BZN_HZ_DIABETES',
                "beginDateTime" => Carbon::parse(now())->addDay()->toDateString()." 00:00:00",
                "endDateTime" => Carbon::parse(now())->addYear()->toDateString()." 23:59:59",
            ],
            "insured" => [
                "name" => $p->name,
//                "relationship" => "601008",
//                "cardType" =>"2",
                "cardNo"=>$p->card_no,
                "birthday"=>$p->birthday,
                "mobile"=>$p->phone,
                "email"=>$u->email,
                "sex"=>(string) ($p->gender==2?0:$p->gender),
            ],
            "declarationAnswernList" => [
                [
                    'infoCode'=>"241",
                    'infoFile1'=>"N"
                ],
                [
                    'infoCode'=>"242",
                    'infoFile1'=>"N"
                ]
            ]
        ];
        //提交post请求
        $response =  $this->post_data(json_encode($data) ,'commitInsured');
        $array = json_decode($response,true);
        Log::info("Create New Insured".json_encode($response));

        if($array['code']==1)
        {
            $ps = new Patient_supplier;
            $ps->patient_id = $patient_id;
            $ps->supplier_id = 1;
            $ps->order_no = $orderId;
//            $ps->start_at = Carbon::parse($array['data']['insBeginDate']);
//            $ps->expired_at = Carbon::parse($array['data']['insEndDate']);
//            $ps->premium = (int)$array['data']['totalPremium'];
//            $ps->amount = (int)$array['data']['totalAmount'];
//            $ps->policy_no = $array['data']['policyNo'];
//            $ps->epolicy_url = $array['data']['epolicyUrl'];
            $ps->product_code = "BZN_HZ_DIABETES";
            $ps->save();

            return [
                "code" => 1,
                "message" => "success",
                "data" => $orderId,
                "response" => json_decode($response)

            ];
        }
        else
            return [
                "code" =>0,
                "message" => "unsuccess",
                "data" => $data,
                "response" => json_decode($response)
            ];
    }

//    private function createPolicy($response,$patient_id)
//    {
//        $array = json_decode($response,true);
//
//        $ps = new Patient_supplier;
//
//
//        $ps->patient_id = $patient_id;
//        $ps->supplier_id = 1;
//        $ps->order_no = $array['data']['insBeginDate'];
//        $ps->start_at = Carbon::parse($array['data']['insBeginDate']);
//        $ps->expired_at = Carbon::parse($array['data']['insEndDate']);
//        $ps->premium = (int) $array['data']['totalPremium'];
//        $ps->amount = (int) $array['data']['totalAmount'];
//        $ps->policy_no = $array['data']['policyNo'];
//        $ps->epolicy_url = $array['data']['epolicyUrl'];
//        $ps->product_code = "BZN_HZ_HYPERTENSION";
//        $ps->save();
//
//        return [
//            "code" =>1,
//            "message" => "success",
//            "data" => $response
//        ];
//    }

    private function post_data($data1,$route)
    {
        $ts = (int) (microtime(1)*1000);
        $fields = array(
            'appId' => (config('bzn.bzn_id')),
            'timestamp' => (string) $ts,
            'data' => $data1 ,
            'sign' =>(md5(config('bzn.bzn_id').config('bzn.bzn_secret').$ts.$data1)),
        );
        $postvars = '';
        foreach($fields as $key=>$value) {
            $postvars .= $key . "=" . $value . "&";
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://open.baozhunniu.com/api/health/hezhong/".$route,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER =>  false,
//            CURLOPT_CAINFO => $cacert,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_ENCODING => "UTF-8",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $postvars,
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/x-www-form-urlencoded",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        Log::info("curl response print ".json_encode($response));
        Log::info("curl che print".json_encode($err));

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
}
