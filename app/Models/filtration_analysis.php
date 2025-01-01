<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class filtration_analysis extends Model
{
    protected $fillable = [
        'filter_type',
        'filter_efficiency',
        'turbidity',
        'temperature',
        'iron',
        'manganese',
        'chloride',
        'ammonia',
        'coliform_total',
        'e_coli',
        'water_qualitys_id',
    ];

    public function waterMonitoring(): BelongsTo
    {
        return $this->belongsTo(WaterMonitoring::class, 'water_qualitys_id', 'id');
    }

    public function calculateEfficiency($before, $after)
    {
        if ($before == 0) {
            return 0;
        }
        return (($before - $after) / $before) * 100;
    }

    public function analyzeTSS()
    {
        if ($this->waterMonitoring) {
            return $this->waterMonitoring->turbidity * 0.5;
        }
        return null;
    }
    
}
