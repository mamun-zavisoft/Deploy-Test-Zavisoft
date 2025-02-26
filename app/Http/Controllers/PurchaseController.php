<?php

namespace App\Http\Controllers;

class PurchaseController extends Controller
{
    public function index()
    {
        return view('backend.purchases.index');
    }

    public function create()
    {
        return view('backend.purchases.create');
    }
}
