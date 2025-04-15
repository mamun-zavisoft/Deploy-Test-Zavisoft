<?php

namespace App\Http\Controllers;

use App\Actions\FetchZone;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:zone-create')->only('create', 'store');
        $this->middleware('permission:zone-list')->only('index');
        $this->middleware('permission:zone-update')->only('edit', 'update');
        $this->middleware('permission:zone-delete')->only('destroy');
    }

    public function index(Request $request)
    {
        $zones = (new FetchZone)->execute($request);

        if ($request->ajax()) {
            return view('components.zones.table', ['zones' => $zones])->render();
        }

        return view('backend.zones.index', ['title' => 'Zones'], compact('zones'));

    }

    public function store(Request $request)
    {
        try {

            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:50|unique:zones,name',
                'location' => 'required|string|max:255',
                'phone' => 'required|regex:/^01[3-9]\d{8}$/|unique:zones,phone',
            ]);

            $zone = Zone::create([
                'name' => $request->name,
                'location' => $request->location,
                'phone' => $request->phone,
            ]);

            DB::commit();

            return response()->json(['message' => 'Zone created successfully!', 'type' => 'success'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['message' => $th->getMessage(), 'type' => 'error']);
        }

    }

    public function update(Request $request, Zone $zone)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:zones,name,'.$zone->id,
            'location' => 'required|string|max:255,'.$zone->id,
            'phone' => 'required|regex:/^01[3-9]\d{8}$/|unique:zones,phone,'.$zone->id,
        ]);

        try {

            $zone->update([
                'name' => $request->name,
                'location' => $request->location,
                'phone' => $request->phone,
            ]);

            return response()->json(['message' => 'Zone updated successfully!', 'type' => 'success'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'type' => 'error']);
        }

    }

    public function destroy(Zone $zone)
    {
        $userCount = User::where('zone_id', $zone->id)->count();

        if ($userCount > 0) {
            return redirect()->back()->with('error', 'Zone has users, cannot delete!');
        }

        if ($zone->racks()->exists())
        {
            return redirect()->back()->with('error', 'Zone has racks, cannot delete!');
        }
        $zone->delete();

        return redirect()->back()->with('success', 'Zone deleted successfully!');
    }
}
