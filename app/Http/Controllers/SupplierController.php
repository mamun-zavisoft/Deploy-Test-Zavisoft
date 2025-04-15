<?php

namespace App\Http\Controllers;

use App\Actions\FetchSupplier;
use App\Models\Supplier;
use App\Models\Zone;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:supplier-create')->only(['create', 'store']);
        $this->middleware('permission:supplier-list')->only(['index']);
        $this->middleware('permission:supplier-update')->only(['edit', 'update']);
        $this->middleware('permission:supplier-delete')->only(['destroy']);
    }
    public function index(Request $request)
    {
        $suppliers = (new FetchSupplier)->execute($request);
        $zones = Zone::select('id', 'name')->get();
        if ($request->ajax()) {
            return view('components.suppliers.table', ['suppliers' => $suppliers, 'zones' => $zones])->render();
        }

        return view('backend.suppliers.index', ['title' => 'Suppliers'], compact('suppliers', 'zones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:suppliers,name',
            'zone_id' => 'required|exists:zones,id',
            'phone' => 'required|regex:/^01[3-9]\d{8}$/|unique:suppliers,phone',
            'balance' => 'nullable|numeric|min:0',
            'balance_type' => 'nullable|in:advance,due',
        ],
            [
                'zone_id.required' => 'The zone field is required.',
            ]);
        try {
            $supplier = Supplier::create([
                'name' => $request->name,
                'zone_id' => $request->zone_id,
                'phone' => $request->phone,
            ]);

            // Set balance based on balance_type
            if ($request->balance_type == 'advance') {
                $supplier->balance = $request->balance;
            }elseif ($request->balance_type == 'due') {
                $supplier->balance = -($request->balance);
            }else {
                $supplier->balance = 0;
            }
            $supplier->save();

            return response()->json(['message' => 'Supplier created successfully!', 'type' => 'success', 'supplier' => $supplier], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'type' => 'error']);
        }
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'zone_id' => 'required|exists:zones,id',
            'phone' => 'required|regex:/^01[3-9]\d{8}$/|unique:suppliers,phone,'.$supplier->id,
        ]);

        try {
            $supplier->update([
                'name' => $request->name,
                'zone_id' => $request->zone_id,
                'phone' => $request->phone,
            ]);

            return response()->json(['message' => 'Supplier updated successfully!', 'type' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'type' => 'error']);
        }

    }

    public function destroy(Supplier $supplier)
    {
        // if ($category->products()->exists()) {
        //     return response()->json(['message' => 'Category has products, cannot delete!'], 422);
        // }
        if ($supplier->purchases()->exists()) {
            return redirect()->back()->with('error', 'Supplier has purchases, cannot delete!');
        }
        $supplier->delete();

        return redirect()->back()->with('success', 'Supplier deleted successfully!');
    }
}
