<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterMonitoring extends Model
{
    //
    protected $fillable = [
        'data_id',
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
        'user_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function sensors()
    {
        return $this->belongsTo(Sensor::class, 'sensor_id', 'id');
    }
}
