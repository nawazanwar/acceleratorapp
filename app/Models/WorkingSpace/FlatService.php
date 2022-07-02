<?php

namespace App\Models\WorkingSpace;

use App\Models\ServiceManagement\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FlatService extends Model
{
    use HasFactory;
    protected $fillable = [
        'building_id',
        'flat_id',
        'service_id',
        'type'

    ];
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class,'building_id');
    }
    public function flat(): BelongsTo
    {
        return $this->belongsTo(Flat::class,'flat_id');
    }
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class,'service_id');
    }
}

