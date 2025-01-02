<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class filtration_analysis extends Model
{
    protected $table = 'filtration_analysis';

    protected $fillable = [
        'water_qualitys_id',
        'filter_type',
        'filter_efficiency',
    ];
    public function WaterMonitoring(): BelongsTo
    {
        return $this->belongsTo(WaterMonitoring::class, 'water_qualitys_id', 'id');
    }
}
