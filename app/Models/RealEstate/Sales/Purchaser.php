<?php

namespace App\Models\RealEstate\Sales;

use App\Models\Authorization\User;
use App\Models\RealEstate\Building;
use App\Models\RealEstate\HumanResource\Hr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchaser extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sales_id',
        'hr_id',
        'percentage',
        'created_by',
        'updated_by',
        'building_id',
    ];

    public function Building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

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

    public function sales(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }
}
