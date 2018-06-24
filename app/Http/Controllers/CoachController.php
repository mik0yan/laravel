<?php

namespace App\Http\Controllers;

use App\model\Coach;
use App\model\Patient;
use App\Transformer\PatientTransformer;
use App\User;
use Illuminate\Http\Request;
use Dingo\Api\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use JWTAuth;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Exceptions\JWTException;


class CoachController extends BaseController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register','reset']]);
        Config::set('auth.providers.users.model', \App\model\Coach::class);
        Config::set('jwt.user', 'App\model\Coach');

    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = request(['phone', 'password']);
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return  $this->respondWithData("手机或者密码错误");
            }
        } catch (JWTException $e) {
            return $this->respondWithData("token 无法生成");
        }

        return $this->respondWithToken($token);
    }

    public function register(Request $request)
    {
        $rules = [
            'name'=>'required|min:2',
            'phone'=>'required|unique:coaches|numeric|regex:/^1[34578][0-9]{9}$/',
            'email'=>'unique:coaches|email',
            'password'=>'required|min:6|max:32',
        ];
        $this->validate($request, $rules);

        $data = $request->json()->all();
        $user =  Coach::create($data);
        $token = JWTAuth::fromUser($user);
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $coach = JWTAuth::parseToken()->authenticate();
        return $this->respondWithData($coach);
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        JWTAuth::setToken(JWTAuth::getToken())->invalidate();

        return $this->respondWithData("");
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



    public function refresh()
    {
        Config::set('auth.providers.users.model', \App\model\Coach::class);
        Config::set('jwt.user', 'App\model\Coach');
        return $this->respondWithToken($this->guard()->refresh());
    }


    public function form($id)
    {
        $transform = new PatientTransformer();
        return $this->respondWithData($transform->transformForForm(Patient::find($id)));
    }

    public function storerecord(Request $rq)
    {
//        $data = $rq->json()->all();
    }
}