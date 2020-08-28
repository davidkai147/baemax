<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 * @package App\Models
 * @property int $status
 * @property int $type
 * @property string $name
 * @property string $email
 * @property string $phoneNumber
 * @property string $password
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable;

    const TYPE_ADMIN = 1;
    const TYPE_USER = 2;
    const TYPE_SHIPPER = 3;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    protected $table = 'users';

    protected $fillable = [
        'status',
        'type',
        'name',
        'email',
        'phone_number',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}
