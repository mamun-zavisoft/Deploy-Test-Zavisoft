<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Supplier;
use App\Models\Service;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Product;
use App\Models\ServiceChart;
use App\Models\ServiceDetail;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVehicle = Vehicle::count();  //total vehicle count
        $selfVehicle = Vehicle::where('owner_type', 1)->count();  // only self vehicle count
        $outsideVehicle = Vehicle::where('owner_type', 2)->count();  //only external vehicle count

        // total supplier count
        $totalSupplier = Supplier::count();
        
        //total service count
        $totalService = Service::count();


        $purchases = Purchase::with('purchaseDetails')
        ->select('id','zone_id','supplier_id','discount_amount','shipping_charge','paid_amount','due_amount','paid_status','reference_no','status','transaction_id','grand_total')
        ->orderBy('id', 'desc')
        ->take(5)->get();
        $products  = Product::select('id','name','purchase_price')->get();
        $totalDueAmount = $purchases->sum('due_amount');


        $services = Service::with('serviceDetails')->orderBy('id', 'desc')
                ->take(5)->get();
        $serviceCharts = ServiceChart::select('id','name','price')->get();        


        return view('index', get_defined_vars());
    }
}
