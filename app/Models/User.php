<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;
    protected $fillable = [
        'First_Name',
        'Last_Name',
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
    public function subcription():BelongsTo
    {
        return $this->belongsTo(subcription::class, 'subcription_id', 'id');
    }
}
