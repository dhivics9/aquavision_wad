<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Sensor extends Model
{
    //
    protected $fillable = [
        'sensor name',
        'sensor type',
        'sensor location',
        'sensor status',
        'created_at',
        'updated_at',
        'user_id'
    ];
    public function users():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public function waterMonitorings():HasMany
    {
        return $this->hasMany(WaterMonitoring::class,'sensor_id', 'id');
    }
    public function reports():HasMany
    {
        return $this->hasMany(Report::class,'sensor_id', 'id');
    }

}
