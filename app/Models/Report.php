<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    //
    protected $fillable = [
        'report_name',
        'report_date',
        'user_id',
        'water_qualitys_id',
        'sensor_id',
        'coagulation_analysis_id',
        'flocculation_analysis_id',
        'sedimentation_analysis_id',
        'filtration_analysis_id',
        'disinfection_analysis_id',
        'created_at',
        'updated_at'
    ];
    public function users():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public function waterMonitorings():BelongsTo
    {
        return $this->belongsTo(WaterMonitoring::class,'water_qualitys_id', 'id');
    }
    public function sensors():BelongsTo
    {
        return $this->belongsTo(Sensor::class,'sensor_id', 'id');
    }
    public function coagulation_analysis():BelongsTo
    {
        return $this->belongsTo(coagulation_analysis::class,'coagulation_analysis_id', 'id');
    }
    public function flocculation_analysis():BelongsTo
    {
        return $this->belongsTo(flocculation_analysis::class,'flocculation_analysis_id', 'id');
    }
    public function sedimentation_analysis():BelongsTo
    {
        return $this->belongsTo(sedimentation_analysis::class,'sedimentation_analysis_id', 'id');
    }
    public function filtration_analysis():BelongsTo
    {
        return $this->belongsTo(filtration_analysis::class,'filtration_analysis_id', 'id');
    }
    public function disinfection_analysis():BelongsTo
    {
        return $this->belongsTo(disinfection_analysis::class,'disinfection_analysis_id', 'id');
    }
}
