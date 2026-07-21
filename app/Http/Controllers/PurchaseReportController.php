<?php

namespace App\Http\Controllers;

use App\Models\purchaseReport;


class PurchaseReportController extends Controller
{
    public function index()
    {
        $reports = PurchaseReport::all();

        return view('purchase_order_trans', compact('reports'));
    }
}