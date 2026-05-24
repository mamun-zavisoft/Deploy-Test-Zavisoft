<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    protected $guarded = [];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function drawers()
    {
        return $this->hasMany(Drawer::class);
    }

    /**
     * Get all stock purchases associated with this rack
     */
    public function stockPurchases()
    {
        return $this->hasMany(StockPurchase::class);
    }

    /**
     * Get the total count of products stored in this rack across all drawers
     *
     * @return int
     */
    public function getTotalProductsCountAttribute()
    {
        $count = 0;

        // Sum up products across all drawers in this rack
        foreach ($this->drawers as $drawer) {
            $count += $drawer->available_products_count;
        }

        return $count;
    }
}
