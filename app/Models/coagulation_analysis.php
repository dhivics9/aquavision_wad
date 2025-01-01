<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class coagulation_analysis extends Model
{
    //
    protected $fillable = [
        'chemical_dosage',
        'ph_level',
        'color',
        'turbidity',
        'tss',
        'water_qualitys_id',
    ];
    public function WaterMonitoring(): BelongsTo
    {
        return $this->belongsTo(WaterMonitoring::class, 'water_qualitys_id', 'id');
    }


    public function calculateTSS()
    {
        if ($this->waterMonitoring) {
            return $this->waterMonitoring->turbidity * $this->chemical_dosage;
        }

        return null; 
    }

}

