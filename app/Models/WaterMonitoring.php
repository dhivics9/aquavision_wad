<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WaterMonitoring extends Model
{
    //

    protected $table = 'water_qualitys';
    protected $fillable = [
        'ph_level',
        'turbidity',
        'temperature',
        'color',
        'tds',
        'hardness',
        'nitrate',
        'nitrite',
        'ammonia',
        'chloride',
        'sulfate',
        'fluoride',
        'iron',
        'manganese',
        'coliform_total',
        'e_coli',
        'collected_at',
        'created_at',
        'sensor_id',
        'users_id'
    ];
    public function users():HasOne
    {
        return $this->hasOne(User::class, 'users_id ', 'id');
    }
    public function sensors():HasOne
    {
        return $this->HasOne(Sensor::class, 'sensor_id', 'id');
    }

    public function coagulation_analysis():HasOne
    {
        return $this->hasOne(coagulation_analysis::class, 'water_qualitys_id', 'id');
    }
    public function flocculation_analysis():HasOne
    {
        return $this->hasOne(flocculation_analysis::class, 'water_qualitys_id', 'id');
    }
    public function sedimentation_analysis():HasOne
    {
        return $this->hasOne(sedimentation_analysis::class, 'water_qualitys_id', 'id');
    }
    public function filtration_analysis():HasOne
    {
        return $this->hasOne(filtration_analysis::class, 'water_qualitys_id', 'id');
    }
    public function disinfection_analysis():HasOne
    {
        return $this->hasOne(disinfection_analysis::class, 'water_qualitys_id', 'id');
    }   
    public function reports():HasOne
    {
        return $this->hasOne(Report::class, 'water_qualitys_id', 'id');
    }
}
