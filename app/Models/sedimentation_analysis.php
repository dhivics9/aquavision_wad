<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class sedimentation_analysis extends Model
{
    protected $fillable = [
        'sedimentation_rate',
        'water_qualitys_id',
    ];
    
    public function WaterMonitoring(): BelongsTo
    {
        return $this->belongsTo(WaterMonitoring::class, 'water_qualitys_id', 'id');
    }
}
