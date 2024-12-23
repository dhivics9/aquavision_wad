<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'First Name',
        'Last Name',
        'role',
        'enterprise',
        'email',
        'phone',
        'password',
        'subcription_id',
    ];

    public function sensors():HasMany
    {
        return $this->hasMany(Sensor::class,'sensor_id', 'id');
    }

    public function reports():HasMany
    {
        return $this->hasMany(Report::class,'report_id', 'id');
    }

    public function waterMonitorings():HasMany
    {
        return $this->hasMany(WaterMonitoring::class, 'data_id', 'id');
    }
}
