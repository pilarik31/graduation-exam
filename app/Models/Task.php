<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property bool $completed
 * @property User $user
 * @property User $implementer
 * @property Tasklist $tasklist
 * @property Comment $comments
 * @property DateTime $from
 * @property DateTime $to
 * @method sortBy($col)
 * @method static Builder mine()
 */
class Task extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function implementer(): HasOne
    {
        return $this->hasOne(User::class, 'id');
    }

    public function tasklist(): BelongsTo
    {
        return $this->belongsTo(Tasklist::class);
    }

    public function timers(): HasMany
    {
        return $this->hasMany(Timer::class);
    }

    /**
     * Get current user Tasks.
     */
    public function scopeMine(Builder $query): Builder
    {
        return $query->whereUserId(Auth::id());
    }

    /**
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'from', 'to', 'user_id', 'implementer_id', 'tasklist_id', 'completed'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'from' => 'datetime',
        'to' => 'datetime'
    ];
}
