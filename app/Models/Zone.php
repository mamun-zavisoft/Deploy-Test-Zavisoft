<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $guarded = [];

    public function racks()
    {
        return $this->hasMany(Rack::class);
    }
}
