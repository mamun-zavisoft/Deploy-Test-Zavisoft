<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceChart extends Model
{
    protected $guarded = [];
    
    public function serviceDetails()
    {
        return $this->hasMany(ServiceDetail::class, 'service_chart_id');
    }
}
