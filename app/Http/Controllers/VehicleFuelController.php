<?php

namespace App\Http\Controllers;

use App\Actions\FetchVehicleFuel;
use App\Models\Vehicle;
use App\Models\VehicleFuel;
use Illuminate\Http\Request;

class VehicleFuelController extends Controller
{
    /**
     * Display a listing of the vehicle fuel records.
     */
    public function index(Request $request)
    {
        $vehicleFuels = (new FetchVehicleFuel)->execute($request);

        if ($request->ajax()) {
            return view('components.vehicleFuels.table', ['entity' => $vehicleFuels])->render();
        }
        return view('backend.vehicle_fuels.index', compact('vehicleFuels'));
    }

    /**
     * Show the form for creating a new vehicle fuel entry.
     */
    public function create()
    {
        $vehicles = Vehicle::select('id', 'license_plate')->get();
        $recentFuelings = VehicleFuel::with('vehicle')->latest()->take(5)->get();
        return view('backend.vehicle_fuels.create', get_defined_vars());
    }

    /**
     * Store a newly created vehicle fuel record in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|integer',
            'fuel_type' => 'required|integer|in:1,2,3',
            'current_odometer' => 'required|numeric',
            'fuel_qty' => 'required|numeric',
            'fuel_rate' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);

        $vehicleFuel =VehicleFuel::create([
            'vehicle_id' => $request->vehicle_id,
            'fuel_type' => $request->fuel_type,
            'current_odometer' => $request->current_odometer,
            'fuel_qty' => $request->fuel_qty,
            'fuel_rate' => $request->fuel_rate,
            'total_price' => $request->fuel_qty * $request->fuel_rate, // Auto-calculate
        ]);
        $entity = VehicleFuel::with('vehicle')->latest()->take(5)->get();

        $latestFuelingsHtml = view('components.vehicleFuels.table', compact('entity'))->render();

        return response()->json(['message' => 'Fuel entry added successfully!', 'type' => 'success', 'latestFuelingsHtml' => $latestFuelingsHtml]);
    }

    /**
     * Show the form for editing an existing fuel record.
     */
    public function edit(VehicleFuel $vehicleFuel)
    {
        $vehicles = Vehicle::select('id', 'license_plate')->get();
        return view('backend.vehicle_fuels.edit', compact('vehicleFuel', 'vehicles'));
    }

    /**
     * Update the specified vehicle fuel record.
     */
    public function update(Request $request, VehicleFuel $vehicleFuel)
    {
        $request->validate([
            'vehicle_id' => 'required|integer',
            'fuel_type' => 'required|integer|in:1,2,3',
            'current_odometer' => 'required|numeric',
            'fuel_qty' => 'required|numeric',
            'fuel_rate' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);

        $vehicleFuel->update([
            'vehicle_id' => $request->vehicle_id,
            'fuel_type' => $request->fuel_type,
            'current_odometer' => $request->current_odometer,
            'fuel_qty' => $request->fuel_qty,
            'fuel_rate' => $request->fuel_rate,
            'total_price' => $request->fuel_qty * $request->fuel_rate,
        ]);

        return response()->json(['message' => 'Fuel entry updated successfully!', 'type' => 'success', 'redirectUrl' => route('admin.vehicle-fuels.index')]);
    }

    /**
     * Remove the specified vehicle fuel record from storage.
     */
    public function destroy(VehicleFuel $vehicleFuel)
    {
        $vehicleFuel->delete();
        return redirect()->route('admin.vehicle-fuels.index')->with('success', 'Fuel entry deleted successfully.');
    }
}
