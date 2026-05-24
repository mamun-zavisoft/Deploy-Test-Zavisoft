<?php

namespace App\Actions;

use App\Models\PurchaseDetail;

class FetchPruchaseDetail
{
    public function execute($request)
    {
        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 10);

        return PurchaseDetail::query()
            ->with('product', 'purchase')
            ->when($search, function ($query, $search) {
                $query->where('purchase_id', 'like', "%{$search}%")
                    ->orWhere('product_id', 'like', "%{$search}%")
                    ->orWhere('quantity', 'like', "%{$search}%")
                    ->orWhere('price', 'like', "%{$search}%");
            })
            ->select('id', 'purchase_id', 'product_id', 'quantity', 'price', 'created_at')
            ->orderBy('id', 'desc')->paginate($perPage)->withQueryString();
    }
}
