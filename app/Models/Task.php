<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'title', 'description', 'from', 'to', 'client_id', 'implementer'
    ];

    protected $casts = [
        'from' => 'datetime',
        'to' => 'datetime'
    ];
}
