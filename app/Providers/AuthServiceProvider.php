<?php

namespace App\Providers;

use App\Enum\AbilityEnum;
use App\Enum\RoleEnum;
use App\Models\FlatManagement\Flat;
use App\Models\FlatManagement\FlatType;
use App\Models\FlatManagement\Floor;
use App\Models\FlatManagement\FloorType;
use App\Models\Sales\InstallmentTerm;
use App\Models\Sales\Plan;
use App\Models\ServiceManagement\Service;
use App\Models\SystemConfiguration\Setting;
use App\Models\UserManagement\Country;
use App\Models\UserManagement\District;
use App\Models\UserManagement\Hr;
use App\Models\UserManagement\HrDepartment;
use App\Models\UserManagement\HrDesignation;
use App\Models\UserManagement\HrOrganization;
use App\Models\UserManagement\HrProfession;
use App\Models\UserManagement\HrRelation;
use App\Models\UserManagement\Permission;
use App\Models\UserManagement\Province;
use App\Models\UserManagement\Role;
use App\Models\UserManagement\User;
use App\Policies\FlatManagement\FlatPolicy;
use App\Policies\FlatManagement\FlatTypePolicy;
use App\Policies\FlatManagement\FloorPolicy;
use App\Policies\FlatManagement\FloorTypePolicy;
use App\Policies\PlainManagement\InstallmentTermPolicy;
use App\Policies\PlainManagement\PlanPolicy;
use App\Policies\ServiceManagement\ServicePolicy;
use App\Policies\SystemConfiguration\SettingPolicy;
use App\Policies\UserManagement\CountryPolicy;
use App\Policies\UserManagement\DepartmentPolicy;
use App\Policies\UserManagement\DesignationPolicy;
use App\Policies\UserManagement\DistrictPolicy;
use App\Policies\UserManagement\HrPersonPolicy;
use App\Policies\UserManagement\OrganizationPolicy;
use App\Policies\UserManagement\PermissionPolicy;
use App\Policies\UserManagement\ProfessionPolicy;
use App\Policies\UserManagement\ProvincePolicy;
use App\Policies\UserManagement\RelationPolicy;
use App\Policies\UserManagement\RolePolicy;
use App\Policies\UserManagement\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [

        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Permission::class => PermissionPolicy::class,
        Service::class => ServicePolicy::class,

        Floor::class => FloorPolicy::class,
        FloorType::class => FloorTypePolicy::class,
        FlatType::class => FlatTypePolicy::class,


        HrRelation::class => RelationPolicy::class,
        Country::class => CountryPolicy::class,
        Province::class => ProvincePolicy::class,
        District::class => DistrictPolicy::class,

        HrDepartment::class => DepartmentPolicy::class,
        HrDesignation::class => DesignationPolicy::class,
        HrProfession::class => ProfessionPolicy::class,
        HrOrganization::class => OrganizationPolicy::class,

        Flat::class => FlatPolicy::class,
        Hr::class => HrPersonPolicy::class,


        Plan::class => PlanPolicy::class,
        InstallmentTerm::class => InstallmentTermPolicy::class,

        Setting::class => SettingPolicy::class,

    ];

    public function boot()
    {
        $this->registerPolicies();
        //Used only For View
        Gate::define('hasModuleAccess', function ($user, $module) {
            $permission = AbilityEnum::VIEW . "_" . $module;
            return RoleEnum::check_permission($user, $permission);
        });
        // Used for Any permission
        Gate::define('hasAccess', function ($user, $permission) {
            return RoleEnum::check_permission($user, $permission);
        });
    }
}
