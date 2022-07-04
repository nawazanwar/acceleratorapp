<?php

namespace App\Models\UserManagement;

use App\Enum\RoleEnum;
use App\Enum\TableEnum;
use App\Enum\TableHeadings\UserManagement\AdminTableHeadingEnum;
use App\Models\Building;
use App\Models\PackageManagement\Subscription;
use App\Models\PlanManagement\Plan;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'email',
        'password',
        'active',
        'first_password',
        'email_verified_at'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function hr(): HasOne
    {
        return $this->hasOne(Hr::class, 'user_id');
    }

    public function getFullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public static function getNotifier()
    {
        return User::where('email', 'superadmin@gmail.com')->first();
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, TableEnum::ROLE_USER);
    }

    public function hasRole($role): bool
    {
        if (is_string($role)) {
            return $this->roles->contains('slug', $role);
        }
        return !!$role->intersect($this->roles);
    }

    public function getRoleName(): bool
    {
        return $this->roles[0]->name;
    }

    public function ability($permission = null): bool
    {
        return !is_null($permission) && RoleEnum::check_permission($this, $permission);
    }

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class, 'subscribed_id', 'id');
    }

    public function alreadySubscribed($id)
    {
        return Subscription::where('subscribed_id',$id)->exists();
    }

    public function created_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updated_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
