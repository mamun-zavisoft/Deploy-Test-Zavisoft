<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleModel;
use App\Actions\FetchVehicleModel;
use Illuminate\Support\Facades\DB;

class VehicleModelController extends Controller
{
    public function index(Request $request){
       
        $vehicleModels = (new FetchVehicleModel())->execute($request);

        if ($request->ajax()) {
            return view('components.vehicleModels.table', ['vehicleModels' => $vehicleModels])->render();
        }
    
        return view('backend.vehicleModels.index', compact('vehicleModels'));
    }


    public function store(Request $request){
      try{
        $request->validate([
            'name' => 'required|string|max:50|unique:vehicle_models,name',
            'manufacturer' => 'required|string|max:50',
            'engine_cc' => 'required|integer',
            'fuel_capacity' => 'required|numeric',
            'payload_capacity' => 'required|numeric',
            'body_length' => 'nullable|numeric',
        ]);

        DB::beginTransaction();

        $vehicleModel = VehicleModel::create([
            'name' => $request->name,
            'manufacturer' => $request->manufacturer,
            'engine_cc' => $request->engine_cc,
            'fuel_capacity' => $request->fuel_capacity,
            'payload_capacity' => $request->payload_capacity,
            'body_length' => $request->body_length,
        ]);

            DB::commit();
            return response()->json(['message' => 'Vehicle Model created successfully', 'type' => 'success'],200);
        }catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th->getMessage(), 'type' => 'error'],500);
            
        } 
    }

    public function update(Request $request, VehicleModel $vehicleModel){
        try{
            $data = $request->validate([
                'name' => 'required|string|max:50',
                'manufacturer' => 'required|string|max:50',
                'engine_cc' => 'required|integer',
                'fuel_capacity' => 'required|numeric',
                'payload_capacity' => 'required|numeric',
                'body_length' => 'nullable|numeric',
            ]);

            DB::beginTransaction();

            $vehicleModel->update($data);

            DB::commit();
            return response()->json(['message' => 'Vehicle Model updated successfully', 'type' => 'success'],200);
        }catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th->getMessage(), 'type' => 'error'],500);
            
        }
    }

    public function destroy(VehicleModel $vehicleModel){
        $vehicleModel->delete();
        return redirect()->back()->with('success', 'Vehicle Model deleted successfully!');
    }
    
}
