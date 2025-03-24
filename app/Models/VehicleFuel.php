<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleFuel extends Model
{
    protected $guarded = [];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
