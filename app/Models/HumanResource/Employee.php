<?php

namespace App\Models\HumanResource;

use App\Models\Building;
use App\Models\UserManagement\Hr;
use App\Models\UserManagement\HrDepartment;
use App\Models\UserManagement\HrDesignation;
use App\Models\UserManagement\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'hr_id',
        'salary_type',
        'salary',
        'loan_percentage',
        'working_hours',
        'department_id',
        'designation_id',
        'created_by',
        'updated_by',

    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }



    public function Hr(): BelongsTo
    {
        return $this->belongsTo(Hr::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(HrDepartment::class);
    }

    public function designation(): BelongsTo
    {
        return $this->belongsTo(HrDesignation::class);
    }
}
