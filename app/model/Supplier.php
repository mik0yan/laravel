<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Supplier extends Authenticatable implements JWTSubject
{

    use  Notifiable;

    protected $hidden = ['password','wx_unionid','wx_openid','deleted_at'];

    public function patients()
    {
        return $this->belongsToMany(Patient::class);
//        ->withPivot('start_at','expired_at','order_no','policy_no');
    }

    public function coachs()
    {
        return $this->belongsToMany(Coach::class)->withPivot('expired_at','author');
    }

    public function setPasswordAttribute($value){

        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    
}
