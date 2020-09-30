<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    protected $fillable = [
        'title', 'description', 'from', 'to'
    ];

    protected $casts = [
        'from' => 'datetime',
        'to' => 'datetime'
    ];
}
