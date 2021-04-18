<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property strint $name
 */
class Role extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
}
