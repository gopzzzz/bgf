<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop_registrations;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $menus = DB::table('shop_registrations')->get();
=======
        $shops = DB::table('tbl_shopbrands')->get();

        echo "<pre>";print_r($shops);exit;
>>>>>>> 4affba7fc1ba7258bc3d9075d26f04a7fd6682c0

        return view('menus', compact('menus'));
    }
}