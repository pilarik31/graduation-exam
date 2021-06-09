<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

/**
 * @property int $id
 * @method static Builder mine()
 */
class Timer extends Model
{
    protected $fillable = [
        'name', 'user_id', 'project_id', 'stopped_at', 'started_at'
    ];

    protected $dates = ['started_at', 'stopped_at'];

    protected $with = ['user'];

    /**
     * Get the related user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * Get timer for current user.
     */
    public function scopeMine(Builder $query): Builder
    {
        return $query->where('user_id', '=', Auth::id());
        // return $query->whereUserId(Auth::id());
    }

    /**
     * Get the running timers
     */
    public function scopeRunning(Builder $query): Builder
    {
        return $query->whereNull('stopped_at');
    }
}
