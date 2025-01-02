<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class disinfection_analysis extends Model
{
    protected $table = 'disinfection_analysis';

    protected $fillable = [
        'water_qualitys_id',
        'disinfectant_type',
        'contact_time',
        'residual_chlorine_level'
    ];
    public function WaterMonitoring(): BelongsTo
    {
        return $this->belongsTo(WaterMonitoring::class, 'water_qualitys_id', 'id');
    }
}
