<?php

namespace App\Http\Controllers;

use App\Models\SalesReport;

class SalesReportController extends Controller
{
    public function index()
    {
        $reports = SalesReport::all();

        return view('sales_report', compact('reports'));
    }
}