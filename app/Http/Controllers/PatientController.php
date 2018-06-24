<?php

namespace App\Http\Controllers;

use App\model\Patient;
use App\Transformer\PatientTransformer;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PatientController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();
        $user = $this->guard()->user();
        $user->patients()->create($data);
        $user = User::find($user->id);
        $transform = new PatientTransformer();
        return $this->respondWithData(['patients'=>$transform->transformCollection($user->patients)]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->json()->all();
        $user = $this->guard()->user();
        if($user->patients->contains($id))
        {
            Patient::find($id)->update($data);
            $transform = new PatientTransformer();
            $user = User::find($user->id);
            return $this->respondWithData(['patients'=>$transform->transformCollection($user->patients)]);
        }
        else
            return $this->response->errorForbidden();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->guard()->user();
        if($user->patients->contains($id))
        {
            Patient::destroy($id);
            $transform = new PatientTransformer();
            return $this->respondWithData("","delete successful");

        }
        else
            return $this->response->errorForbidden();
    }


    public function apply($id,$sid)
    {
        $user = $this->guard()->user();
        if($user->patients->contains($id))
        {
            Patient::find($id)->suppliers()->attach($sid,[
                'start_at'=>Carbon::parse(now())->toDateString(),
                'expired_at'=>Carbon::parse(now())->addYear()->subSecond()->toDateString(),
            ]);
//            $transform = new PatientTransformer();
            return $this->respondWithData("","apply successful");

        }
        else
            return $this->response->errorForbidden();
    }

    public function absent($id,$sid)
    {
        $user = $this->guard()->user();
        if($user->patients->contains($id))
        {
            Patient::find($id)->suppliers()->detach($sid);
//            $transform = new PatientTransformer();
            return $this->respondWithData("","absent successful");

        }
        else
            return $this->response->errorForbidden();
    }



}
