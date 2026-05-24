<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
