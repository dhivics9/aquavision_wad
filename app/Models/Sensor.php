<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sensor extends Model
{
    //
    use HasFactory;
    protected $table = 'sensors';

    protected $fillable = [
        'users_id',
        'sensor_name',
        'sensor_type',
        'sensor_location',
        'sensor_status',
        'created_at',
        'updated_at',
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
