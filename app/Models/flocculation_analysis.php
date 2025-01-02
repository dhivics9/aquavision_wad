<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class flocculation_analysis extends Model
{
    //
    protected $table = 'flocculation_analysis';

    protected $fillable = [
        'water_qualitys_id',
        'mixing_time',
        'floc_size'
    ];
    
    public function WaterMonitoring(): BelongsTo
    {
        return $this->belongsTo(WaterMonitoring::class, 'water_qualitys_id', 'id');
    }
}
