<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class coagulation_analysis extends Model
{
    //
<<<<<<< Updated upstream
=======

    protected $table = 'coagulation_analysis';

    protected $fillable = [
        'water_qualitys_id',
        'chemical_dosage',
    ];
    public function WaterMonitoring(): BelongsTo
    {
        return $this->belongsTo(WaterMonitoring::class, 'water_qualitys_id', 'id');
    }

>>>>>>> Stashed changes
}
