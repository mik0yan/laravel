<?php

namespace App\Http\Controllers;

use App\model\Coach;
use App\Transformer\PatientTransformer;
use App\User;
use Illuminate\Http\Request;
use Dingo\Api\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use JWTAuth;
use Config;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthController extends BaseController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register','reset']]);
        $this->user = new User;
        $this->admin = new Coach;
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
        Config::set('jwt.user', 'App\User');
        Config::set('auth.providers.users.model', \App\User::class);
        if ($token = JWTAuth::attempt($credentials)) {
            return $this->respondWithToken($token);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }


    public function register(Request $request)
    {
        $rules = [
            'name'=>'required|min:2',
            'phone'=>'required|unique:users',
            'email'=>'required|unique:users|email',
            'password'=>'required|min:6|max:32',
        ];
        $this->validate($request, $rules);

        $data = $request->json()->all();
        $user =  User::create($data);
        $token = JWTAuth::fromUser($user);
        return $this->respondWithToken($token);
    }

    public function coachLogin(Request $request){
        Config::set('jwt.user', 'App\model\Coach');
        Config::set('auth.providers.users.model', \App\model\Coach::class);
        $credentials = $request->only('phone', 'password');
        if ($token = JWTAuth::attempt($credentials)) {
            return $this->respondWithToken($token);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $transform = new PatientTransformer();
        $user['patients'] = $transform->transformCollection($user->patients) ;
        return $this->respondWithData($user);
    }

    public function coachMe()
    {
        Config::set('auth.providers.users.model', \App\model\Coach::class);
        Config::set('jwt.user', 'App\model\Coach');
        $coach  = JWTAuth::parseToken()->authenticate();
//        $transform = new PatientTransformer();
//        $user['patients'] = $transform->transformCollection($user->patients) ;
        return $this->respondWithData($coach);
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return $this->respondWithData("",'Successfully logged out');
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
            'access_token' => $token,
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


    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }
}