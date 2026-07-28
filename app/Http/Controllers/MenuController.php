<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop_registrations;
use Illuminate\Support\Facades\DB;

class ShopNameController extends Controller
{
    public function index()
    {
        $shops = DB::table('shop_registrations')->get();

        return view('shop', compact('shops'));
    }
}