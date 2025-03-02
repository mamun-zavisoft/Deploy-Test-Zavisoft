<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseDetail;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\Supplier;
use App\Actions\FetchPruchaseDetail;
use Illuminate\Support\Facades\DB;


class PurchasesDetailController extends Controller
{
   
    public function index(Request $request)
    {
        $purchasesDetails = (new FetchPruchaseDetail)->execute($request);
        $purchases = Purchase::with('supplier')->select('id','supplier_id','paid_status')->get();
        $products = Product::select('id','name','purchase_price')->get();

        if ($request->ajax()){
            return view('components.purchaseDetails.table', ['entity' => $purchasesDetails])->render();
        }
        return view('backend.purchaseDetails.index', compact('purchasesDetails','purchases','products'));
        
    }

}
