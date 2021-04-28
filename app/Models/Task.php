<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property bool $completed
 * @property Client $client
 * @property Client $implementer_id
 * @property DateTime $from
 * @property DateTime $to
 */
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

    public function implementer(): HasOne
    {
        return $this->hasOne(Client::class, 'id');
    }

    public function tasklist(): HasOne
    {
        return $this->hasOne(Tasklist::class);
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
        'title', 'description', 'from', 'to', 'client_id', 'implementer_id', 'tasklist_id', 'completed'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'from' => 'datetime',
        'to' => 'datetime'
    ];
}
