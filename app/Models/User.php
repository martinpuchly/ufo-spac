<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }


    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }



    private function allPermissions(): array
    {
        $permmissions = [];
        $groups = $this->groups;
        foreach ($groups as $group) {
            $permmissions = array_merge($permmissions, $group->permissions->pluck('key')->toArray());
        }
        $permmissions = array_merge($permmissions, $this->permissions->pluck('key')->toArray());
        return array_unique($permmissions);
    }

    public function hasPerm($permission_key = ""): bool
    {
        if ($this->id === 1) return true;
        return in_array($permission_key, $this->allPermissions());
    } 

    public function getHasAdminLinkAttribute(): bool
    {
        if (count($this->allPermissions()) > 0 || $this->id === 1) return true;
        return false;
    }


    public function player(): HasOne
    {
        return $this->hasOne(Player::class);
    }

}
