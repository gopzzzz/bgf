<?php

namespace App\Http\Controllers;

use App\Models\ItemwiseReport;


class ItemwiseReportController extends Controller
{
    public function index()
    {
        $reports = ItemwiseReport::all();

        return view('itemwise_report', compact('reports'));
    }
}