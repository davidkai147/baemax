<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 * @package App\Models
 * @property int $level
 * @property int $parentId
 * @property string $name
 */
class Area extends Model
{
    const AREA_LEVEL_NATION = 1;
    const AREA_LEVEL_PROVINCE = 2;
    const AREA_LEVEL_DISTRICT = 3;
    const AREA_LEVEL_WARD = 4;

    protected $table = 'areas';

    protected $fillable = [
        'level',
        'parent_id',
        'name',
    ];
}
