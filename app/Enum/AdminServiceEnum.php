<?php

declare(strict_types=1);

namespace App\Enum;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AdminServiceEnum extends AbstractEnum
{
    public const CO_WORKING_SPACE = KeyWordEnum::CO_WORKING_SPACE;
    public const FREELANCER = KeyWordEnum::FREELANCER;
    public const BUILDING_PROVIDER = KeyWordEnum::BUILDING_PROVIDER;
    public const INVESTOR = KeyWordEnum::INVESTOR;

    public static function getValues(): array
    {
        return [
            self::CO_WORKING_SPACE,
            self::FREELANCER,
            self::BUILDING_PROVIDER,
            self::INVESTOR
        ];
    }

    public static function getTranslationKeys(): array
    {
        return [
            self::CO_WORKING_SPACE => __('general.' . self::CO_WORKING_SPACE),
            self::FREELANCER => __('general.' . self::FREELANCER),
            self::BUILDING_PROVIDER => __('general.' . self::BUILDING_PROVIDER),
            self::INVESTOR => __('general.' . self::INVESTOR)
        ];
    }

    public static function getImage($key)
    {
        $images = array(
            self::CO_WORKING_SPACE => asset('images/screen2.jpg'),
            self::FREELANCER => asset('images/screen3.jpg'),
            self::BUILDING_PROVIDER => asset('images/screen3.jpg'),
            self::INVESTOR => asset('images/screen4.jpg')
        );
        if (!is_null($key) && array_key_exists($key, $images)) {
            return $images[$key];
        } else {
            return null;
        }
    }

    public static function check_permission($user, $permission): bool
    {
        $permissions = self::get_query($user);
        $key = CacheEnum::CHECK_PERMISSION . "_" . $permission;
        return Cache::remember($key, 3600, function () use ($key, $permissions, $permission) {
            $permissions = $permissions->where('permissions.slug', $permission);
            if ($permissions->exists()) {
                return true;
            } else {
                return false;
            }
        });
    }

    public static function get_role_permission_array(): array
    {
        return Cache::remember(CacheEnum::CURRENT_USER_PERMISSION, 3600, function () {
            return self::get_query(Auth::user())->pluck('permissions.slug')->toArray();
        });
    }

    public static function get_query($user): Builder
    {
        return DB::table(TableEnum::PERMISSIONS)
            ->join(TableEnum::ROLE_PERMISSION, 'role_permission.permission_id', 'permissions.id')
            ->join(TableEnum::ROLES, 'role_permission.role_id', 'roles.id')
            ->join(TableEnum::ROLE_USER, 'role_user.role_id', 'roles.id')
            ->join(TableEnum::USERS, 'role_user.user_id', 'users.id')
            ->where('users.id', $user->id);
    }
}
