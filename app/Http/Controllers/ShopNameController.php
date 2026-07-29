<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Shop_registrations;
use App\Models\Tbl_shopbrands;
use DB;

class ShopNameController extends Controller
{
    public function index()
    {
        $shopnames = DB::table('tbl_shopbrands')
        ->leftJoin('shop_registrations', 'tbl_shopbrands.franchise_id', '=', 'shop_registrations.id')
        ->select('tbl_shopbrands.*','shop_registrations.name as franchisename')
        ->get();
        $franchsie = DB::table('shop_registrations')->get();

        return view('shopname', compact('shopnames','franchsie'));
    }
    public function createfranchiseshops(Request $request){
           try {

    $shop = new Tbl_shopbrands();
    $shop->brand_name = $request->create_menu;
    $shop->franchise_id = $request->shop_id;
    $shop->save();

    return back()->with('success', 'Brand created successfully.');

} catch (\Exception $e) {

    return back()
        ->withInput()
        ->with('error', 'Something went wrong. ' . $e->getMessage());

}

    }
}