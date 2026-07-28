<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop_registrations;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        $shops = DB::table('tbl_shopbrands')->get();

        echo "<pre>";print_r($shops);exit;

        return view('shop', compact('shops'));
    }
}