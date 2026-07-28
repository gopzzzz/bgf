<?php

namespace App\Http\Controllers;

use App\Models\Shop_registrations;

class ShopNameController extends Controller
{
    public function index()
    {
        $shopnames = Shop_registrations::all();

        return view('shop_registrations', compact('shopnames'));
    }
}