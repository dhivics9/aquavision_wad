<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class subcription extends Model
{
    //
    protected $fillable = [
        'subcription type',
        'subcription duration',
        'subcription start date',
        'subcription end date'
    ];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'subcription_id', 'id');
    }

}
