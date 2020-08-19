<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 * @property string $name
 * @property string $description
 */
class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
    ];
}
