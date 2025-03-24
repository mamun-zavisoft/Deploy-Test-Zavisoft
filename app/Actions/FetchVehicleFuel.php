<?php

namespace App\Actions;

use App\Models\VehicleFuel;

class FetchVehicleFuel
{
    public function execute($request)
    {
        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 10);

        return VehicleFuel::with('vehicle')
            ->when($search, function ($query, $search) {
                $query->WhereHas('vehicle', function ($query) use ($search) {
                          $query->where('license_plate', 'like', "%{$search}%");
                      });
            })
            ->orderBy('id', 'desc')
            ->paginate($perPage)
            ->withQueryString();
    }
}
