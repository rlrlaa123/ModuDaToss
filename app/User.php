<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    public $timestamp = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'confirm_code',
        'activated',
        'gender',
        'phoneNumber',
        'bankName',
        'accountNumber',
        'photo',
        'signature',
        'type',
        'recommender',
        'recommend_code',
        'AclassRecommender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
        'confirm_code',
    ];

    protected $casts = [
        'activated' => 'boolean',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function servicecenter()
    {
        return $this->hasMany(ServiceCenter::class);
    }

    public function salesinfos()
    {
        return $this->hasMany(SalesInfo::class);
    }

    public function scopeSocialUser(\Illuminate\Database\Eloquent\Builder $query, $email)
    {
        return $query->whereEmail($email)->whereNull('password')->whereActivated(1);
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
