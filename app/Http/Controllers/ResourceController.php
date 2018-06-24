<?php

namespace App\Http\Controllers;

use App\model\Practice;
use App\model\Symptom;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function symptoms()
    {
        return Symptom::all()->map(function($s){
            return [
                'id'=>$s->id,
                'name'=>$s->name,
            ];
        });
    }

    public function exam()
    {

        return  Practice::all()->groupBy('typ')->mapWithKeys(function($item,$k){
            if($k==1)
                $key = "general";
            elseif ($k==2)
                $key = "style";
            elseif($k==3)
                $key = "organ";
            elseif($k==4)
                $key = "exam";
            elseif($k==5)
                $key = "aux";
            elseif($k==6)
                $key = "cm";
            elseif($k==7)
                $key = "health";
            else
                $key = $k;
            return [$key=>$item];
        });
    }
}
