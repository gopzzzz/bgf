<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class MaterialPurchaseOrderController extends Controller
{
    public function index()
    {
         $shops=DB::table('shop_registrations')
         ->select('shop_registrations.id','shop_registrations.name')
         ->get();

         $materials=DB::table('materials')
         ->select('materials.id','materials.name')
         ->get();
         
        return view('material_purchase_order',compact('shops', 'materials'));
    }

}