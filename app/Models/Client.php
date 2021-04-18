<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticable;

/**
 * @property int $id
 * @property Role $role
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property \Illuminate\Support\Carbon $birthday
 * @property string|null $address
 * @property string|null $city
 */
class Client extends Authenticable
{
    use HasFactory;


    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Whether the user is admin or not.
     */
    public function isAdmin(): bool
    {
        return $this->role->id === 1;
    }

    /**
     * Whether the user is implementer or not.
     */
    public function isImplementer(): bool
    {
        return $this->role->id === 2;
    }

    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'phone', 'birthday', 'address', 'city', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $casts = [
        'birthday' => 'datetime',
    ];
}
