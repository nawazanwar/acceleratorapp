<?php

namespace App\Models;

use App\Enum\SubscriptionTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'subscribed_id',
        'subscription_id',
        'payment_type',
        'transaction_id',
        'file_name',
        'payment_for',
        'price',
        'is_processed',
    ];

    public function package_subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class, 'subscription_id','id')
            ->where('subscription_type',SubscriptionTypeEnum::PACKAGE);
    }
    public function plan_subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class, 'subscription_id','id')
            ->where('subscription_type',SubscriptionTypeEnum::PLAN);
    }
    public function subscribed(): BelongsTo
    {
        return $this->belongsTo(User::class, 'subscribed_id');
    }
}
