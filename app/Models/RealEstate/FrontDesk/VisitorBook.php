<?php

namespace App\Models\RealEstate\FrontDesk;

use App\Models\Authorization\User;
use App\Models\RealEstate\Building;
use App\Models\RealEstate\FrontDesk\FrontDeskSetup\Purpose;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitorBook extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'purpose_id',
        'name',
        'phone',
        'cnic',
        'no_person',
        'date',
        'time_in',
        'time_out',
        'note',

        'created_by',
        'updated_by',
        'deleted_by',
        'building_id',
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

    public function Building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    public function purpose(): BelongsTo
    {
        return $this->belongsTo(Purpose::class);
    }
}
