<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'subscription_duration',
        'subscription_start_date',
        'subscription_end_date',
        'subscription_status',
        'snap_token',
        'payment_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
