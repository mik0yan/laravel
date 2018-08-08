<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Dingo\Api\Http\Response;
use Dingo\Api\Routing\Helpers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTFactory;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;


class BaseController extends Controller
{
    use Helpers;


    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth:api', ['except' => ['login','register','verifysms']]);
    }



    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }

    protected function respondWithToken($token,$data="")
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'data' => $data
        ]);
    }

    protected function respondWithData($data,$message="success",$code=200)
    {
        return response()->json([
            'code' =>$code,
            'message' => $message,
            'data'=> $data,
        ]);
    }

    protected function respondWithCode($data,$message="success",$code=1)
    {
        return response()->json([
            'code' =>$code,
            'message' => $message,
            'data'=> $data,
        ]);
    }

    protected function responseWithErr($errcode = 0,$message = "")
    {
        return response()->json([
            'err' => $errcode,
            'error_msg'=>$message ?? ""
        ]);
    }

}