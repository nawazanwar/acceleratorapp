<?php

namespace App\Models;

use App\Enum\MediaTypeEnum;
use App\Enum\TableEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $table = TableEnum::CUSTOMERS;
    protected $fillable=[
        'user_id',
        'map_address',
        'map_latitude',
        'map_longitude',
        'about_us',
        'instagram',
        'facebook',
        'twitter',
        'youtube',
        'linkedIn',
        'whatsapp'
    ];

    public function logo(): HasMany
    {
        return $this->hasMany(Media::class, 'record_id', 'id')
            ->where('record_type', MediaTypeEnum::CUSTOMER_LOGO);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
