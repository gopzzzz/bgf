<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop_registrations;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        $menus = DB::table('shop_registrations')->get();

        return view('menus', compact('menus'));
    }
}