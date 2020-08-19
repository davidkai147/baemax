<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class User extends Model
{
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
    ];

}
