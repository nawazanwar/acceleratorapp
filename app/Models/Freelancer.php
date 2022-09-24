<?php

namespace App\Models;

use App\Enum\MediaTypeEnum;
use App\Enum\TableEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Freelancer extends Model
{
    use HasFactory;

    protected $table = TableEnum::FREELANCERS;
    protected $casts = [
        'affiliations' => 'array',
    ];
    protected $fillable = [
        'company_name',
        'is_register_company',
        'affiliations',
        'company_no_of_emp',
        'company_date_of_initiation',
        'company_address',
        'company_contact_no',
        'company_email',
        'payment_process',
        'map_address',
        'map_latitude',
        'map_longitude',
        'about_us',
        'instagram',
        'facebook',
        'twitter',
        'youtube',
        'linkedIn',
        'whatsapp',
        'office_start_time',
        'office_end_time'
    ];

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, TableEnum::FREELANCER_SERVICE, 'freelancer_id')
            ->where('freelancer_service.service_type', 'package')
            ->withPivot('service_type', 'limit', 'building_limit', 'floor_limit', 'office_limit')
            ->withTimestamps();
    }

    public function other_services(): HasMany
    {
        return $this->hasMany(FreelancerService::class, 'freelancer_id')
            ->where('service_type', 'other');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function logo(): HasMany
    {
        return $this->hasMany(Media::class, 'record_id', 'id')
            ->where('record_type', MediaTypeEnum::SP_LOGO);
    }

    public function front_id_card(): HasMany
    {
        return $this->hasMany(Media::class, 'record_id', 'id')
            ->where('record_type', MediaTypeEnum::SP_FRONT_ID_CARD);
    }

    public function back_id_card(): HasMany
    {
        return $this->hasMany(Media::class, 'record_id', 'id')
            ->where('record_type', MediaTypeEnum::SP_BACK_ID_CARD);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Media::class, 'record_id', 'id')
            ->where('record_type', MediaTypeEnum::SP_DOCUMENT);
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(Media::class, 'record_id', 'id')
            ->where('record_type', MediaTypeEnum::SP_CERTIFICATE);
    }

    public function focal_persons(): HasMany
    {
        return $this->hasMany(FreelancerFocalPerson::class, 'freelancer_id', 'id');
    }

    public function qualifications(): HasMany
    {
        return $this->hasMany(FreelancerQualification::class, 'freelancer_id');
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(FreelancerExperience::class, 'freelancer_id');
    }

    public function certifications(): HasMany
    {
        return $this->hasMany(FreelancerCertification::class, 'freelancer_id');
    }
}
