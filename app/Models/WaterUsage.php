<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterUsage extends Model
{
    protected $fillable = ['device_id', 'consumed_liters', 'recorded_at'];

    protected $casts = [
        'recorded_at' => 'datetime',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
